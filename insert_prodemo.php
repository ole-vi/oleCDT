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

  $name = $_REQUEST['name'];
  $web = $_REQUEST['web'];
  $year = $_REQUEST['year'];
  @$tax = $_REQUEST['tax'];
  $lstatus = $_REQUEST['lstatus'];
  $location = !empty($_REQUEST['location']) ? implode(',',$_REQUEST['location']) : '';
  $l_other = !empty($_REQUEST['l_other']) ? $_REQUEST['l_other'] : '';
  $mission = implode(',', $_REQUEST['mission']);
  $priorities = implode(',', $_REQUEST['priorities']);
  //$action = $_REQUEST['action'];
  $achievements = implode(',', $_REQUEST['achievements']);
  $org = implode(',', $_REQUEST['org']);
  $m_info = implode(',', $_REQUEST['m_info']);
  //$state = $_REQUEST['state'];
  @$state1 = implode(',',$_REQUEST['state']);
 
  //$Volunteers = implode(',',$_REQUEST['Volunteers']);
  //$budget = $_REQUEST['budget'];
  $c_name = $_REQUEST['c_name'];
  $address = $_REQUEST['address'];
  $phone = !empty($_REQUEST['phone']) ? $_REQUEST['phone'] : 0;
  $email = $_REQUEST['email'];
  $skype = $_REQUEST['skype'];
  $c_other = $_REQUEST['c_other'];
  $o_name = $_REQUEST['o_name'];
  $o_address = $_REQUEST['o_address'];
  $o_phone = $_REQUEST['o_phone'];
  $o_email = $_REQUEST['o_email'];
  $o_skype = $_REQUEST['o_skype'];
  $o_other = $_REQUEST['o_other'];
  $confirm = $_REQUEST['confirm'];
  $w_other = $_REQUEST['w_other'];
  @$seeking = implode(',', $_REQUEST['seeking']);
  @$w_type = implode(',', $_REQUEST['w_type']);
  @$strategie = implode(',', $_REQUEST['strategie']);
  //$service = implode(',', $_REQUEST['service']);
  $status= 'Active';
  $date = date("Y-m-d");

  $imgFile = $_FILES['pic']['name'];
  $tmp_dir = $_FILES['pic']['tmp_name'];
  $imgSize = $_FILES['pic']['size'];

  $upload_dir = 'publisher/'; // upload directory
  
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
      header('location:'.$site_url.'add_publisher');
    }
  }

  //$path="uploaded_doc/" .$pic;


  $sql = "select * from pro_democracy where email=:email";
  $query = $conn->prepare($sql);
  $query->bindParam(':email', $o_email, PDO::PARAM_STR);
  $query->execute();
  $count = $query->rowCount();
  if($count>0)
  {
    $_SESSION['org']="Email Already Exist";
    header('location:'.$site_url.'add_publisher');
  }
  else
  {
    $sql1 = "insert into `pro_democracy` set name=:name, weblink=:web, establish_year=:year, tax_exempt=:tax, legal_status=:lstatus, location=:location, l_other=:l_other, curr_priorities=:priorities, achievements=:achievements, associated_org=:org, more_info=:m_info, logo=:pic, seeking=:seeking, work_type=:w_type, w_other=:w_other, mission=:mission, strategies=:strategie,  state=:state, c_name=:c_name, address=:address, phone=:phone, email=:email, skype=:skype, other=:c_other, o_name=:o_name, o_address=:o_address, o_email=:o_email, o_phone=:o_phone, o_skype=:o_skype, o_other=:o_other, add_date=:date, last_update=:date, status=:status";
    $query1 = $conn->prepare($sql1);
    $query1->bindParam(':name', $name, PDO::PARAM_STR);
    $query1->bindParam(':web', $web, PDO::PARAM_STR);
    $query1->bindParam(':year', $year, PDO::PARAM_STR);
    $query1->bindParam(':tax', $tax, PDO::PARAM_STR);
    $query1->bindParam(':lstatus', $lstatus, PDO::PARAM_STR);
    $query1->bindParam(':location', $location, PDO::PARAM_STR);
    $query1->bindParam(':l_other', $l_other, PDO::PARAM_STR);
    $query1->bindParam(':w_other', $w_other, PDO::PARAM_STR);
    $query1->bindParam(':mission', $mission, PDO::PARAM_STR);
    $query1->bindParam(':priorities', $priorities, PDO::PARAM_STR);
    //$query1->bindParam(':action', $action, PDO::PARAM_STR);
    $query1->bindParam(':achievements', $achievements, PDO::PARAM_STR);
    $query1->bindParam(':org', $org, PDO::PARAM_STR);
    $query1->bindParam(':m_info', $m_info, PDO::PARAM_STR);
    $query1->bindParam(':seeking', $seeking, PDO::PARAM_STR);
    $query1->bindParam(':w_type', $w_type, PDO::PARAM_STR);
    $query1->bindParam(':strategie', $strategie, PDO::PARAM_STR);
    $query1->bindParam(':state', $state1, PDO::PARAM_STR);
    //$query1->bindParam(':Volunteers', $Volunteers, PDO::PARAM_STR);
    //$query1->bindParam(':budget', $budget, PDO::PARAM_STR);
    $query1->bindParam(':address', $address, PDO::PARAM_STR);
    $query1->bindParam(':phone', $phone, PDO::PARAM_STR);
    $query1->bindParam(':email', $email, PDO::PARAM_STR);
    $query1->bindParam(':skype', $skype, PDO::PARAM_STR);
    $query1->bindParam(':c_other', $c_other, PDO::PARAM_STR);
    $query1->bindParam(':o_address', $o_address, PDO::PARAM_STR);
    $query1->bindParam(':o_phone', $o_phone, PDO::PARAM_STR);
    $query1->bindParam(':o_email', $o_email, PDO::PARAM_STR);
    $query1->bindParam(':o_skype', $o_skype, PDO::PARAM_STR);
    $query1->bindParam(':o_other', $o_other, PDO::PARAM_STR);
    $query1->bindParam(':c_name', $c_name, PDO::PARAM_STR);
    $query1->bindParam(':o_name', $o_name, PDO::PARAM_STR);
    $query1->bindParam(':date', $date, PDO::PARAM_STR);
    $query1->bindParam(':status', $status, PDO::PARAM_STR);

    $query1->bindParam(':pic', $pic, PDO::PARAM_STR);
    $run=$query1->execute();
    if($run)
    {
      $pubId = $conn->lastInsertId();
      $link_publisher = 'update tbl_individual_member set publisher=:pid where id = :indId';
      $query1 = $conn->prepare($link_publisher);
      $query1->bindParam(':pid', $pubId, PDO::PARAM_STR);
      $query1->bindParam(':indId', $_SESSION['id'], PDO::PARAM_STR);
      $query1->execute();

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
        $_SESSION['org']="Registration Email has been send at your email address";
        header('location:'.$site_url.'add_publisher');
      }
      else
      {
        $_SESSION['org']="Registration Email has not been send";
        header('location:'.$site_url.'add_publisher');
      }
    }
    else
    {
      $_SESSION['org']="Registration is not sucessful";
      header('location:'.$site_url.'add_publisher');
    }
  }
}
?>
