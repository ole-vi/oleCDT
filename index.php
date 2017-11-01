<!DOCTYPE html>
<html>
<?
ob_start();
session_start();
include('include/header.php');
?>	    
    <!-- banner start --> 
		<?php 
					
					if(isset($_SESSION['ind1']))
					{
						$msg=$_SESSION['ind1'];
					echo '<script language="javascript">';
					echo 'alert("'.$msg.'")';
					echo '</script>';
						unset($_SESSION['ind1']);
					}
					?>
		<section id="banner" class="banner-area">
			<div class="color-overlay">
				<div class="container">
					<div class="col-sm-4 " >
					</div>
					<div class="col-sm-4 " >
					</div>
					
						<div class="col-sm-4 bac" >
							<h2 >​
Field Guide to the Democracy Movement
​</h2>
<div class="co">

</div>
<h2>​
 
THE MOVEMENT IS HERE, ARE YOU IN?

​</h2>
<div class="co">

</div>
							
							
                            <!--/.apps-icon end-->
							<div class="download-block">
							<p>First Time Here?</p>
						
								<a class="btn ban" href="#">Get Started</a>
								
								
							</div>
							
							<div class="download-block">
							<p>First Time Here?</p>
								<a class="btn ban" href="#">Go to the Field Guide </a>
								
							</div>
						</div>
				
				</div>
				<!-- /.container end -->
			</div>
			<!-- /.color-overlay end -->
		</section>
	<!-- banner end -->

	<!-- trial start -->
		
	<!-- trial end -->

	<!-- intro start -->
		<section id="intro" class="intro-area white">
			<div class="container">
				
				<div class="row">
				
					<div class="col-sm-12 jal">
						<div class="manu" data-wow-delay=".6s" data-wow-duration="1s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.6s; animation-name: fadeInRight;">
							<p class=" jal-2"><span><b>OUR</b></span><br>
                                           MISSION
</p>					
						</div>
						<!-- /.intro-block end -->
					</div>
					
					
						<div class="col-sm-6 mart">
						<div class="text" data-wow-delay="0s" data-wow-duration="1s" style="visibility: visible; animation-duration: 1s; animation-delay: 0s; animation-name: fadeInRight;">
							
							
							<p>To build power and momentum strong enough to create historic
							change, a social movement must be conscious of itself and 
							visible to others. To succeed, we each must see a welcoming 
							place for ourselves in the potentially transformative Democracy 
							Movement. So in this <span style="font-style:italic;">Field Guide</span>, we strive to make connection easy
							and to generate excitement about the vast scope and diverse aspects
							of the rising Democracy Movement. Courage is contagious.
							As we connect with others already standing up boldly for democracy,
							we spark confidence in ourselves and others.</p>
						</div>
						
						<!-- /.intro-block end -->
					</div>
					<!-- /.intro-block end -->
				</div>
			</div>
		</section>
    <!-- /.intro end -->

    <!-- feature start -->
		
	<!-- feature end -->
	
	<!-- more_feature start -->
		
	<!-- more_feature end -->

	<!-- counter start --> 
		
	<!-- counter end --> 

	<!-- description start --> 
		
	<!-- description end -->

	<!-- how it work start -->
		
    <!-- howitwork end -->

    <!-- screenshot start -->
	    
    <!-- /.screenshot end -->
	
	<!-- review start -->
		<section id="review" class="review">
			<div class="color-overlay">
				
				
				<!-- /.review-slider -->
			</div> 
			<!-- transpharent background -->      
		</section>
	<!-- /.review end -->

	<!-- price start -->
		
	<!-- /.price end -->

	<!-- download start -->
		
    <!-- /.download end -->

    <!-- team start --> 
		
	<!-- team end --> 

	<!-- purchase start --> 
		
	<!-- purchase end -->

	<!-- faq start --> 
		
	<!-- faq end -->

	<!-- subscribe start --> 
		
	<!-- subscribe end -->

	<!-- contact start --> 
		<section id="contact" class="contact-area">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 text-center pera-12" style="visibility: visible; animation-name: fadeInUp;">
						<h2 class="pera">WHAT'S HAPPENING <b>NOW?</b></h2>
						<div class="sub-heading">
						
						</div>						
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 divider">
						<h3>(Twitter Feeds from the organizations in this Field Guide)</h3>
						<iframe width="100%" height="488px" src="http://www-fieldguidetodemocracy-org.usrfiles.com/html/45eb90_7f7777553b95a17ff58f2ac9ade431f8.html" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.1.1.$SITE_PAGES.$c1537.1.$comp-ifwfibx7.1.$mediairc1npsu1/=1$mediairc1npsu1.1.$comp-isag1taw.1.$comp-isafnpvc.0.0"></iframe>
					
				</div>
				<div class="col-sm-6">
						<div class="contact-block">
							<h3>(News and blogs from the organizations in this Field Guide)</h3>
							<iframe width="100%" height="488px" src="http://www-fieldguidetodemocracy-org.usrfiles.com/html/45eb90_783347b3ace44903bd1ef35347ea1526.html" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$PAGES_CONTAINER.1.1.$SITE_PAGES.$c1537.1.$comp-ifwfibx7.1.$mediairc1npsu1/=1$mediairc1npsu1.1.$comp-isag5fsw.1.$comp-isafkegm.0.0"></iframe>
						</div>
						<!-- /.contact-block end -->
					</div>
			</div>
		</section>
	<!-- contact end -->

	

	<!-- footer start -->
	

<?php include('include/footer.php');?>	
   
          
  
</body></html>