<?
session_start();
require_once("class/class.admin.php");
$admin = new ADMIN();
$id=$_REQUEST['id'];
$admin->delete_ind($id);

?>