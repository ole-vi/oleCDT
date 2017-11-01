
<?php 
ob_start();
session_start();
include('include/header.php');
include('include/config.php');

?>
    
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/
libs/jquery/1.3.0/jquery.min.js"></script>
 <script type="text/javascript">
$(document).ready(function()
{
 $("#mob").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
	
   });
   $("#mob1").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg1").html("Digits Only").show().fadeOut("slow");
               return false;
    }
	
   });
   
  /* $("#mob").change(function()
{
	var no = $("#mob").val();
	  if(no.length!=10){
		 //$("#errmsg").html("Ten Digits Only").show().fadeOut("slow"); 
		 $("#errmsg").addClass("red11"); 
		 msgbox.html("Ten Digits Only");
	  }
});*/
$("#mail1").change(function()
{
var username = $("#mail1").val();
var msgbox = $("#status1");


$("#status1").html('<img src="loader.gif">&nbsp;Checking availability.');

$.ajax({
type: "POST",
url: "check_ajax.php",
data: "email="+ username,
success: function(msg){
$("#status1").html(function(event, request){

if(msg == 'OK')
{

$("#mail1").removeClass("red11"); // remove red color
$("#mail1").addClass("green11"); // add green color
msgbox.html('<img src="yes.png"> <font color="Green"> Available </font>');
}
else
{
// if you don't want background color remove these following two lines
$("#mail1").removeClass("green11"); // remove green color
$("#mail1").addClass("red11"); // add red  color
msgbox.html(msg);
}
});
}
});



});
});
</script>
<style>
#status1
{
font-size:11px;
margin-left:10px;
}
.green11
{
background-color:#CEFFCE;
}
.red11
{
background-color:#FFD9D9;
}
</style>
		<section id="contact" class=" background-img-uplod" style="padding: 156px 0 5%;">
			<div class="container">
			<div class="row">
<div class="col-sm-12 jal mar-left-12 pad-ouar">
						<div class="manu" data-wow-delay=".6s" data-wow-duration="1s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.6s; animation-name: fadeInRight;">
							<p class=" jal-2"><span><h1>Welcome</h1></span><br>
                                        
</p>					
						</div>
						<!-- /.intro-block end -->
					</div>
                 <div class="text-pera">
				 <h2>Welcome to the Field Guide to the Democracy Movement</h2>
				 <p><b>Our Goals.</b>  The Field Guide is designed to help you find, learn about, 
				 and join organizations that are addressing issues and strategies concerning
				 democracy that are important for you, including those working in locations close to you.   It providesdescription of organizations that are committed 
				 to strengthening democracy and makes it easy for you to connect with them.</p>
				 <p>As a Member of the Field Guide community you can create your personal profile of interests, skills, the types of work and locations that interests you.  You can choose toshare your profile with those organizations that match some or all of the features of your profile.  Your personal profile will be shared only with those organizations that you choose to contact through the Guide.  
                       We also make it easy for you, as a Member, to identify and sign up additional organizations 
                         that share our commitment to wor
                           k together in the Democracy Movement.  </p>
						   
						   <script> 
$(document).ready(function(){
    $("#flip").click(function(){
        $("#panel").slideToggle("slow");
    });
});
</script>
                       <div class="men-div">
						   <div id="flip" class="mean-clas"><h1> Read Field Guide Policies</h1>
						  </div>
                      <div id="panel" class="wor"> 
					    <h3>As a Member of the Field Guide you agree:</h3>
 <h3> Our Basic Policies.</h3>
<p>a) to always be respectful in your contributions to the Guide and not use language that is hateful or disparaging of individuals 
						   or organizations, even regarding those you with which you strongly disagree;</p>
						   <p>b) to accurately and honestly describe yourself, other individuals and organizations, not misrepresenting 
						   facts, or shading the truth in ways that can mislead others, </p>
						   <p>c) to cite credible sources that support controversial statements, and</p>
						   <p>d) to notify the Editor of the Field Guide immediately,using the Guide’s Feedback form, whenever you experience anything in the Guide that violates these basic policies,.</p>

<h4>Thank you and Welcome to the Field Guide to the Democracy Movement.</h4>
                               <h4><input required="" name="confirm" type="checkbox">
							   I have read,endorse the Purpose and accept Basic Policies of the Field Guide.</h4>
 <div class="col-sm-12 voli">
                      <a href="Individual">   <button type="submit" class="btn btn-primary btn-block belpo">Accept</button></a>
                    </div>
</div>

</div>
						 
						   
                               

				 </div>
					
                </div>
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
					
				
				
				
				
				 <!-- /.form-group -->
               <!-- /.form-group -->
			  
                
            </form>
    </div>
    </div>
    
    
  </div>
  </div>
  </div>
</div>
</div>

		</section>
	<!-- contact end -->

	<!-- map start --> 
		
		<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/themes/cupertino/jquery-ui.css">

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
	   <script>
    $( "#dateofplay" ).datepicker({
      altField: "#alternate1",
      altFormat: "DD, d MM, yy",
      showWeek: true,
      maxDate: 0,         
  changeMonth: true,
     changeYear: true,
  yearRange: "-5:+0",
      
   
     });
</script>	
	<!-- map end -->

	
<?php include('include/footer.php');?>

  
