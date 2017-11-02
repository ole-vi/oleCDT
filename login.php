<?php 
ob_start();
session_start();
include('include/config.php');
include('include/header.php');

if(isset($_POST['submit1']))
{
	$user=trim($_POST['username']);
	
  $pass= trim($_POST['password']);
	$pass1= md5($pass);

  $sql = "select * from tbl_individual_member where name='".$user."' and pass='".$pass1."' and status='Active'";
  $query = $conn->prepare($sql);
  $query->bindParam(':email', $user, PDO::PARAM_STR);
  $query->bindParam(':pass', $pass, PDO::PARAM_STR);
  $query->execute();
  $count = $query->rowCount();
  $count;
  $row = $query->fetch(PDO::FETCH_ASSOC);
  if($count>0)
  {
	  $_SESSION['id']=$row['id'];
	  echo $_SESSION['name']=$row['name'];
	  echo $_SESSION['email']=$row['email'];
	
	  header('location:'.$site_url.'searching');
	  echo '<script language="javascript">';
	  echo 'alert("Welcome")';
	  echo '</script>';
  }
  else
  {
	  echo '<script language="javascript">';
	  echo 'alert("please check your confirmation mail and activate account with proper information")';
	  echo '</script>';
  }	
}
?>	    
<!-- banner start --> 
		
<!-- banner end -->

<!-- trial start -->
		
<!-- trial end -->

<!-- intro start -->
<section class="login">
  <div class="container">
    <div class="row">
				
    </div>
  </div>
</section>

<section id="intro" class="intro-area white">
	<div class="container">		
		<div class="row">
			<div class="login-form w3-agile">
	      <h2>Login</h2>
	      <form action="" method="post">
			    <p>Username</p>
			    <input name="username" placeholder="Username" required type="text">
			    <p>Password</p>
			    <input name="password" placeholder="Password" required type="password">
			    <input value="Login" name="submit1" type="submit">
	      </form>
	      <a href="forget_pass">forgot password?</a>
		  </div>
		</div>
	</div>
</section>

<!-- footer start -->		
<?php 
include('include/footer.php');
?>
	