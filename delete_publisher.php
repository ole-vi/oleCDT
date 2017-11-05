<?php
ob_start();
session_start();
include('include/config.php');

if(!empty($_SESSION['publisher'])) {
  $id = $_SESSION['publisher'];
} else {
  header('location:'.$site_url.'searching');
}

try
{
  $stmt = $conn->prepare("Delete from `pro_democracy` where `pro_id`=:id ");
  $stmt->execute(array(':id'=>$id));
  $stmt1 = $conn->prepare("update `tbl_individual_member` set `publisher` = '' where `id` =:mid");
  $stmt1->execute(array(':mid'=>$_SESSION['id']));

  header('location:'.$site_url.'searching');
}
catch(PDOException $e)
{
  echo $e->getMessage();
}

?>
