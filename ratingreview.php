<?php
ob_start();
session_start();

include('include/config.php');

if(isset($_POST['ratings']))
{
  if((isset($_REQUEST['rating'])) and (isset($_REQUEST['review']))){
	  $vid = $_SESSION['id'];
	  $oid = $_REQUEST['oid'];
    //$title = $_REQUEST['title'];	
    $review = $_REQUEST['review'];	
    $rating = $_REQUEST['rating'];	
	  $date = date('Y/m/d h:i:sa');

    $sql = $conn->prepare("INSERT INTO `rating` SET oid=:oid, vid=:vid, rating=:score, review=:description, r_date=:cdate");
    $run = $sql->execute(array(':oid' => $oid , ':vid' => $vid, ':score' => $rating, ':description' => $review, ':cdate' => $date));
    if($run)
    {
      $_SESSION ['rate'] = 'You have rated '.$rating;	   
      header("location:" .$_SERVER['HTTP_REFERER']);		 
    }
  }
  else{
    $_SESSION ['rate'] = 'Fill Ratings';
    header("location:" .$_SERVER['HTTP_REFERER']);
  }
}
?>