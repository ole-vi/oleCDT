<?php
include('include/config.php');
session_start();
unset($_SESSION['id']);
session_destroy();
header('location:'.$site_url);
exit;
?>