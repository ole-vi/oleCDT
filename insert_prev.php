<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
ob_start();
session_start();
include('include/config.php');

if(isset($_POST['preview']))
{

	
$name = $_REQUEST['name'];
$web = $_REQUEST['web'];
$year = $_REQUEST['year'];
@$tax = $_REQUEST['tax'];
$lstatus = $_REQUEST['lstatus'];
$location = implode(',', $_REQUEST['location']);
$l_other = $_REQUEST['l_other'];
$mission = implode(',', $_REQUEST['mission']);
$priorities = implode(',', $_REQUEST['priorities']);
$achievements =implode(',', $_REQUEST['achievements']);
$org = implode(',', $_REQUEST['org']);
$m_info = implode(',', $_REQUEST['m_info']);
@$state1 = implode(',',$_REQUEST['state']);
 

$c_name = $_REQUEST['c_name'];
$address = $_REQUEST['address'];
$phone = $_REQUEST['phone'];
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
$date = date("Y-m-d");
$status= 'Active';
 
 

        $imgFile = $_FILES['pic']['name'];
		$tmp_dir = $_FILES['pic']['tmp_name'];
		$imgSize = $_FILES['pic']['size'];		
		
		
			$upload_dir = 'img/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions = array("exl", "doc", "docm", "docx","csv","pdf","jpg"); // valid extensions
		
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
					echo '<script language="javascript">';
					echo 'alert("Sorry, your file is too large")';
					echo '</script>';
					
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
	
					echo '<script language="javascript">';
					echo 'alert("Email Already Exist")';
					echo '</script>';
}
else
{
$sql1 = "insert into `pro_democracy` set name=:name, weblink=:web, establish_year=:year, tax_exempt=:tax, legal_status=:lstatus, location=:location, curr_priorities=:priorities, achievements=:achievements, associated_org=:org, more_info=:m_info, logo=:pic, seeking=:seeking, work_type=:w_type, w_other=:w_other, mission=:mission, strategies=:strategie,  state=:state, c_name=:c_name, address=:address, phone=:phone, email=:email, skype=:skype, other=:c_other, o_name=:o_name, o_address=:o_address, o_email=:o_email, o_phone=:o_phone, o_skype=:o_skype, o_other=:o_other,  add_date=:date, last_update=:date, status=:status";
$query1 = $conn->prepare($sql1);
$query1->bindParam(':name', $name, PDO::PARAM_STR);
$query1->bindParam(':web', $web, PDO::PARAM_STR);
$query1->bindParam(':year', $year, PDO::PARAM_STR);
$query1->bindParam(':tax', $tax, PDO::PARAM_STR);
$query1->bindParam(':lstatus', $lstatus, PDO::PARAM_STR);
$query1->bindParam(':location', $location, PDO::PARAM_STR);
$query1->bindParam(':w_other', $w_other, PDO::PARAM_STR);
$query1->bindParam(':mission', $mission, PDO::PARAM_STR);
$query1->bindParam(':priorities', $priorities, PDO::PARAM_STR);
$query1->bindParam(':achievements', $achievements, PDO::PARAM_STR);
$query1->bindParam(':org', $org, PDO::PARAM_STR);
$query1->bindParam(':m_info', $m_info, PDO::PARAM_STR);
$query1->bindParam(':seeking', $seeking, PDO::PARAM_STR);
$query1->bindParam(':w_type', $w_type, PDO::PARAM_STR);
$query1->bindParam(':strategie', $strategie, PDO::PARAM_STR);
$query1->bindParam(':state', $state1, PDO::PARAM_STR);
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
$query1->bindParam(':pic', $pic, PDO::PARAM_STR);
$query1->bindParam(':status', $status, PDO::PARAM_STR);

$run=$query1->execute();
$lid = $conn->lastInsertId();
if($run)
{


            
                header('location:'.$site_url.'org_preview/'.base64_encode($lid));
				 
					
					
}
else
{

		header('location:'.$site_url.'organization');

			
					
					
}


}
}
?>