<?php 
ob_start();
session_start();
include('include/config.php');
include('include/header.php');
if(isset($_POST['submit']))
{
	
echo $email=base64_decode($_REQUEST['email']);
	$pass1= trim($_POST['pass1']);
	$pass2= trim($_POST['pass2']);
	$pass3= md5($pass1);
	$length=strlen($pass1);
	if($length<5)
	{
	echo '<script language="javascript">';
	echo 'alert("Password should be minimun 5 char long")';
	echo '</script>';
	}
	elseif($length>8)
	{
	echo '<script language="javascript">';
	echo 'alert("Password should be maximum 8 char long")';
	echo '</script>';
	}
	elseif($pass1!=$pass2)
	{
	echo '<script language="javascript">';
	echo 'alert("Both password does not match")';
	echo '</script>';
	}
	else
	{
$sql = "update tbl_individual_member set pass=:pass where email=:email ";
$query = $conn->prepare($sql);
$query->bindParam(':pass', $pass3, PDO::PARAM_STR);
$query->bindParam(':email', $email, PDO::PARAM_STR);
$run = $query->execute();

if($run)
{
	
	echo '<script language="javascript">';
	echo 'alert("Password has been Updated")';
	echo '</script>';
}
else
{
	echo '<script language="javascript">';
	echo 'alert("Password has not been Updated")';
	echo '</script>';
}

}
}




?>
	        <div class="container">
	          <div class="row">
	            <div class="col-sm-3">
	              <!-- Brand and toggle get grouped for better mobile display -->
	              <div class="navbar-header">
	                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	                  <span class="sr-only">Toggle navigation</span>
	                  <span class="icon-bar"></span>
	                  <span class="icon-bar"></span>
	                  <span class="icon-bar"></span>
	                </button>
	                <h1 class="nav-logo"><a class="nav-brand" href="index.html"> <img class="mat"src="img/logo-white.png" ></a></h1>
	              </div>
	            </div>
	            <div class="col-sm-9 text-center">
	              <!-- Collect the nav toggling -->
	              <div class="collapse navbar-collapse navbar-geo" style="float:right;" id="bs-example-navbar-collapse-1">
	                <ul class="nav navbar-nav mar">
	                  <li class=""><a href="#">News</a></li>
	                  <li class=""><a href="#">Get Involved</a></li>
	                  <li class=""><a href="#"> Join & Update</a></li>
	                  <li class=""><a href="#">Learn More </a></li>
	                  <li class=""><a href="#">Glossary</a></li>
	                  <li class=""><a href="#">About Us</a></li>
	                 
	                </ul>             
	              </div><!-- /.navbar-collapse -->
	            </div>
				


	           
	          </div>
	        </div><!-- /.container -->
	      </nav>
	    </header>
	    <!-- header end -->
	    
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
			<h2>Reset Password</h2>
			<form action="" method="post">
					
					
					
					<input name="pass1" placeholder="Password" required type="password">
					<input name="pass2" placeholder="Confirm Password" required type="password">
					<input value="Reset Password" name="submit" type="submit">
			</form>
			
		</div>	<!-- /.intro-block end -->
					</div>
					<!-- /.intro-block end -->
				</div>
			</div>
		</section>
  
	<!-- footer start -->
		
<?php 

include('include/footer.php');


?>
	