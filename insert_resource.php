<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
ob_start();
session_start();
include('include/config.php');

if(isset($_POST['submit']))
{
  //$state=	array();

  $dt_name = $_REQUEST['name'];
  $dt_pub_id = isset($_REQUEST['pub_id']) ? $_REQUEST['pub_id'] : '';
  $dt_pub_date = isset($_REQUEST['pub_date']) ? $_REQUEST['pub_date'] : '';
  $dt_a_fname = isset($_REQUEST['a_fname']) ? $_REQUEST['a_fname'] : '';
  $dt_a_lname = isset($_REQUEST['a_lname']) ? $_REQUEST['a_lname'] : '';
  $dt_url = isset($_REQUEST['url']) ? $_REQUEST['url'] : '';
  $dt_description = isset($_REQUEST['description']) ? $_REQUEST['description'] : '';
  $dt_availability = isset($_REQUEST['availability']) ? $_REQUEST['availability'] : '';

  $dt_interest1 = isset($_REQUEST['interest1']) ? implode('::', $_REQUEST['interest1']): '';
  $dt_interest2 = isset($_REQUEST['interest2']) ? implode('::', $_REQUEST['interest2']): '';
  $dt_interest3 = isset($_REQUEST['interest3']) ? implode('::', $_REQUEST['interest3']): '';
  $dt_interest4 = isset($_REQUEST['interest4']) ? implode('::', $_REQUEST['interest4']): '';

  $status= 'Active';
  $date = date("Y-m-d");

  $imgFile = $_FILES['publication']['name'];
  $tmp_dir = $_FILES['publication']['tmp_name'];
  $imgSize = $_FILES['publication']['size'];

  $upload_dir = 'resource/'; // upload directory
  
  $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension

  // valid image extensions
  $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

  // rename uploading image
  $dt_pic = rand(1000,1000000).".".$imgExt;

  // allow valid image file formats
  if(in_array($imgExt, $valid_extensions)){
    // Check file size '5MB'
    if($imgSize < 5000000) {
      move_uploaded_file($tmp_dir, $upload_dir.$dt_pic);
    }
    else
    {
      $_SESSION['msg']="Sorry, your file is large than 5MB";
      header('location:'.$site_url.'add_resource');
    }
  }

  //$path="uploaded_doc/" .$pic;
  $sql1 = "insert into `tbl_resources` set name=:name, pub_id=:pub_id, pub_date=:pub_date, a_fname=:a_fname, a_lname=:a_lname, url=:url, description=:description, availability=:availability, add_date=:add, last_update=:update, publication=:publication, mem_id=:mem_id";
  $query1 = $conn->prepare($sql1);
  $query1->bindParam(':name', $dt_name, PDO::PARAM_STR);
  $query1->bindParam(':pub_id', $dt_pub_id, PDO::PARAM_STR);
  $query1->bindParam(':pub_date', $dt_pub_date, PDO::PARAM_STR);
  $query1->bindParam(':a_fname', $dt_a_fname, PDO::PARAM_STR);
  $query1->bindParam(':a_lname', $dt_a_lname, PDO::PARAM_STR);
  $query1->bindParam(':url', $dt_url, PDO::PARAM_STR);
  $query1->bindParam(':description', $dt_description, PDO::PARAM_STR);
  $query1->bindParam(':availability', $dt_availability, PDO::PARAM_STR);


  $query1->bindParam(':interest1', $dt_interest1, PDO::PARAM_STR);
  $query1->bindParam(':interest2', $dt_interest2, PDO::PARAM_STR);
  $query1->bindParam(':interest3', $dt_interest3, PDO::PARAM_STR);
  $query1->bindParam(':interest4', $dt_interest4, PDO::PARAM_STR);
  $query1->bindParam(':add', $date, PDO::PARAM_STR);
  $query1->bindParam(':update', $date, PDO::PARAM_STR);
  $query1->bindParam(':mem_id', $_SESSION['id'], PDO::PARAM_STR);

  $query1->bindParam(':publication', $dt_pic, PDO::PARAM_STR);
  $run=$query1->execute();
  if($run)
  {
    $resId = $conn->lastInsertId();
    $to = $o_email;
    $from = $mail_send_from;
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
                    <strong>Organization Member Registration Confirmation</strong></td>
                </tr>
                <tr>
                  <td align="center" class="smallgreylink" height="81" width="3%">
                    &nbsp;</td>
                  <td align="center" class="smallgreylink style1" height="81" style="padding-right: 5px;" valign="top">
                    <p align="left" class="style2">
                      Dear '.$name.'</p>
                    <p align="justify" class="style2">
                      Thank you for registering in Pro-Democracy Organization</p>
                    <p align="justify" class="style2">
                      Your &nbsp;Employer Account registration has been successfully created.</p>
                  
                      <strong>Thank You</strong></p>
                    <p align="justify" class="style2">
                      <strong>fieldguide Team</strong></p>
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

    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From:'.$from."\r\n";

    $res = mail ( $to, $subject, $message, $headers );

    if ($res)
    {
      $_SESSION['msg']="Registration Email has been send at your email address";
      header('location:'.$site_url.'resourcepage?id='.base64_encode($resId));
    }
    else
    {
      $_SESSION['msg']="Registration Email has not been send";
      header('location:'.$site_url.'resourcepage?id='.base64_encode($resId));
    }
  }
  else
  {
    $_SESSION['msg']="Registration is not sucessful";
    header('location:'.$site_url.'add_resource');
  }
}
?>
