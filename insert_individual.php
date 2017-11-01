<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(0);
ob_start();
session_start();
include('include/config.php');

if(isset($_POST['submit']))
{
	
$name = $_REQUEST['fname'];
$location = implode(',',$_REQUEST['location']);
$education = $_REQUEST['education'];
$history = $_REQUEST['work_history'];
$hours = $_REQUEST['hours'];
$email = $_REQUEST['email'];
$mob = $_REQUEST['mob'];
$phone = $_REQUEST['phone'];
$phone2 = $_REQUEST['off_phone'];
$phone3 = $_REQUEST['o_phone'];
$skype = $_REQUEST['skype'];
$facebook = $_REQUEST['facebook'];
$street = $_REQUEST['street'];
$city = $_REQUEST['city'];
$state = implode(',', $_REQUEST['state']);
$zip = $_REQUEST['zip'];
$dob1 = $_POST['dob'];
$dob = date('Y-m-d ', strtotime($dob1));
$citizenship = $_REQUEST['citizenship'];
$lname = $_REQUEST['lname'];
$pass1 = $_REQUEST['password'];
$pass2 = $_REQUEST['repassword'];
$pass3 = md5($pass1);

$worktype = implode(',', $_POST['worktype']);
$date = date("Y-m-d H:i:s");
$status='inactive';



		$imgFile = $_FILES['pic1']['name'];
		$tmp_dir = $_FILES['pic1']['tmp_name'];
		$imgSize = $_FILES['pic1']['size'];		
		
		
			$upload_dir = 'img/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions = array("exl", "doc", "docm", "docx","csv","pdf","jpg"); // valid extensions
		
			// rename uploading image
		   $pic1 = rand(1000,1000000).".".$imgExt;
				
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){			
				// Check file size '5MB'
				if($imgSize < 5000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$pic1);
				}
				else
				{
					
					
					$_SESSION['org']="Sorry, your file is large than 5MB";
					header('location:'.$site_url.'organization');
					
					
				}
				
			}



		$imgFile = $_FILES['pic']['name'];
		$tmp_dir = $_FILES['pic']['tmp_name'];
		$imgSize = $_FILES['pic']['size'];		
		
		
			$upload_dir = 'img/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
			// rename uploading image
		   $pic = rand(1000,1000000).".".$imgExt;
				
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){			
				// Check file size '5MB'
				if($imgSize < 5000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$pic);
				}
				else
				{
					
					
					$_SESSION['org']="Sorry, your file is large than 5MB";
					header('location:'.$site_url.'organization');
					
					
				}
				
			}
			

$sql = "select * from tbl_individual_member where email=:email";
$query = $conn->prepare($sql);
$query->bindParam(':email', $email, PDO::PARAM_STR);
$query->execute();
$count = $query->rowCount();
if($count>0)
{
	$_SESSION['ind']="Email Already Exist";
	header('location:'.$site_url.'Individual');
}
elseif($pass1!=$pass2)
{
	$_SESSION['ind']="Please Enter Same Password";
	header('location:'.$site_url.'Individual');
}
else
{
$sql1 = "insert into `tbl_individual_member` set name=:name, location=:location, work_type=:worktype, education=:education, work_history=:history, hours_perweak=:hours, email=:email, mob=:mob, phone=:phone, office_phone=:phone2,other_phone=:phone3, skype=:skype , facebook=:facebook , pic=:pic, resume=:pic1,street=:street , city=:city , state=:state , zip=:zip , dob=:dob , citizenship=:citizenship , l_name=:lname , pass=:pass, last_update=:date, add_date=:date, status=:status";
$query1 = $conn->prepare($sql1);
$query1->bindParam(':name', $name, PDO::PARAM_STR);
$query1->bindParam(':location', $location, PDO::PARAM_STR);
$query1->bindParam(':education', $education, PDO::PARAM_STR);
$query1->bindParam(':history', $history, PDO::PARAM_STR);
$query1->bindParam(':hours', $hours, PDO::PARAM_STR);
$query1->bindParam(':email', $email, PDO::PARAM_STR);
$query1->bindParam(':mob', $mob, PDO::PARAM_STR);
$query1->bindParam(':phone', $phone, PDO::PARAM_STR);
$query1->bindParam(':phone2', $phone2, PDO::PARAM_STR);
$query1->bindParam(':phone3', $phone3, PDO::PARAM_STR);
$query1->bindParam(':skype', $skype, PDO::PARAM_STR);
$query1->bindParam(':facebook', $facebook, PDO::PARAM_STR);
$query1->bindParam(':street', $street, PDO::PARAM_STR);
$query1->bindParam(':city', $city, PDO::PARAM_STR);
$query1->bindParam(':state', $state, PDO::PARAM_STR);
$query1->bindParam(':zip', $zip, PDO::PARAM_STR);
$query1->bindParam(':dob', $dob, PDO::PARAM_STR);
$query1->bindParam(':citizenship', $citizenship, PDO::PARAM_STR);
$query1->bindParam(':lname', $lname, PDO::PARAM_STR);
$query1->bindParam(':pass', $pass3, PDO::PARAM_STR);
$query1->bindParam(':worktype', $worktype, PDO::PARAM_STR);
$query1->bindParam(':date', $date, PDO::PARAM_STR);
$query1->bindParam(':status', $status, PDO::PARAM_STR);
$query1->bindParam(':pic', $pic, PDO::PARAM_STR);
$query1->bindParam(':pic1', $pic1, PDO::PARAM_STR);
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
										Click here for activation of your account.<a href="http://localhost/~leonardmensah/fieldguide/status.php?email='.$email.'">click here</a></p>
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
      echo '<script>window.location.href="http://localhost/~leonardmensah/fieldguide"</script>';
//$_SESSION['ind']="Thank You for your registration! verification link has been send to your corresponding email check it.";	
//header('location:http://localhost/~leonardmensah/fieldguide');
		   }
else
{
$_SESSION['ind1']="Login details has not been send";	
header('location:'.$site_url.'Individual');
}		   
		   }
else
{
$_SESSION['ind']="Record is not Inserted";	
header('location:'.$site_url.'Individual');
}
}
}


?>
