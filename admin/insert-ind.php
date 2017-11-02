<?php
if(isset($_POST['submit']))
{

$name = $_POST['fname'];
$location = implode(',', $_POST['location']);
$education = implode(',', $_POST['education']);
$history = implode(',', $_POST['work_history']);
$hours = $_POST['hours'];
$email = $_POST['email'];
$mob = $_POST['mob'];
$phone = $_POST['phone'];
$skype = $_POST['skype'];
$facebook = $_POST['facebook'];
$street = $_POST['street'];
$city = $_POST['city'];
$state = implode(',', $_POST['state']);
$zip = $_POST['zip'];


$dob1 = $_POST['dob'];

$dob = date('Y-m-d ', strtotime($dob1));
print_r($dob);
$citizenship = $_POST['citizenship'];
//$lname = $_POST['lname'];
$pass1 = $_POST['password'];
//$pass2 = $_POST['repassword'];
$pass3 = $_POST['password'];
$worktype = implode(',', $_POST['worktype']);
/*
if(($name=='') or ($location=='') or ($education=='') or ($history=='') or ($hours=='') or ($email=='') or ($mob=='') or ($phone=='') or ($skype=='') or ($facebook=='') or ($street=='') or ($city=='') or ($state=='') or ($zip=='') or ($dob=='') or ($citizenship=='') or ($pass1=='') or ($pass3=='') or ($worktype==''))
	
{
$_SESSION['indv'] = "Please fill All fields";	
$admin->redirect('add-individual');
	
	$stmt = $admin->runQuery("select * from tbl_individual_member where email=:email");
    $stmt->execute(array(':email' => $email));
			
    //$row=$stmt->fetch(PDO::FETCH_ASSOC);
    $rowcount = $stmt->rowCount();           
           }
		 else if($rowcount > 0)
            {
               
                $_SESSION['indv'] = "This Record Already Inserted..";
                $admin->redirect('dashboard');
                
            }
			
				
            else
            {
                if($admin->adindividual($name,$location,$education,$history,$hours,$email,$mob,$phone,$skype,$facebook,$street,$city,$state,$zip,$dob,$citizenship,$pass3,$worktype))
                {
                    
                    $_SESSION['indv'] = "Data Inserted Successfully..";
                    $admin->redirect('individual-details');
					

                }
            }*/


}	
?>