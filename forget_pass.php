<?php 
ob_start();
session_start();
include('include/header.php');
include('include/config.php');
if(isset($_POST['submit']))
{
 $email= $_POST['email'];
 //$mail1	=  base64_encode($email);


$sql = "select * from tbl_individual_member where email=:email";
$query = $conn->prepare($sql);
$query->bindParam(':email', $email, PDO::PARAM_STR);
//$query->bindParam(':pass', $pass1, PDO::PARAM_STR);
$query->execute();
$count = $query->rowCount();
$row = $query->fetch(PDO::FETCH_ASSOC);
if($count>0)
{

//
	$to=$row['email'];
	      $from = "test@dppms.com";
		 
		   $subject ='Account Registration Sucessfully';
		   
		  $message='<table align="center" border="1" bordercolor="#caecf7" cellpadding="0" cellspacing="0" style="width: 804px;">
		<tbody>
			<tr align="center">
				<td class="area" height="19">
					<table border="0" cellpadding="0" cellspacing="0" style="height: 246px; width: 800px;">
						<tbody>
							<tr>
								<td align="center" bgcolor="#caecf7" class="smallgreylink" height="32">
									&nbsp;</td>
								<td align="left" bgcolor="#caecf7" class="style1 smallgreylink" height="32" style="padding-right: 5px;" valign="middle" width="97%">
									<strong>Organization Member Forgot Password Email</strong></td>
							</tr>
							<tr>
								<td align="center" class="smallgreylink" height="81" width="3%">
									&nbsp;</td>
								<td align="center" class="smallgreylink style1" height="81" style="padding-right: 5px;" valign="top">
									<p align="left" class="style2">
										Dear '.$row['name'].'</p>
									<p align="justify" class="style2">
										We have receive a request to reset your password. If you did not make the request,</p>
										<p>Just ignore this email. Otherwise you can reset yoour password using this link. </p>
									<a href="'.$site_url.'reset_pass/'.base64_encode($email).'">Reset Password</a>
									
										<p><strong>Thank You</strong></p>
									<p align="justify" class="style2">
										<strong>fieldguide Team</strong></p>
									<p align="justify" class="style2">
										&nbsp;</p>
								</td>
							</tr>
							<tr>
								<td align="center" bgcolor="#caecf7" class="smallgreylink" height="20">
									&nbsp;</td>
								<td align="left" bgcolor="#caecf7" class="smallgreylink style1" height="32" valign="middle">
									<br />
									&nbsp;</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>';
		  
		  $headers  = 'MIME-Version: 1.0' . "\r\n";
          $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	      $headers .= 'From:'.$from."\r\n";
		 
		$res = mail ( $to, $subject, $message, $headers );
if ($res) 
           { 
                
				echo '<script language="javascript">';
				echo 'alert("An Email has been send for Reset Password")';
				echo '</script>';
					
					
		   }
else
{

		
			//header('location:'.$site_url.'forget_pass.php');	
			echo '<script language="javascript">';
					echo 'alert("Email not Send")';
					echo '</script>';
				
					
}
}
//	


else
{
	
	echo '<script language="javascript">';
	echo 'alert("Email Id does not Exist")';
	echo '</script>';
	//header('location:'.$site_url.'forget_pass.php');	
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
			<h2>Forgot Password</h2>
			<form action="" method="post">
				
					<input name="email" placeholder="Email" required type="text">
					
					<input value="Submit" name="submit" type="submit">
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
	