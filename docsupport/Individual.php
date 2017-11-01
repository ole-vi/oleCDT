
<?php 
ob_start();
session_start();
include('include/header.php');
include('include/config.php');

?>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
  <script src="chosen.jquery.js" type="text/javascript"></script>
  <script src="docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
  
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
    $("#mob2").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg2").html("Digits Only").show().fadeOut("slow");
               return false;
    }
	
   });
    $("#mob3").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg3").html("Digits Only").show().fadeOut("slow");
               return false;
    }
	
   });
   
  $("#mob").change(function()
{
	var no = $("#mob").val();
	  if(no.length!=10){
		 //$("#errmsg").html("Ten Digits Only").show().fadeOut("slow"); 
		 $("#errmsg").addClass("red11"); 
		 msgbox.html("Ten Digits Only");
	  }
});
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
 <script type="text/javascript">
$(document).ready(function()
{


$("#repassword").change(function()
{
var pass1 = $("#password").val();
var pass2 = $("#repassword").val();
var msgbox = $("#status2");


$("#status2").html('<img src="loader.gif">&nbsp;Checking availability.');

$.ajax({
type: "POST",
url: "check_ajax.php",
data: "pass1="+ pass1 +"&pass2="+ pass2,
success: function(msg){
$("#status2").html(function(event, request){

if(msg == 'OK')
{

$("#repassword").removeClass("red11"); // remove red color
$("#repassword").addClass("green11"); // add green color
msgbox.html('<img src="yes.png"> <font color="Green"> Available </font>');
}
else
{
// if you don't want background color remove these following two lines
$("#repassword").removeClass("green11"); // remove green color
$("#repassword").addClass("red11"); // add red  color
msgbox.html(msg);
}
});
}
});



});
});
</script>
<link rel="stylesheet" href="docsupport/style.css">
  <link rel="stylesheet" href="docsupport/prism.css">
  <link rel="stylesheet" href="chosen.css">
  <style type="text/css" media="all">
    /* fix rtl for demo */
    .chosen-rtl .chosen-drop { left: -9000px; }
  </style>
<style>

            .fstElement { font-size: 1.2em; }
            .fstToggleBtn { min-width: 16.5em; }

            .submitBtn { display: none; }

            .fstMultipleMode { display: block; }
            .fstMultipleMode .fstControls { width: 100%; }

 
#status1
{
font-size:11px;
margin-left:10px;
}
#status2
{
font-size:11px;
margin-left:310px;
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
<?php 
					
					if(isset($_SESSION['ind']))
					{
						$msg=$_SESSION['ind'];
					echo '<script language="javascript">';
					echo 'alert("'.$msg.'")';
					echo '</script>';
						unset($_SESSION['ind']);
					}
					?>
		<section id="contact" class="" style="padding: 139px 0 161%;">
			<div class="container">
			<div class="row">

  <h2 class="text-center flo">Individual Member Signup</h2>
  <div class="full-form" style=" margin-top: 57px;">
  <div class="bor-1">
  
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
     
      <div class="form-menu bor">
   <form class="form-horizontal" role="form" method="POST" action="insert_individual">
                
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-9">
                        <input id="firstName" required placeholder="Full Name" name="fname" class="form-control" autofocus="" type="text">
                       
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                        <input id="mail1" required name="email" placeholder="Email" class="form-control" autofocus="" type="text">
                       <span id="status1"></span>
                    </div>
                </div>
				
				 
				<div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label"></label>
                    <div class="col-sm-9">
					  <label for="firstName" class=" control-label">Login Name</label>
                        <input id="Citizenship" required name="lname" placeholder="Name" class="form-control" autofocus="" type="text">
                       
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label"></label>
                    <div class="col-sm-9">
					  <label for="firstName" class=" control-label">Password</label>
                        <input id="password"   required name="password" placeholder="Enter Password" class="form-control bal-color" autofocus="" type="password">
                       
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label"></label>
                    <div class="col-sm-9">
					  <label for="firstName" class=" control-label">Re Enter Password</label>
                        <input    required name="repassword" id="repassword" placeholder="Re Enter Password" class="form-control bal-color" autofocus="" type="password">
                       
                    </div>
					<span id="status2"></span>
                </div>
				
				
				<div class="form-group">
                    <label class="control-label col-sm-3">Type of Work</label>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4">
                                <label class="radio-inline">
                                    <input id="administrativeCheckbox" value="Administrative" name="worktype[]" type="checkbox"><span class="mat">Administrative</span>
                                </label>
                            </div>
                            <div class="col-sm-4">
                                <label class="radio-inline">
                                    <input id="accountingCheckbox" value="Accounting" type="checkbox" name="worktype[]"><span class="mat">Accounting</span>
                                </label>
                            </div>
                            <div class="col-sm-4">
                                <label class="radio-inline pad">
                                    <input id="canvasing door-to-doorCheckbox" value="Canvasing door-to-door" type="checkbox" name="worktype[]"><span class="mat">Canvasing door-to-door</span>
                                </label>
                            </div> 
							<div class="col-sm-4">
                                <label class="radio-inline">
                                       <input id="legalCheckbox" value="Legal" name="worktype[]" type="checkbox"><span class="mat">Legal</span>
                                </label>
                            </div>
							<div class="col-sm-4">
                                <label class="radio-inline">
                                    <input id="LegislationCheckbox" value="Legislation" name="worktype[]" type="checkbox"> <span class="mat">Legislation</span>
                                </label>
                            </div>
							<div class="col-sm-4">
                                <label class="radio-inline">
								
                                   <input id="MediaCheckbox" value="Media" type="checkbox" name="worktype[]"><span class="mat">Media</span>
                                </label>
                            </div>
							<div class="col-sm-4">
                                <label class="radio-inline">
								
                                   <input id="Phone BankCheckbox" name="worktype[]" value="Phone Bank" type="checkbox"><span class="mat">Phone Bank</span>
                                </label>
                            </div>
							
							<div class="col-sm-4">
                                <label class="radio-inline">
								
                                   <input id="Web ManagementCheckbox" value="Web Management" name="worktype[]" type="checkbox"><span class="mat">Web Management</span>
                                </label>
                            </div>
							
							<div class="col-sm-4">
                                <label class="radio-inline">
								
                                   <input id="writingCheckbox" value="Writing" value="worktype[]" type="checkbox"><span class="mat">Writing</span>
                                </label>
                            </div>
							<div class="col-sm-4">
                                <label class="radio-inline">
								
                                   <input id="writingCheckbox" value="Fund Raising" name="worktype[]" type="checkbox"><span class="mat">Fund Raising</span>
                                </label>
                            </div>
							<div class="col-sm-4">
                                <label class="radio-inline">
								
                                   
								   <input id="Other" placeholder="Other" class="form-control hrt" name="worktype[]" autofocus="" type="text">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="form-group">
                    <label class="control-label col-sm-3">Possible Work Locations</label>
                   
					<div class="col-sm-9">
                     <select data-placeholder="Select Work Locations" class="chosen-select" multiple name="location[]" style="width:350px;" tabindex="4">  
					   
                <option value="Office">Office</option>
                <option value="Online">Online</option>
                <option value="Field">Field</option>
                
             
            </select>  
                       
                    </div>

				   <!--<div class="col-sm-6 margt">
                        <div class="row">
						
                            <div class="col-sm-4">
                                <label class="radio-inline">
                                     <input name="location" value="Office" type="radio"><span class="mat">Office</span>
                                </label>
                            </div>
                            <div class="col-sm-4">
                                <label class="radio-inline">
                                     <input name="location"  value="Online" type="radio"><span class="mat">Online</span>
                                </label>
                            </div>
                            <div class="col-sm-4">
                                <label class="radio-inline pad">
                                    <input name="location" value="Field " type="radio"><span class="mat">Field </span>
                                </label>
                            </div> 
							
							
							
							
							
							
							
						
							
                        </div>
                    </div>-->
                </div>
				<div class="form-group">
                    <label for="country" class="col-sm-3 control-label">Possible Hours of Work</label>
                    <div class="col-sm-9">
                        <input type="text" name="hours" required id="country" class="form-control">
                            
                    </div>
                </div>
				<div class="form-group">
                    <label for="Education" class="col-sm-3 control-label">Education</label>
                    <div class="col-sm-9">
                        <input id="Education" required name="education" placeholder="Education" class="form-control" autofocus="" type="text">
                       
                    </div>
                </div>
                <div class="form-group">
                    <label for="firstName"  class="col-sm-3 control-label">Work History</label>
                    <div class="col-sm-9">
                        
						<textarea class="form-control" required name="work_history" placeholder="Work History"></textarea>
                       
                    </div>
                </div>
				
				
				
				
				
				
				
				
				<div class="form-group">
                    <label for="firstName"  class="col-sm-3 control-label">Mobile phone</label>
                    <div class="col-sm-9">
                        <input id="mob" maxlength="10" placeholder="Mobile phone" class="form-control" autofocus="" required name="mob" type="text">
                       <span id="errmsg"></span>
                    </div>
                </div>
				<div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Home phone</label>
                    <div class="col-sm-9">
                        <input id="mob1"  placeholder="Home phone" maxlength="10" class="form-control" autofocus=""  name="phone" type="text">
                       <span id="errmsg1"></span>
                    </div>
                </div>
				<div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Office phone</label>
                    <div class="col-sm-9">
                        <input id="mob2"  placeholder="Office phone" maxlength="10" class="form-control" autofocus=""  name="off_phone" type="text">
                       <span id="errmsg2"></span>
                    </div>
                </div>
				<div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Other phone</label>
                    <div class="col-sm-9">
                        <input id="mob3"  placeholder="Other phone" maxlength="10" class="form-control" autofocus=""  name="o_phone" type="text">
                       <span id="errmsg3"></span>
                    </div>
                </div>
				<div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Skype</label>
                    <div class="col-sm-9">
                        <input id="Skype"  name="skype" placeholder="Skype" class="form-control" autofocus="" type="text">
                       
                    </div>
                </div>
				
				
				<div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Facebook</label>
                    <div class="col-sm-9">
                        <input id="Face-book"  name="facebook" placeholder="Face-book" class="form-control" autofocus="" type="text">
                       
                    </div>
                </div>
				
				
			<div class="form-group col-sm-12">
                     <label class="control-label col-sm-3 pada">Address</label>
                    <div class="col-sm-3">
                     <div class="inpu">
                          
							
                      <input id="Street" placeholder="Street" required class="form-control" autofocus="" name="street" type="text">
                       
                    
                        </div>   
                       
                    </div>
					
					<div class="col-sm-3">
                     <div class="inpu">
                          
							
                      <input id="City" name="city" required placeholder="City" class="form-control" autofocus="" type="text">
                       
                    
                        </div>   
                       
                    </div>
					
					<div class="col-sm-3">
                     <div class="inpu">
                          
							
                      <input id="Zip" placeholder="Zip" required name="zip" class="form-control" autofocus="" type="text">
                       
                    
                        </div>   
                       
                    </div>
					<div class="col-sm-3">
                       
                       
                    </div>
					
					<div class="col-sm-3">
                     <div class="mar">
                          
						
                     
<select data-placeholder="Select State" class="chosen-select" name="state[]" multiple style="width:350px;" tabindex="4">				 
 
                <option value="Alaska">Alaska</option>
<option value="Alabama">Alabama</option>
<option value="Arizona">Arizona</option>
<option value="Arkansas">Arkansas</option>
<option value="California">California</option>
<option value="Colorado">Colorado</option>
<option value="Connecticut">Connecticut</option>
<option value="Delaware">Delaware</option>
<option value="Florida">Florida</option>
<option value="Georgia">Georgia</option>
<option value="Hawaii">Hawaii</option>
<option value="Idaho">Idaho</option>
<option value="Illinois">Illinois</option>
<option value="Indiana">Indiana</option>
<option value="Iowa">Iowa</option>
<option value="Kansas">Kansas</option>
<option value="Kentucky">Kentucky</option>
<option value="Louisiana">Louisiana</option>
<option value="Maine">Maine</option>
<option value="Maryland">Maryland</option>
<option value="Massachusetts">Massachusetts</option>
<option value="Michigan">Michigan</option>               
<option value="Minnesota">Minnesota</option>
<option value="Mississippi">Mississippi</option>
<option value="Missouri">Missouri</option>
<option value="Montana">Montana</option>
<option value="Nebraska">Nebraska</option>
<option value="Nevada">Nevada</option>
<option value="New Hampshire">New Hampshire</option>
<option value="New Jersey">New Jersey</option>
<option value="New Mexico">New Mexico</option>
<option value="New York">New York</option>
<option value="North Carolina">North Carolina</option>
<option value="North Dakota">North Dakota</option>
<option value="Ohio">Ohio</option>
<option value="Oklahoma">Oklahoma</option>
<option value="Oregon">Oregon</option>
<option value="Pennsylvania">Pennsylvania</option>
<option value="Rhode Island">Rhode Island</option>
<option value="South Carolina">South Carolina</option>
<option value="South Dakota">South Dakota</option>
<option value="Tennessee">Tennessee</option>
<option value="Texas">Texas</option>
<option value="Utah">Utah</option>
<option value="Vermont">Vermont</option>
<option value="Virginia">Virginia</option>
<option value="Washington">Washington</option>
<option value="West Virginia">West Virginia</option>
<option value="Wisconsin">Wisconsin</option>
<option value="Wyoming">Wyoming</option>
                
             
            </select>  
                       
                    
                        </div>   
                       
                    </div>
					<script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  </script>
					
					
					
                </div>
				

				<div class="form-group">
                    <label for="firstName"  class="col-sm-3 control-label"> Birth Date</label>
                    <div class="col-sm-4">
                        <input id="dateofplay" name="dob" required placeholder=" Birth Date" class="form-control" autofocus="" type="text">
                       
                    </div>
					<div class="col-sm-5">
                        <input id="Citizenship" required name="citizenship" placeholder="Citizenship" class="form-control" autofocus="" type="text">
                       
                    </div>
                </div>
				
				
				
                
				
				
				<div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Propose a New Organization</label>
					<div class="col-sm-6">
					  
                        <input id="org" required name="org" placeholder="Name of Organization" class="form-control" autofocus="" type="text">
                       
                    </div>
					
                </div>
				<div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Attach Resume</label>
                    <div class="col-sm-3">
                        <input id="pic" name="pic" class="custom-file-input" autofocus="" type="file">
                       
                    </div>
                </div>
				
				
				<div class="form-group col-sm-12 margngh">
                    <div class="col-sm-2 ">
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-block">
                    </div>
					<!-- <div class="col-sm-2 ">
                        <button type="reset" class="btn btn-primary btn-block">Reset</button>
                    </div>
					<div class="col-sm-2 ">
                        <a href="<?php echo $site_url;?>organization.php" class="btn btn-primary btn-block">Organization Sign up </a>
                    </div>-->
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

  
