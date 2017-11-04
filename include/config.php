<?php
$site_url = 'http://localhost/oleCDT/';
$host = 'localhost';
$dbname = 'dppms_fieldguide';
$username = 'root';
$password = 'lams';

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
$strategy_list = array('Get Money out of Politics',
  'Guarantee Voting Rights',
  'Advocate and Educate',
  'Dig into Data',
  'Take Legal Action',
  'Activate Citizens',
  'Fund the Movement',
  'Political Action Committee');
$strategy_class = array('koi-po', 'koi-po',
  'koi-po-1', 'koi-po-1', 'koi-po-1', 'koi-po-1', 'koi-po-1', 'koi-po-1');
?>
