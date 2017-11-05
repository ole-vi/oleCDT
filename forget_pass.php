<?php 
ob_start();
session_start();
include('include/config.php');
include('include/header.php');
if(isset($_POST['submit']))
{
  $email= $_POST['email'];

  $sql = "select * from tbl_individual_member where email=:email";
  $query = $conn->prepare($sql);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->execute();
  $count = $query->rowCount();
  $row = $query->fetch(PDO::FETCH_ASSOC);
  if($count>0)
  {
    $to=$row['email'];
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
                    <strong>Organization Member Forgot Password Email</strong></td>
                </tr>
                <tr>
                  <td align="center" class="smallgreylink" height="81" width="3%">
                    &nbsp;</td>
                  <td align="center" class="smallgreylink style1" height="81" style="padding-right: 5px;" valign="top">
                    <p align="left" class="style2">
                      Dear '.$row['name'].'</p>
                    <p align="justify" class="style2">
                      We have receive a request to reset your password. If you did not make the request,</p>
                      <p>Just ignore this email. Otherwise you can reset yoour password using this link. </p>
                    <a href="'.$site_url.'reset_pass/'.base64_encode($email).'">Reset Password</a>
                  
                      <p><strong>Thank You</strong></p>
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
    print_r(base64_encode($email)); exit;
    $res = mail ( $to, $subject, $message, $headers );
    if ($res)
    {
      echo '<script language="javascript">';
      echo 'alert("An Email has been send for Reset Password")';
      echo '</script>';
    }
    else
    {
      echo '<script language="javascript">';
      echo 'alert("Email not Send")';
      echo '</script>';
    }
  }
  else
  {
    echo '<script language="javascript">';
    echo 'alert("Email Id does not Exist")';
    echo '</script>';
  }
}
?>

<!-- intro start -->
<section class="login">
  <div class="container">
      <div class="row">
      </div>
  </div>
</section>
<section id="intro" class="intro-area white">
  <div class="container">
    <div class="row">
      <div class="login-form w3-agile">
        <h2>Forgot Password</h2>
        <form action="" method="post">
            <input name="email" placeholder="Email" required type="text">
            <input value="Submit" name="submit" type="submit">
        </form>
      </div>
      <!-- /.intro-block end -->
    </div>
  </div>
</section>

<!-- footer start -->
<?php
include('include/footer.php');
?>
