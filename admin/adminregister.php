<?php
require_once('class/class.admin.php');
$admin = new ADMIN();
if($admin->is_loggedin()!="")
{
    $admin->redirect('dashboard');
}

if(isset($_POST['submit']))
{
    $uname = strip_tags($_POST['name']);
    $umail = strip_tags($_POST['email']);
    $upass = strip_tags($_POST['password']);   
    
    if($uname=="")  {
        $error[] = "Provide Name !";    
    }
    else if($umail=="") {
        $error[] = "Provide Email !";    
    }
    else if(!filter_var($umail, FILTER_VALIDATE_EMAIL)) {
        $error[] = 'Please enter a valid email address !';
    }
    else if($upass=="") {
        $error[] = "provide password !";
    }
    else if(strlen($upass) < 6){
        $error[] = "Password must be atleast 6 characters"; 
    }
    else
    {
        try
        {
            $stmt = $admin->runQuery("SELECT `admin_email` FROM `tbl_admin` WHERE  admin_email=:umail");
            $stmt->execute(array(':umail' => $umail));
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
                
            if($row['admin_email']==$umail) {
                $error[] = "Sorry username already taken !";
            }
           
            else
            {
                if($admin->adminregister($uname,$umail,$upass)){  
                    $admin->redirect('adminregister?joined');
                }
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }   
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<!--Head--><head>
    <meta charset="utf-8" />
    <title>fieldguidetodemocracy.org</title>

    <meta name="description" content="register page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

    <!--Basic Styles-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link id="bootstrap-rtl-link" href="#" rel="stylesheet" />
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />

    <!--Fonts-->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300" rel="stylesheet" type="text/css">

    <!--Beyond styles-->
    <link id="beyond-link" href="assets/css/beyond.min.css" rel="stylesheet" />
    <link href="assets/css/demo.min.css" rel="stylesheet" />
    <link href="assets/css/animate.min.css" rel="stylesheet" />
    <link id="skin-link" href="#" rel="stylesheet" type="text/css" />

    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
    <script src="assets/js/skins.min.js"></script>
</head>
<!--Head Ends-->
<!--Body-->
<body>
    <div class="register-container animated fadeInDown">
    <?php
            if(isset($error))
            {
                foreach($error as $error)
                {
                     ?>
                     <div class="alert alert-danger">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                     </div>
                     <?php
                }
            }
            else if(isset($_GET['joined']))
            {
                 ?>
                 <div class="alert alert-info">
                      <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href='index'>login</a> here
                 </div>
                 <?php
            }
            ?> 
        <div class="registerbox bg-white">
            <div class="registerbox-title">Register</div>
                       
			<hr>
            <form method="post" action="">
            <div class="registerbox-textbox">
                <input type="text" class="form-control" placeholder="Name" name="name" />
            </div>
			<div class="registerbox-textbox">
                <input type="email" class="form-control" placeholder="E-mail" name="email" />
            </div>
            <div class="registerbox-textbox">
                <input type="password" class="form-control" name="password" placeholder="Password" />
            </div>           
            
            <div class="registerbox-submit">
                <input type="submit" class="btn btn-primary pull-right" value="SUBMIT" name="submit">
            </div>
            </form>
        </div>       
    </div>

    <!--Basic Scripts-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/slimscroll/jquery.slimscroll.min.js"></script>

    <!--Beyond Scripts-->
    <script src="assets/js/beyond.min.js"></script>
    
    
</body>

</html>
