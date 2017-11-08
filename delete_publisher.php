<?php
ob_start();
session_start();
include('include/config.php');

$id=base64_decode($_REQUEST['id']);

try
{
  $stmt = $conn->prepare("Delete from `pro_democracy` where `pro_id`=:id AND mem_id=:mid");
  $stmt->execute(array(':id'=>$id, ':mid'=>$_SESSION['id']));

  header('location:'.$site_url.'searching');
}
catch(PDOException $e)
{
  echo $e->getMessage();
}

?>
