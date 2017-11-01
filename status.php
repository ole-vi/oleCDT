<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
ob_start();
session_start();
include('include/config.php');
 $email= $_GET['email'];
$sql1="update tbl_individual_member SET status='Active' where email='".$email."'";
$query1 = $conn->prepare($sql1);
$query1->execute();
if($query1)
{
echo"<script>window.location.href='http://localhost/~leonardmensah/fieldguide/login'</script>";


}
?>