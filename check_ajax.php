<?php
include('include/config.php');
if(isset($_POST['username']))
{
  $username = $_POST['username'];

  if(strlen($username)<3)
  {
	  echo "<font color='#cc0000'>Invalid Email Address.</font>";
  }
  else
  {
    $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";

    if (preg_match($pattern, $username)){ 
     
      //return true; 
      //echo "<font color='#cc0000'>Invalid Email Address.</font>";
  
      $sql_check = "SELECT * from pro_democracy where o_email =:a";
      $query = $conn->prepare($sql_check);
      $query->bindParam(':a' , $username, PDO::PARAM_STR);
      $query->execute();

      if($query->rowCount() > 0)
      {
        echo "<font color='#cc0000'><b>'".$username."'</b> is already in use.</font>";
      }
      else
      {
        echo "OK";
      }
    }
    else
    {
    echo "<font color='#cc0000'>Invalid Email Address.</font>";
    }
  }
}
else if(isset($_POST['email']))
{
  $username = $_POST['email'];

  if(strlen($username)<3)
  {
	  echo "<font color='#cc0000'>Invalid Email Address.</font>";
  }
  else
  {
    $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";

    if (preg_match($pattern, $username)){ 
     
      //return true; 
      //echo "<font color='#cc0000'>Invalid Email Address.</font>";
  
      $sql_check = "SELECT * from tbl_individual_member where email =:a";
      $query = $conn->prepare($sql_check);
      $query->bindParam(':a' , $username, PDO::PARAM_STR);
      $query->execute();

      if($query->rowCount() > 0)
      {
        echo "<font color='#cc0000'><b>'".$username."'</b> is already in use.</font>";
      }
      else
      {
        echo "OK";
      }
    }
    else
    {
      echo "<font color='#cc0000'>Invalid Email Address.</font>";
    }
  }
}
elseif(isset($_POST['mobile']))
{
  $mobile = $_POST['mobile'];

  if(strlen($mobile)<10)
  {
	  echo "<font color='#cc0000'>Invalid Phone Number.</font>";
  }
  elseif(strlen($mobile)>12)
  {
	  echo "<font color='#cc0000'>Invalid Phone Number.</font>";
  }
  else
  {
    echo "OK";
  }
}
elseif(isset($_POST['mobile2']))
{
  $mobile2 = $_POST['mobile2'];

  if(strlen($mobile2)<10)
  {
	  echo "<font color='#cc0000'>Invalid Phone Number.</font>";
  }
  elseif(strlen($mobile2)>12)
  {
	  echo "<font color='#cc0000'>Invalid Phone Number.</font>";
  }
  else
  {
    echo "OK";
  }
}
elseif(isset($_POST['pass2']))
{
  $pass1 = $_POST['pass1'];
  $pass2 = $_POST['pass2'];

  if($pass1=='')
  {
	  echo "<font color='#cc0000'>First Type Your Password</font>";
  }
  elseif($pass1!=$pass2)
  {
	  echo "<font color='#cc0000'>Please Type same Password</font>";
  }
  else
  {
    echo "OK";
  }
}
?>
