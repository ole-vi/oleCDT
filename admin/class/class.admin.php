<?php
@session_start();
require_once('dbconfig.php');

class ADMIN
{


private $conn;
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;

    }

    public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}

    public function adminregister($uname,$uemail,$upass)
	{
		try
		{
			$joindate = date('Y/m/d h:i:s a');
			$new_password = password_hash($upass, PASSWORD_DEFAULT);
			
			$stmt = $this->conn->prepare("INSERT INTO `tbl_admin`(admin_name,admin_email,admin_pass,admin_joindate) 
		                                               VALUES(:uname, :umail, :upass, :joindate)");
												  
			$stmt->bindparam(":uname", $uname);
			$stmt->bindparam(":umail", $uemail);
			$stmt->bindparam(":upass", $new_password);	
			$stmt->bindparam(":joindate" , $joindate);									  
				
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}

	public function adminLogin($umail,$upass)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT admin_id, admin_name, admin_email, admin_pass FROM `tbl_admin` WHERE admin_email=:umail ");
			$stmt->execute(array(':umail'=>$umail));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1)
			{
				if(password_verify($upass, $userRow['admin_pass']))
				{
					$_SESSION['admin_session'] = $userRow['admin_id'];
					$_SESSION['admin_sessionname'] = $userRow['admin_name'];
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	public function is_loggedin()
	{
		if(isset($_SESSION['admin_session']))
		{
			return true;
		}
	}

	public function doLogout()
	{
		session_destroy();
		unset($_SESSION['admin_session']);
		return true;
	}
	public function redirect($url)
	{
		header("Location: $url");
	}
	

	public function adindividual($name,$location,$education,$history,$hours,$email,$mob,$phone,$skype,$facebook,$street,$city,$state,$zip,$dob,$citizenship,$pass3,$worktype,$phone2,$phone3,$imgFile,$tmp_dir,$imgSize,$imgFile2,$tmp_dir2,$imgSize2)
	{
		
		if($imgFile!='') 
		{
			
			
		
		
			$upload_dir = '../img/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions = array("exl", "doc", "docm", "docx","csv","pdf","jpg");
		
			// rename uploading image
			$pic1 = rand(1000,1000000).".".$imgExt;
				
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){			
				// Check file size '10KB'
				if($imgSize < 5000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$pic1);
				}
				else{
					$msg = "Sorry, your file is too large.";
					//header("location:stream-details.php");
				}
			}
			
		
		
		// if no error occured, continue ....
		
	} 
		if($imgFile2!='') 
		{
			
			
		
		
			$upload_dir2 = '../img/'; // upload directory
	
			$imgExt2 = strtolower(pathinfo($imgFile2,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions2 = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
			// rename uploading image
			$pic2 = rand(1000,1000000).".".$imgExt2;
				
			// allow valid image file formats
			if(in_array($imgExt2, $valid_extensions2)){			
				// Check file size '10KB'
				if($imgSize2 < 5000000)				{
					move_uploaded_file($tmp_dir2,$upload_dir2.$pic2);
				}
				else{
					$msg = "Sorry, your file is too large.";
					//header("location:stream-details.php");
				}
			}
			
		
		
		// if no error occured, continue ....
		
	} 
			
		try
		{
			$status='Active';
			$pass4= md5($pass3);
			$joindate = date('Y/m/d');
			//$new_password = password_hash($upass, PASSWORD_DEFAULT);
			
			$stmt = $this->conn->prepare("insert into `tbl_individual_member` set name=:name, location=:location, work_type=:worktype, education=:education, work_history=:history, hours_perweak=:hours, email=:email, mob=:mob, phone=:phone ,office_phone=:phone2, other_phone=:phone3, skype=:skype , facebook=:facebook ,street=:street , city=:city , state=:state , zip=:zip , dob=:dob1 , citizenship=:citizenship , pic=:pic, resume=:pic2,  pass=:pass, status=:status, add_date=:date, last_update=:date");
												  
			$stmt->bindParam(':name', $name);
			$stmt->bindParam(':location', $location);
			$stmt->bindParam(':education', $education);
			$stmt->bindParam(':history', $history);
			$stmt->bindParam(':hours', $hours);
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':mob', $mob);
			$stmt->bindParam(':phone', $phone);
			$stmt->bindParam(':phone2', $phone2);
			$stmt->bindParam(':phone3', $phone3);
			$stmt->bindParam(':skype', $skype);
			$stmt->bindParam(':facebook', $facebook);
			$stmt->bindParam(':street', $street);
			$stmt->bindParam(':city', $city);
			$stmt->bindParam(':state', $state);
			$stmt->bindParam(':zip', $zip);
			$stmt->bindParam(':dob1', $dob);
			$stmt->bindParam(':citizenship', $citizenship);
			$stmt->bindParam(':date', $joindate);
			$stmt->bindParam(':pass', $pass4);
			$stmt->bindParam(':worktype', $worktype);
			$stmt->bindParam(':status', $status);								  
			$stmt->bindParam(':pic',$pic1, PDO::PARAM_STR);	
			$stmt->bindParam(':pic2',$pic2, PDO::PARAM_STR);	
			$stmt->execute();	
			
			$to = $email;
	      $from = "test@dppms.com";
		 
		   $subject ='Registration Sucessfully';
		   
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
									<strong>Individual Member Registration Confirmation</strong></td>
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
										User Name: '.$name.'</p>
										<p align="justify" class="style2">
										Password: '.$pass3.'</p>
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
		  
		  $headers  = 'MIME-Version: 1.0' . "\r\n";
          $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	      $headers .= 'From:'.$from."\r\n";
		 
		$res = mail ( $to, $subject, $message, $headers );
		

			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}

	public function delete_ind($id)
	{
		try
		{
			$stmt = $this->conn->prepare("Delete from `tbl_individual_member` where id=:id ");
			$stmt->execute(array(':id'=>$id));
			return $stmt;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
	
	public function hide_org($id)
	{
		try
		{
			$stmt = $this->conn->prepare("Update `pro_democracy` set `status`='Inactive' where `pro_id`=:id ");
			$stmt->execute(array(':id'=>$id));
			return $stmt;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function hide_ind($id)
	{
		try
		{
			$stmt = $this->conn->prepare("Update `tbl_individual_member` set `status`='Inactive' where id=:id ");
			$stmt->execute(array(':id'=>$id));
			return $stmt;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function delete_org($id)
	{
		try
		{
			$stmt = $this->conn->prepare("Delete from `pro_democracy` where pro_id=:id ");
			$stmt->execute(array(':id'=>$id));
			return $stmt;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
 
 public function editindividual($id,$name,$location,$education,$history,$hours,$email,$mob,$phone,$skype,$facebook,$street,$city,$state,$zip,$dob,$citizenship,$worktype,$w_other,$imgFile,$tmp_dir,$imgSize,$phone2,$phone3,$imgFile2,$tmp_dir2,$imgSize2)
	{
		if($imgFile!='') 
		{
			
			
		
		
			$upload_dir = '../img/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions = array("exl", "doc", "docm", "docx","csv","pdf","jpg");
		
			// rename uploading image
			$pic1 = rand(1000,1000000).".".$imgExt;
				
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){			
				// Check file size '10KB'
				if($imgSize < 10240)				{
					move_uploaded_file($tmp_dir,$upload_dir.$pic1);
				}
				else{
					$msg = "Sorry, your file is too large.";
					//header("location:stream-details.php");
				}
			}
			
		
		
		// if no error occured, continue ....
		if(!isset($msg))
		{
		$stmt = $this->conn->prepare('update `tbl_individual_member` SET  resume=:pic where id=:id');
			$stmt->bindParam(':pic',$pic1, PDO::PARAM_STR);
			$stmt->bindParam(':id',$id , PDO::PARAM_STR);			
			
			if($stmt->execute())
			{
				$successMSG = "new record succesfully inserted ...";				 
			}
			else
			{
				$errMSG = "error while inserting....";
			}
		}
	} 
	if($imgFile2!='') 
		{
			
			
		
		
			$upload_dir2 = '../img/'; // upload directory
	
			$imgExt2 = strtolower(pathinfo($imgFile2,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions2 = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
			// rename uploading image
			$pic2 = rand(1000,1000000).".".$imgExt2;
				
			// allow valid image file formats
			if(in_array($imgExt2, $valid_extensions2)){			
				// Check file size '10KB'
				if($imgSize2 < 5000000)				{
					move_uploaded_file($tmp_dir2,$upload_dir2.$pic2);
				}
				else{
					$msg2 = "Sorry, your file is too large.";
					//header("location:stream-details.php");
				}
			}
			
		
		
		// if no error occured, continue ....
		if(!isset($msg2))
		{
		$stmt = $this->conn->prepare('update `tbl_individual_member` SET  pic=:pic2 where id=:id');
			$stmt->bindParam(':pic2',$pic2, PDO::PARAM_STR);
			$stmt->bindParam(':id',$id , PDO::PARAM_STR);			
			
			if($stmt->execute())
			{
				$successMSG = "new record succesfully inserted ...";				 
			}
			else
			{
				$errMSG = "error while inserting....";
			}
		}
		
	} 
		
		
		try
		{
			$joindate = date('Y/m/d');
			//$new_password = password_hash($upass, PASSWORD_DEFAULT);
			
			$stmt = $this->conn->prepare("update `tbl_individual_member` set name=:name, location=:location, work_type=:worktype, education=:education, work_history=:history, hours_perweak=:hours, email=:email, mob=:mob, phone=:phone ,  office_phone=:phone2, other_phone=:phone3, skype=:skype , facebook=:facebook ,street=:street , city=:city , state=:state , zip=:zip , dob=:dob1 , citizenship=:citizenship ,w_other=:w_other, last_update=:date where id=:id ");
			$stmt->bindParam(':id', $id);									  
			$stmt->bindParam(':name', $name);
			$stmt->bindParam(':location', $location);
			$stmt->bindParam(':education', $education);
			$stmt->bindParam(':history', $history);
			$stmt->bindParam(':hours', $hours);
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':mob', $mob);
			$stmt->bindParam(':phone', $phone);
			$stmt->bindParam(':phone2', $phone2);
			$stmt->bindParam(':phone3', $phone3);
			$stmt->bindParam(':skype', $skype);
			$stmt->bindParam(':facebook', $facebook);
			$stmt->bindParam(':street', $street);
			$stmt->bindParam(':city', $city);
			$stmt->bindParam(':state', $state);
			$stmt->bindParam(':zip', $zip);
			$stmt->bindParam(':dob1', $dob);
			$stmt->bindParam(':citizenship', $citizenship);
			$stmt->bindParam(':date', $joindate);
			$stmt->bindParam(':w_other', $w_other);
			$stmt->bindParam(':worktype', $worktype);
											  
				
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}
	
	public function adorg($name,$web,$year,$tax,$lstatus,$location,$mission,$priorities,$achievements,$org,$m_info,$email,$phone,$skype,$e_name,$e_address,$e_phone,$e_email,$e_skype,$e_other,$seeking,$strategie,$state1,$w_type,$w_other,$imgFile,$tmp_dir,$imgSize)
	{
		
		if($imgFile!='') 
		{
			
			
		
		
			$upload_dir = '../img/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
			// rename uploading image
			$pic1 = rand(1000,1000000).".".$imgExt;
				
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){			
				// Check file size '10KB'
				if($imgSize < 10240)				{
					move_uploaded_file($tmp_dir,$upload_dir.$pic1);
				}
				else{
					$msg = "Sorry, your file is too large.";
					//header("location:stream-details.php");
				}
			}
			
		
		
		// if no error occured, continue ....
		
	}
		
		try
		{
			$status='Active';
			$joindate = date('Y/m/d');
			//$new_password = password_hash($upass, PASSWORD_DEFAULT);
			
			$stmt = $this->conn->prepare("insert into `pro_democracy` set name=:name, weblink=:web, establish_year=:year, tax_exempt=:tax, legal_status=:lstatus, location=:location, curr_priorities=:priorities, achievements=:achievements, associated_org=:org, more_info=:m_info,  seeking=:seeking, work_type=:w_type, w_other=:w_other, mission=:mission,logo=:pic, strategies=:strategie,  state=:state,  phone=:phone, email=:email, skype=:skype,  o_name=:o_name, o_address=:o_address, o_email=:o_email, o_phone=:o_phone, o_skype=:o_skype, o_other=:o_other, add_date=:date, status=:status, last_update=:date");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':web', $web);
$stmt->bindParam(':year', $year);
$stmt->bindParam(':tax', $tax);
$stmt->bindParam(':lstatus', $lstatus);
$stmt->bindParam(':location', $location);
$stmt->bindParam(':w_other', $w_other);
$stmt->bindParam(':mission', $mission);
$stmt->bindParam(':priorities', $priorities);
//$stmt->bindParam(':action', $action);
$stmt->bindParam(':achievements', $achievements);
$stmt->bindParam(':org', $org);
$stmt->bindParam(':m_info', $m_info);
$stmt->bindParam(':seeking', $seeking);
$stmt->bindParam(':w_type', $w_type);
$stmt->bindParam(':strategie', $strategie);
$stmt->bindParam(':state', $state1);
//$stmt->bindParam(':Volunteers', $Volunteers);
//$stmt->bindParam(':budget', $budget);
//$stmt->bindParam(':address', $address);
$stmt->bindParam(':phone', $phone);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':skype', $skype);
//$stmt->bindParam(':c_other', $c_other);
$stmt->bindParam(':o_address', $e_address);
$stmt->bindParam(':o_phone', $e_phone);
$stmt->bindParam(':o_email', $e_email);
$stmt->bindParam(':o_skype', $e_skype);
$stmt->bindParam(':o_other', $e_other);
//$stmt->bindParam(':c_name', $c_name);
$stmt->bindParam(':o_name', $e_name);
$stmt->bindParam(':date', $joindate );
$stmt->bindParam(':status', $status);
$stmt->bindParam(':pic',$pic1, PDO::PARAM_STR);
//$stmt->bindParam(':pic', $pic,);
			//$stmt->bindParam(':worktype', $worktype);
											  
				
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}
	
	public function editorg($id,$name,$web,$year,$tax,$lstatus,$location,$mission,$priorities,$action,$achievements,$org,$m_info,$email,$phone,$skype,$e_name,$e_address,$e_phone,$e_email,$e_skype,$e_other,$seeking,$strategie,$state1,$w_type,$w_other,$imgFile,$tmp_dir,$imgSize)
	{
		
		if($imgFile!='') 
		{
			
			
		
		
			$upload_dir = '../img/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
			// rename uploading image
			$pic1 = rand(1000,1000000).".".$imgExt;
				
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){			
				// Check file size '10KB'
				if($imgSize < 10240)				{
					move_uploaded_file($tmp_dir,$upload_dir.$pic1);
				}
				else{
					$msg = "Sorry, your file is too large.";
					//header("location:stream-details.php");
				}
			}
			
		
		
		// if no error occured, continue ....
		if(!isset($msg))
		{
		$stmt = $this->conn->prepare('update `pro_democracy` SET  logo=:pic where `pro_id`=:id');
			$stmt->bindParam(':pic',$pic1, PDO::PARAM_STR);
			$stmt->bindParam(':id',$id , PDO::PARAM_STR);			
			
			if($stmt->execute())
			{
				$successMSG = "new record succesfully inserted ...";				 
			}
			else
			{
				$errMSG = "error while inserting....";
			}
		}
	}
		
		try
		{
			$joindate = date('Y/m/d');
			//$new_password = password_hash($upass, PASSWORD_DEFAULT);
			
			$stmt = $this->conn->prepare("update `pro_democracy` set name=:name, weblink=:web, establish_year=:year, tax_exempt=:tax, legal_status=:lstatus, location=:location, curr_priorities=:priorities, curr_action=:action, achievements=:achievements, associated_org=:org, more_info=:m_info,  seeking=:seeking, work_type=:w_type, w_other=:w_other, mission=:mission, strategies=:strategie,  state=:state,  phone=:phone, email=:email, skype=:skype,  o_name=:o_name, o_address=:o_address, o_email=:o_email, o_phone=:o_phone, o_skype=:o_skype, o_other=:o_other, last_update=:date where `pro_id`=:id");
$stmt->bindParam(':id', $id);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':web', $web);
$stmt->bindParam(':year', $year);
$stmt->bindParam(':tax', $tax);
$stmt->bindParam(':lstatus', $lstatus);
$stmt->bindParam(':location', $location);
$stmt->bindParam(':w_other', $w_other);
$stmt->bindParam(':mission', $mission);
$stmt->bindParam(':priorities', $priorities);
$stmt->bindParam(':action', $action);
$stmt->bindParam(':achievements', $achievements);
$stmt->bindParam(':org', $org);
$stmt->bindParam(':m_info', $m_info);
$stmt->bindParam(':seeking', $seeking);
$stmt->bindParam(':w_type', $w_type);
$stmt->bindParam(':strategie', $strategie);
$stmt->bindParam(':state', $state1);
//$stmt->bindParam(':Volunteers', $Volunteers);
//$stmt->bindParam(':budget', $budget);
//$stmt->bindParam(':address', $address);
$stmt->bindParam(':phone', $phone);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':skype', $skype);
//$stmt->bindParam(':c_other', $c_other);
$stmt->bindParam(':o_address', $e_address);
$stmt->bindParam(':o_phone', $e_phone);
$stmt->bindParam(':o_email', $e_email);
$stmt->bindParam(':o_skype', $e_skype);
$stmt->bindParam(':o_other', $e_other);
//$stmt->bindParam(':c_name', $c_name);
$stmt->bindParam(':o_name', $e_name);
$stmt->bindParam(':date', $joindate );
//$stmt->bindParam(':confirm', $confirm,);

//$stmt->bindParam(':pic', $pic,);
			//$stmt->bindParam(':worktype', $worktype);
											  
				
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}	
		
	}

}


?>