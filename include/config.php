<?php
$site_url = 'http://localhost:8000/fieldguide/';
$host = 'localhost';
$dbname = 'dppms_fieldguide';
$username = 'dppms';
$password = 'dfHGf$3987Jgf';

date_default_timezone_set("Asia/Kolkata");

try {
  $conn = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
}
catch(PDOException $e)
{
  echo "Connection failed: " . $e->getMessage();
}
?>
