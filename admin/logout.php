<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	require_once('session.php');
	require_once('class/class.admin.php');
	$user_logout = new ADMIN();
	
	if($user_logout->is_loggedin()!="")
	{
		$user_logout->redirect('dashboard.php');
	}
	if(isset($_GET['logout']) && $_GET['logout']=="true")
	{
		$user_logout->doLogout();
		$user_logout->redirect('index.php');
	}