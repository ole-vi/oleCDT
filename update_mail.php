<?php
session_start();
include('include/config.php');

// $email=array();
$last_month = date("F-Y", strtotime(date('Y-m')." -1 month"));
 
$sql = "select `pro_id`,`last_update` from `pro_democracy` where `status`='Active' ";
$query = $conn->prepare($sql);
$query->execute();

$date = date("Y-m-d");
while($row = $query->fetch(PDO::FETCH_ASSOC))
{
  $l_update= $row['last_update'];

  $diff = abs(strtotime($date) - strtotime($l_update));

  $years = floor($diff / (365*60*60*24));
  $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
  $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

  //printf("%d ", $years);

  if($years >= 1)
  {
  
    $id= $row['pro_id'];

    $sql1 = "select * from pro_democracy where `status`='Active' and `pro_id`=$id";
    $query1 = $conn->prepare($sql1);
    $query1->execute();
  
    while($row1 = $query1->fetch(PDO::FETCH_ASSOC))
    {
      $id1= $row1['pro_id'];
      $update= $row1['last_update'];
      $email=$row1['o_email'];

      $to=$email;
      $from = "test@dppms.com";
		 
      $subject ='Profile Updation';
		   
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
									  <strong>Profile Updation</strong></td>
							  </tr>
							  <tr>
								  <td align="center" class="smallgreylink" height="81" width="3%">
									  &nbsp;</td>
								  <td align="center" class="smallgreylink style1" height="81" style="padding-right: 5px;" valign="top">
									  <p align="left" class="style2">
										  Dear '.$row1['name'].'</p>
									  <p align="justify" class="style2">
										  You updated your profile before one year,</p>
									  <p align="justify" class="style2">
										  Please Update your profile Else your account has been Blocked.</p>
									
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
    }
  }
}
?>