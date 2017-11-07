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
  $dt_web = isset($_REQUEST['web']) ? $_REQUEST['web'] : '';
  $dt_mission = isset($_REQUEST['mission']) ? $_REQUEST['mission'] : '';
  $dt_m_info = isset($_REQUEST['m_info']) ? $_REQUEST['m_info'] : '';
  $dt_c_name = isset($_REQUEST['c_name']) ? $_REQUEST['c_name'] : '';
  $dt_c_email = isset($_REQUEST['c_email']) ? $_REQUEST['c_email'] : '';
  $dt_c_phone = isset($_REQUEST['c_phone']) ? $_REQUEST['c_phone'] : '';
  $dt_c_url = isset($_REQUEST['c_url']) ? $_REQUEST['c_url'] : '';
  $dt_c_address = isset($_REQUEST['c_address']) ? $_REQUEST['c_address'] : '';
  $dt_o_name = isset($_REQUEST['o_name']) ? $_REQUEST['o_name'] : '';
  $dt_o_address = isset($_REQUEST['o_address']) ? $_REQUEST['o_address'] : '';
  $dt_o_phone = isset($_REQUEST['o_phone']) ? $_REQUEST['o_phone'] : '';
  $dt_o_email = isset($_REQUEST['o_email']) ? $_REQUEST['o_email'] : '';
  $dt_o_skype = isset($_REQUEST['o_skype']) ? $_REQUEST['o_skype'] : '';
  $dt_o_other = isset($_REQUEST['o_other']) ? $_REQUEST['o_other'] : '';
  $dt_grade = isset($_REQUEST['grade']) ? implode('::', $_REQUEST['grade']): '';
  $dt_subject = isset($_REQUEST['subject']) ? implode('::', $_REQUEST['subject']): '';
  $dt_format = isset($_REQUEST['format']) ? implode('::', $_REQUEST['format']): '';
  $dt_distribution = isset($_REQUEST['distribution']) ? implode('::', $_REQUEST['distribution']): '';
  $dt_license = isset($_REQUEST['license']) ? implode('::', $_REQUEST['license']): '';
  $dt_language = isset($_REQUEST['language']) ? implode('::', $_REQUEST['language']): '';
  $dt_msa = isset($_REQUEST['msa']) ? implode('::', $_REQUEST['msa']): '';
  $dt_wcag = isset($_REQUEST['wcag']) ? implode('::', $_REQUEST['wcag']): '';
  $dt_pub_available = isset($_REQUEST['pub_available']) ? implode('::', $_REQUEST['pub_available']): '';
  $dt_curriculum = isset($_REQUEST['curriculum']) ? $_REQUEST['curriculum'] : '';
  $dt_edu_usage = isset($_REQUEST['edu_usage']) ? $_REQUEST['edu_usage'] : '';
  $dt_edu_content = isset($_REQUEST['edu_content']) ? implode('::', $_REQUEST['edu_content']): '';
  $dt_assessment = isset($_REQUEST['assessment']) ? implode('::', $_REQUEST['assessment']): '';
  $dt_content_usage = isset($_REQUEST['content_usage']) ? $_REQUEST['content_usage'] : '';
  $dt_content_other = isset($_REQUEST['content_other']) ? $_REQUEST['content_other'] : '';
  $dt_content_quality = isset($_REQUEST['content_quality']) ? $_REQUEST['content_quality'] : '';

  $dt_interest1 = isset($_REQUEST['interest1']) ? implode('::', $_REQUEST['interest1']): '';
  $dt_interest2 = isset($_REQUEST['interest2']) ? implode('::', $_REQUEST['interest2']): '';
  $dt_interest3 = isset($_REQUEST['interest3']) ? implode('::', $_REQUEST['interest3']): '';
  $dt_interest4 = isset($_REQUEST['interest4']) ? implode('::', $_REQUEST['interest4']): '';

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
      header('location:'.$site_url.'add_publisher');
    }
  }

  //$path="uploaded_doc/" .$pic;


  $sql = "select * from `tbl_publishers` where o_email=:o_email";
  $query = $conn->prepare($sql);
  $query->bindParam(':o_email', $dt_o_email, PDO::PARAM_STR);
  $query->execute();
  $count = $query->rowCount();
  if($count>0)
  {
    $_SESSION['msg']="Email Already Exist";
    header('location:'.$site_url.'add_publisher');
  }
  else
  {
    $sql1 = "insert into `tbl_publishers` set name=:name, web=:web, mission=:mission, m_info=:m_info, c_name=:cname, c_email=:c_email, c_phone=:c_phone, c_url=:c_url, c_address=:c_address, o_name=:o_name, o_address=:o_address, o_phone=:o_phone, o_email=:o_email, o_skype=:o_skype, o_other=:o_other, pic=:pic, grade=:grade, subject=:subject, format=:format, distribution=:distribution, license=:license, language=:language, msa=:msa, wcag=:wcag, pub_available=:pub_available, curriculum=:curriculum, edu_usage=:edu_usage, edu_content=:edu_content, assessment=:assessment, content_usage=:content_usage, content_other=:content_other, content_quality=:content_quality, interest1=:interest1, interest2=:interest2, interest3=:interest3, interest4=:interest4, add_date=:date, last_update=:date, status=:status, mem_id=:mem_id";
    $query1 = $conn->prepare($sql1);
    $query1->bindParam(':name', $dt_name, PDO::PARAM_STR);
    $query1->bindParam(':web', $dt_web, PDO::PARAM_STR);
    $query1->bindParam(':mission', $dt_mission, PDO::PARAM_STR);
    $query1->bindParam(':m_info', $dt_m_info, PDO::PARAM_STR);
    $query1->bindParam(':c_name', $dt_c_name, PDO::PARAM_STR);
    $query1->bindParam(':c_email', $dt_c_email, PDO::PARAM_STR);
    $query1->bindParam(':c_phone', $dt_c_phone, PDO::PARAM_STR);
    $query1->bindParam(':c_url', $dt_c_url, PDO::PARAM_STR);
    $query1->bindParam(':c_address', $dt_c_address, PDO::PARAM_STR);
    $query1->bindParam(':o_name', $dt_o_name, PDO::PARAM_STR);
    $query1->bindParam(':o_address', $dt_o_address, PDO::PARAM_STR);
    $query1->bindParam(':o_phone', $dt_o_phone, PDO::PARAM_STR);
    $query1->bindParam(':o_email', $dt_o_email, PDO::PARAM_STR);
    $query1->bindParam(':o_skype', $dt_o_skype, PDO::PARAM_STR);
    $query1->bindParam(':o_other', $dt_o_other, PDO::PARAM_STR);
    $query1->bindParam(':grade', $dt_grade, PDO::PARAM_STR);
    $query1->bindParam(':subject', $dt_subject, PDO::PARAM_STR);
    $query1->bindParam(':format', $dt_format, PDO::PARAM_STR);
    $query1->bindParam(':distribution', $dt_distribution, PDO::PARAM_STR);
    $query1->bindParam(':license', $dt_license, PDO::PARAM_STR);
    $query1->bindParam(':language', $dt_language, PDO::PARAM_STR);
    $query1->bindParam(':msa', $dt_msa, PDO::PARAM_STR);
    $query1->bindParam(':wcag', $dt_wcag, PDO::PARAM_STR);
    $query1->bindParam(':pub_available', $dt_pub_available, PDO::PARAM_STR);
    $query1->bindParam(':curriculum', $dt_curriculum, PDO::PARAM_STR);
    $query1->bindParam(':edu_usage', $dt_edu_usage, PDO::PARAM_STR);
    $query1->bindParam(':edu_content', $dt_edu_content, PDO::PARAM_STR);
    $query1->bindParam(':assessment', $dt_assessment, PDO::PARAM_STR);
    $query1->bindParam(':content_usage', $dt_content_usage, PDO::PARAM_STR);
    $query1->bindParam(':content_other', $dt_content_other, PDO::PARAM_STR);
    $query1->bindParam(':content_quality', $dt_content_quality, PDO::PARAM_STR);
    $query1->bindParam(':interest1', $dt_interest1, PDO::PARAM_STR);
    $query1->bindParam(':interest2', $dt_interest2, PDO::PARAM_STR);
    $query1->bindParam(':interest3', $dt_interest3, PDO::PARAM_STR);
    $query1->bindParam(':interest4', $dt_interest4, PDO::PARAM_STR);
    $query1->bindParam(':date', $date, PDO::PARAM_STR);
    $query1->bindParam(':status', $status, PDO::PARAM_STR);
    $query1->bindParam(':mem_id', $_SESSION['id'], PDO::PARAM_STR);

    $query1->bindParam(':pic', $pic, PDO::PARAM_STR);
    $run=$query1->execute();
    if($run)
    {
      /*$pubId = $conn->lastInsertId();
      $link_publisher = 'update tbl_individual_member set publisher=:pid where id = :indId';
      $query1 = $conn->prepare($link_publisher);
      $query1->bindParam(':pid', $pubId, PDO::PARAM_STR);
      $query1->bindParam(':indId', $_SESSION['id'], PDO::PARAM_STR);
      $query1->execute();*/

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
        header('location:'.$site_url.'detailpage?id='.base64_encode($pubId));
      }
      else
      {
        $_SESSION['msg']="Registration Email has not been send";
        header('location:'.$site_url.'detailpage?id='.base64_encode($pubId));
      }
    }
    else
    {
      $_SESSION['msg']="Registration is not sucessful";
      header('location:'.$site_url.'add_publisher');
    }
  }
}
?>
