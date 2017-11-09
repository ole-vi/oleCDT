<?php
ob_start();
session_start();
include('include/config.php');

if(isset($_POST['submit']))
{
  $dt_fname = $_REQUEST['fname'];
  $dt_email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
  $dt_mob = !empty($_REQUEST['mob']) ? $_REQUEST['mob'] : '';
  $dt_off_phone = !empty($_REQUEST['off_phone']) ? $_REQUEST['off_phone'] : 0;
  $dt_o_phone = !empty($_REQUEST['o_phone']) ? $_REQUEST['o_phone'] : 0;
  $dt_skype = isset($_REQUEST['skype']) ? $_REQUEST['skype'] : '';
  $dt_facebook = isset($_REQUEST['facebook']) ? $_REQUEST['facebook'] : '';
  $dt_street = isset($_REQUEST['street']) ? $_REQUEST['street'] : '';
  $dt_city = isset($_REQUEST['city']) ? $_REQUEST['city'] : '';
  $dt_state = isset($_REQUEST['state']) ? implode('::', $_REQUEST['state']): '';
  $dt_zip = isset($_REQUEST['zip']) ? $_REQUEST['zip'] : '';
  $dt_dob = isset($_REQUEST['dob']) ? date('Y-m-d ', strtotime($_REQUEST['dob'])) : '';
  $dt_citizenship = isset($_REQUEST['citizenship']) ? $_REQUEST['citizenship'] : '';
  $dt_lname = isset($_REQUEST['l_name']) ? $_REQUEST['l_name'] : '';
  $pass1 = $_REQUEST['password'];
  $pass2 = $_REQUEST['repassword'];
  $pass3 = md5($pass1);

  $dt_interest1 = isset($_REQUEST['interest1']) ? implode('::', $_REQUEST['interest1']): '';
  $dt_interest2 = isset($_REQUEST['interest2']) ? implode('::', $_REQUEST['interest2']): '';
  $dt_interest3 = isset($_REQUEST['interest3']) ? implode('::', $_REQUEST['interest3']): '';
  $dt_interest4 = isset($_REQUEST['interest4']) ? implode('::', $_REQUEST['interest4']): '';

  $dt_purpose = isset($_REQUEST['purpose']) ? implode('::', $_REQUEST['purpose']): '';

  $date = date("Y-m-d H:i:s");
  $status='Active';

  $imgFile = $_FILES['pic']['name'];
  $tmp_dir = $_FILES['pic']['tmp_name'];
  $imgSize = $_FILES['pic']['size'];

  $upload_dir = 'profile/'; // upload directory

  $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension

  // valid image extensions
  $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

  // rename uploading image
  $pic = rand(1000,1000000).".".$imgExt;

  // allow valid image file formats
  if(in_array($imgExt, $valid_extensions)){
    // Check file size '5MB'
    if($imgSize < 5000000) {
      move_uploaded_file($tmp_dir,$upload_dir.$pic);
    }
    else
    {
      $_SESSION['org']="Sorry, your file is large than 5MB";
      header('location:'.$site_url.'profile');
    }
  }

  $sql = "select * from tbl_individual_member where email=:email";
  $query = $conn->prepare($sql);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->execute();
  $count = $query->rowCount();
  if($count>0)
  {
    $_SESSION['ind'] = "Email Already Exist";
    header('location:'.$site_url.'individual');
  }
  elseif($pass1!=$pass2)
  {
    $_SESSION['ind'] = "Please Enter Same Password";
    header('location:'.$site_url.'individual');
  }
  else
  {
    $sql1 = "insert into `tbl_individual_member` set fname=:fname, email=:email, mob=:mob, off_phone=:off_phone, o_phone=:o_phone, skype=:skype , facebook=:facebook , pic=:pic, street=:street , city=:city , state=:state , zip=:zip , dob=:dob , citizenship=:citizenship, l_name=:l_name , pass=:pass, interest1=:interest1, interest2=:interest2, interest3=:interest3, interest4=:interest4, purpose=:purpose, last_update=:update_date, add_date=:date, status=:status";
    $query1 = $conn->prepare($sql1);
    $query1->bindParam(':fname', $dt_fname, PDO::PARAM_STR);
    $query1->bindParam(':email', $dt_email, PDO::PARAM_STR);
    $query1->bindParam(':mob', $dt_mob, PDO::PARAM_STR);
    $query1->bindParam(':off_phone', $dt_off_phone, PDO::PARAM_STR);
    $query1->bindParam(':o_phone', $dt_o_phone, PDO::PARAM_STR);
    $query1->bindParam(':skype', $dt_skype, PDO::PARAM_STR);
    $query1->bindParam(':facebook', $dt_facebook, PDO::PARAM_STR);
    $query1->bindParam(':street', $dt_street, PDO::PARAM_STR);
    $query1->bindParam(':city', $dt_city, PDO::PARAM_STR);
    $query1->bindParam(':state', $dt_state, PDO::PARAM_STR);
    $query1->bindParam(':zip', $dt_zip, PDO::PARAM_STR);
    $query1->bindParam(':dob', $dt_dob, PDO::PARAM_STR);
    $query1->bindParam(':citizenship', $dt_citizenship, PDO::PARAM_STR);
    $query1->bindParam(':l_name', $dt_lname, PDO::PARAM_STR);
    $query1->bindParam(':pass', $pass3, PDO::PARAM_STR);
    $query1->bindParam(':update_date', $date, PDO::PARAM_STR);
    $query1->bindParam(':date', $date, PDO::PARAM_STR);
    $query1->bindParam(':status', $status, PDO::PARAM_STR);
    $query1->bindParam(':purpose', $dt_purpose, PDO::PARAM_STR);
    $query1->bindParam(':interest1', $dt_interest1, PDO::PARAM_STR);
    $query1->bindParam(':interest2', $dt_interest2, PDO::PARAM_STR);
    $query1->bindParam(':interest3', $dt_interest3, PDO::PARAM_STR);
    $query1->bindParam(':interest4', $dt_interest4, PDO::PARAM_STR);

    $query1->bindParam(':pic', $pic, PDO::PARAM_STR);
    $run=$query1->execute();
    if($run)
    {
      $to="$email,beautyraj.cit@gmail.com";
      $from = "test@dppms.com";
      $subject ='Account Registration Sucessfully';

      $message='<table align="center" border="1" bordercolor="#caecf7" cellpadding="0" cellspacing="0" style="width: 804px;">
      <tbody>
        <tr align="center">
          <td class="area" height="19">
            <table border="0" cellpadding="0" cellspacing="0" style="height: 246px; width: 800px;">
              <tbody>
                <tr>
                  <td align="center" bgcolor="#caecf7" class="smallgreylink" height="32">
                    &nbsp;</td>
                  <td align="left" bgcolor="#caecf7" class="style1 smallgreylink" height="32" style="padding-right: 5px;" valign="middle" width="97%">
                    <strong>Registration Confirmation</strong></td>
                </tr>
                <tr>
                  <td align="center" class="smallgreylink" height="81" width="3%">
                    &nbsp;</td>
                  <td align="center" class="smallgreylink style1" height="81" style="padding-right: 5px;" valign="top">
                    <p align="left" class="style2">
                      Dear '.$name.'</p>
                    <p align="justify" class="style2">
                      Thank you for registering As Individual </p>
                    <p align="justify" class="style2">
                      Your Account registration has been successfully created.</p>
                    <p align="justify" class="style2">
                      Click here for activation of your account.<a href="'.$site_url.'status?email='.$email.'">click here</a></p>
                    <p align="justify" class="style2">
                      User Name: '.$name.'</p>
                      <p align="justify" class="style2">
                      Password: '.$pass1.'</p>
                      <strong>Thank You</strong></p>
                    <p align="justify" class="style2">
                      <strong>Fieldguide Team</strong></p>
                    <p align="justify" class="style2">
                      &nbsp;</p>
                  </td>
                </tr>
                <tr>
                  <td align="center" bgcolor="#caecf7" class="smallgreylink" height="20">
                    &nbsp;</td>
                  <td align="left" bgcolor="#caecf7" class="smallgreylink style1" height="32" valign="middle">
                    <br />
                    &nbsp;</td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>';

      $headers  = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
      $headers .= 'From:'.$from."\r\n";
      $res = mail ( $to, $subject, $message, $headers );
      if ($res)
      {
        echo '<script>alert("Thank You for your registration! verification link has been send to your corresponding email check it.")</script>';
        echo '<script>window.location.href="'.$site_url.'"</script>';
        //$_SESSION['ind']="Thank You for your registration! verification link has been send to your corresponding email check it.";
        //header('location:'.$site_url);
      }
      else
      {
        $_SESSION['ind1']="Login details has not been send";
        header('location:'.$site_url.'individual');
      }
    }
    else
    {
      $_SESSION['ind']="Record is not Inserted";
      header('location:'.$site_url.'individual');
    }
  }
}
?>
