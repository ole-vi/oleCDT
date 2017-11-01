<?php 
ob_start();
session_start();
include('include/config.php');
include('include/header.php');
if(isset($_POST['submit1']))
{
	$user=trim($_POST['username']);
	
$pass= trim($_POST['password']);
$pass1= $pass;
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
			<h2>Login</h2>
			<form action="" method="post">
					<p>Username</p>
					<input name="username" placeholder="Username" required type="text">
					<p>Password</p>
					<input name="password" placeholder="Password" required type="password">
					<input value="Login" name="submit1" type="submit">
			</form>
			<a href="forget_pass">forgot password?</a>
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
	