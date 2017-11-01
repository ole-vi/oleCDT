<?php
require_once('class/class.admin.php');
$admin = new ADMIN();
$id=$_SESSION['id'];
if($_SESSION['id']=="")
{
    echo '<script> window.location.href="login.php"</script>';
}


$stmt = $admin->runQuery("select * from tbl_individual_member where id=:id");
$stmt->execute(array(':id' => $id));
$row1=$stmt->fetch(PDO::FETCH_ASSOC);

$name=$row1['name'];


 ?>









<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- Head -->
<head>
    <meta charset="utf-8" />
    <title>Fieldguidetodemocracy.org</title>

    <meta name="description" content="form layouts" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

    <!--Basic Styles-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link id="bootstrap-rtl-link" href="#" rel="stylesheet" />
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/css/weather-icons.min.css" rel="stylesheet" />

    <!--Fonts-->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300" rel="stylesheet" type="text/css">

    <!--Beyond styles-->
    <link id="beyond-link" href="assets/css/beyond.min.css" rel="stylesheet" />
    <link href="assets/css/demo.min.css" rel="stylesheet" />
    <link href="assets/css/typicons.min.css" rel="stylesheet" />
    <link href="assets/css/animate.min.css" rel="stylesheet" />
    <link id="skin-link" href="#" rel="stylesheet" type="text/css" />

    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
    <script src="assets/js/skins.min.js"></script>
    <script type="text/javascript">
        setTimeout(function () {
         $(".alert").fadeOut();
      },6000); // 5 seconds

       </script>
</head>
<!-- /Head -->
<!-- Body -->
<body>
    <!-- Loading Container -->
    <!--<div class="loading-container">
        <div class="loader"></div>
    </div>-->
    <!--  /Loading Container -->
	<!-- Navbar -->
    <div class="navbar">
        <div class="navbar-inner">
            <div class="navbar-container">
                <!-- Navbar Barnd -->
                <div class="navbar-header pull-left">
                    <a href="#" class="navbar-brand">
                        <small>
                            <img src="assets/img/logo.png" alt="" />
                        </small>
                    </a>
                </div>
                <!-- /Navbar Barnd -->
                
                <!-- Account Area and Settings -->
                <div class="navbar-header pull-right">
                    <div class="navbar-account">
                        <ul class="account-area">
                             <li>
                                <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                    
                                    <section>
                                        <h2><span class="profile"><span> Mr. <?php echo ucfirst($name); ?></span></span></h2>
                                    </section>
                                </a>
                                <!--Login Area Dropdown-->
                                <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">                    
                                   
                                    
                                    <li class="dropdown-footer">
                                        <a href="javascript:void(0);">Profile</a>
                                        
                                    </li>
                                   
                                    <li class="dropdown-footer">
                                        <a href="../logout.php">
                                            Sign out
                                        </a>
                                    </li>
 <li class="dropdown-footer">
                         <a href="userchangedpwd.php">
                                         change password
                                        </a>
                                    </li>
                                </ul>
                                <!--/Login Area Dropdown-->
                            </li>
                      
                           
                        </ul>
                     
                    </div>
                </div>
                <!-- /Account Area and Settings -->
            </div>
        </div>
    </div>
    <!-- /Navbar -->