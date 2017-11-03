<?php
session_start();
include('include/config.php');
include('include/header.php');
?>
	<!-- contact start --> 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
  <script src="js/chosen.jquery.js" type="text/javascript"></script>
  <script src="docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
		
<script type="text/javascript">
/**
 * jQuery.textareaCounter
 * Version 1.0
 * Copyright (c) 2011 c.bavota - http://bavotasan.com
 * Dual licensed under MIT and GPL.
 * Date: 10/20/2011
**/
(function($){
	$.fn.textareaCounter = function(options) {
		// setting the defaults
		// $("textarea").textareaCounter({ limit: 100 });
		var defaults = {
			limit: 100
		};	
		var options = $.extend(defaults, options);
 
		// and the plugin begins
		return this.each(function() {
			var obj, text, wordcount, limited;
			
			obj = $(this);
			obj.after('<span style="font-size: 11px; clear: both; margin-top: 3px; display: block;" id="counter-text">Max. '+options.limit+' words</span>');

			obj.keyup(function() {
			    text = obj.val();
			    if(text === "") {
			    	wordcount = 0;
			    } else {
				    wordcount = $.trim(text).split(" ").length;
				}
			    if(wordcount > options.limit) {
			        $("#counter-text").html('<span style="color: #DD0000;">0 words left</span>');
					limited = $.trim(text).split(" ", options.limit);
					limited = limited.join(" ");
					$(this).val(limited);
			    } else {
			        $("#counter-text").html((options.limit - wordcount)+' words left');
			    } 
			});
		});
	};
})(jQuery);
</script>
<script type="text/javascript">
/**
 * jQuery.textareaCounter
 * Version 1.0
 * Copyright (c) 2011 c.bavota - http://bavotasan.com
 * Dual licensed under MIT and GPL.
 * Date: 10/20/2011
**/
(function($){
	$.fn.textareaCounter1 = function(options) {
		// setting the defaults
		// $("textarea").textareaCounter({ limit: 100 });
		var defaults = {
			limit: 500
		};	
		var options = $.extend(defaults, options);
 
		// and the plugin begins
		return this.each(function() {
			var obj, text, wordcount, limited;
			
			obj = $(this);
			obj.after('<span style="font-size: 11px; clear: both; margin-top: 3px; display: block;" id="counter-text1">Max. '+options.limit+' words</span>');

			obj.keyup(function() {
			    text = obj.val();
			    if(text === "") {
			    	wordcount = 0;
			    } else {
				    wordcount = $.trim(text).split(" ").length;
				}
			    if(wordcount > options.limit) {
			        $("#counter-text1").html('<span style="color: #FF0000;">0 words left</span>');
					limited = $.trim(text).split(" ", options.limit);
					limited = limited.join(" ");
					$(this).val(limited);
			    } else {
			        $("#counter-text1").html((options.limit - wordcount)+' words left');
			    } 
			});
		});
	};
})(jQuery);
</script>
<script type="text/javascript">
/**
 * jQuery.textareaCounter
 * Version 1.0
 * Copyright (c) 2011 c.bavota - http://bavotasan.com
 * Dual licensed under MIT and GPL.
 * Date: 10/20/2011
**/
(function($){
	$.fn.textareaCounter2 = function(options) {
		// setting the defaults
		// $("textarea").textareaCounter({ limit: 100 });
		var defaults = {
			limit: 500
		};	
		var options = $.extend(defaults, options);
 
		// and the plugin begins
		return this.each(function() {
			var obj, text, wordcount, limited;
			
			obj = $(this);
			obj.after('<span style="font-size: 11px; clear: both; margin-top: 3px; display: block;" id="counter-text2">Max. '+options.limit+' words</span>');

			obj.keyup(function() {
			    text = obj.val();
			    if(text === "") {
			    	wordcount = 0;
			    } else {
				    wordcount = $.trim(text).split(" ").length;
				}
			    if(wordcount > options.limit) {
			        $("#counter-text2").html('<span style="color: #FF0000;">0 words left</span>');
					limited = $.trim(text).split(" ", options.limit);
					limited = limited.join(" ");
					$(this).val(limited);
			    } else {
			        $("#counter-text2").html((options.limit - wordcount)+' words left');
			    } 
			});
		});
	};
})(jQuery);
</script>
<script type="text/javascript">
/**
 * jQuery.textareaCounter
 * Version 1.0
 * Copyright (c) 2011 c.bavota - http://bavotasan.com
 * Dual licensed under MIT and GPL.
 * Date: 10/20/2011
**/
(function($){
	$.fn.textareaCounter3 = function(options) {
		// setting the defaults
		// $("textarea").textareaCounter({ limit: 100 });
		var defaults = {
			limit: 500
		};	
		var options = $.extend(defaults, options);
 
		// and the plugin begins
		return this.each(function() {
			var obj, text, wordcount, limited;
			
			obj = $(this);
			obj.after('<span style="font-size: 11px; clear: both; margin-top: 3px; display: block;" id="counter-text3">Max. '+options.limit+' words</span>');

			obj.keyup(function() {
			    text = obj.val();
			    if(text === "") {
			    	wordcount = 0;
			    } else {
				    wordcount = $.trim(text).split(" ").length;
				}
			    if(wordcount > options.limit) {
			        $("#counter-text3").html('<span style="color: #FF0000;">0 words left</span>');
					limited = $.trim(text).split(" ", options.limit);
					limited = limited.join(" ");
					$(this).val(limited);
			    } else {
			        $("#counter-text3").html((options.limit - wordcount)+' words left');
			    } 
			});
		});
	};
})(jQuery);
</script>
 <script type="text/javascript">
$(document).ready(function()
{
	$("#mob2").change(function()
{
var mob2 = $("#mob2").val();
var msgbox = $("#status3");


$("#status3").html('<img src="img/loader.gif">&nbsp;Checking availability.');

$.ajax({
type: "POST",
url: "check_ajax",
data: "mobile2="+ mob2,
success: function(msg){
$("#status3").html(function(event, request){

if(msg == 'OK')
{

$("#mob2").removeClass("red11"); // remove red color
$("#mob2").addClass("green11"); // add green color
msgbox.html('<img src="img/yes.png"> <font color="Green"> Available </font>');
}
else
{
// if you don't want background color remove these following two lines
$("#mob2").removeClass("green11"); // remove green color
$("#mob2").addClass("red11"); // add red  color
msgbox.html(msg);
}
});
}
});



});

$("#mob").change(function()
{
var mob = $("#mob").val();
var msgbox = $("#status2");


$("#status2").html('<img src="img/loader.gif">&nbsp;Checking availability.');

$.ajax({
type: "POST",
url: "check_ajax",
data: "mobile="+ mob,
success: function(msg){
$("#status2").html(function(event, request){

if(msg == 'OK')
{

$("#mob").removeClass("red11"); // remove red color
$("#mob").addClass("green11"); // add green color
msgbox.html('<img src="img/yes.png"> <font color="Green"> Available </font>');
}
else
{
// if you don't want background color remove these following two lines
$("#mob").removeClass("green11"); // remove green color
$("#mob").addClass("red11"); // add red  color
msgbox.html(msg);
}
});
}
});



});

$("#mail1").change(function()
{
var username = $("#mail1").val();
var msgbox = $("#status1");


$("#status1").html('<img src="img/loader.gif">&nbsp;Checking availability.');

$.ajax({
type: "POST",
url: "check_ajax",
data: "username="+ username,
success: function(msg){
$("#status1").html(function(event, request){

if(msg == 'OK')
{

$("#mail1").removeClass("red11"); // remove red color
$("#mail1").addClass("green11"); // add green color
msgbox.html('<img src="img/yes.png"> <font color="Green"> Available </font>');
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
function onsubmitform()
{
  if(document.pressed == 'Submit')
  {
   document.form.action ="insert_prodemo";
  }
  else
  if(document.pressed == 'Preview')
  {
    document.form.action ="insert_prev";
  }
  else
  if(document.pressed == 'Save without Submitting')
  {
    document.form.action ="insert_save_without";
  }
  return true;
}
</script>
<link rel="stylesheet" href="docsupport/style.css">
  <link rel="stylesheet" href="docsupport/prism.css">
  <link rel="stylesheet" href="chosen.css">
  <style type="text/css" media="all">
    /* fix rtl for demo */
    .chosen-rtl .chosen-drop { left: -9000px; }
  </style>
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
					
	<?php 
					
					if(isset($_SESSION['org']))
					{
						$msg=$_SESSION['org'];
					echo '<script language="javascript">';
					echo 'alert("'.$msg.'")';
					echo '</script>';
						unset($_SESSION['org']);
					}
					?>
		<section id="contact" class="" style="padding: 139px 0 161%;">
			<div class="container">

  <h2 class="text-center flo">Organization Member Signup</h2>
  <div class="full-form">
  <div class="bor-1">
  
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active margin-tp">
     
      <div class="form-menu bor">
   <form method="POST" name="form" onsubmit="return onsubmitform();" action="" enctype="multipart/form-data" class="form-horizontal"  role="form">
                <h2 class="text-center marg"></h2>
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-9">
                        <input  name="name" id="firstName" placeholder="Full Name" class="form-control" autofocus="" type="text">
                       
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="Websites (Links)" class="col-sm-3 control-label"> Websites (Links)</label>
                    <div class="col-sm-9">
                        <input  id="Websites (Links)" name="web" placeholder="Websites (Links)" class="form-control" type="text">
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="country" class="col-sm-3 control-label">Year established</label>
                    <div class="col-sm-9">
                        <select  id="country" name="year" class="form-control">
                             <?php
                                                      $year=date('Y');
                                                      
                                                      
                                                     for($i=$year; $i>=2000; $i--)
                                                     {                                                       ?>
                                                 <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                   <?php
                                                   
                                                      }
                                                      ?>
                        </select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="control-label col-sm-3">Tax exempt </label>
                    <div class="col-sm-6 right-maegn">
                        <div class="row">
                            <div class="col-sm-4 ">
                                <label class="radio-inline">
                                    <input  type="radio" name="tax" id="OfficeworkCheckbox" value="Officework"  type="radio"><span class="mat">Yes</span>
                                </label>
                            </div>
                            <div class="col-sm-4">
                                <label  class="radio-inline">
                                    <input  type="radio" name="tax" id="Web MasterAnalysisCheckbox" value="Web Master" type="radio"><span class="mat">No</span>
                                </label>
                            </div>
                            
							
							
							
                        </div>
                    </div>
                </div>
				<div class="form-group">
                    <label for="Websites (Links)" class="col-sm-3 control-label"> Legal status</label>
                    <div class="col-sm-9">
                        <input  id="Legal status"  name="lstatus" placeholder="Legal status" class="form-control" type="text">
                    </div>
                </div>
				
				
				 <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Mission</label>
                    <div class="col-sm-9">
                      <textarea   class="form-control mission" name="mission[]" placeholder="Enter Mission"></textarea>
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Current priorities </label>
                    <div class="col-sm-9">
                        <input  id="Current priorities " name="priorities[]" placeholder="Current priorities " class="form-control priorities" autofocus="" type="text">
						
                       
                    </div>
                </div>
					
              <!-- 
				<div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Current Actions</label>
                    <div class="col-sm-9">
                        <input  id="Current Actions" name="action" placeholder="Current Actions" class="form-control action" autofocus="" type="text">
                       
                    </div>
                </div>
				-->
				<div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Recent Achievements</label>
                    <div class="col-sm-9">
                        <input  id="Associated Organizations" name="achievements[]" placeholder="Recent Achievements" class="form-control achievements" autofocus="" type="text">
                       
                    </div>
                </div>
				<script type="text/javascript">
	$(".mission").textareaCounter();
	$(".priorities").textareaCounter1();
	$(".action").textareaCounter2();
	$(".achievements").textareaCounter3();
	</script>
				
				<div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Associated Organizations</label>
                    <div class="col-sm-9">
                        <input  id="Associated Organizations" name="org[]" placeholder="Associated Organizations" class="form-control" autofocus="" type="text">
                       
                    </div>
                </div>
				<div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">More information</label>
                    <div class="col-sm-9">
                        <input  id="More information" placeholder="More information" class="form-control" autofocus="" name="m_info[]" type="text">
                       
                    </div>
                </div>
                <div class="form-group">
                    <label for="Logo" class="col-sm-3 control-label">Logo</label>
                    <div class="col-sm-9">
					
                       <input  id="file" name="pic" class="custom-file-input" type="file">
					   <span class="custom-file-control"></span>
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="control-label col-sm-3">Seeking volunteers</label>
                    <div class="col-sm-9">
                        <select data-placeholder="Select Seeking volunteers" class="chosen-select" name="seeking[]" multiple style="width:350px;" tabindex="4">
						
                <option value="Office">Office</option>
                <option value="Online">Online</option>
                <option value="Canvasing">Canvasing</option>
                
             
            </select>  
                       
                    </div>
					
					<!--<div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4">
                                <label class="radio-inline">
                                    <input  id="AdvocacyCheckbox" name="seeking[]" value="Advocacy" type="checkbox"><span class="mat">Office </span>
                                </label>
                            </div>
                            <div class="col-sm-4">
                                <label class="radio-inline">
                                    <input id="Data&amp;AnalysisCheckbox" name="seeking[]" value="Data&amp;Analysis" type="checkbox"><span class="mat">Online</span>
                                </label>
                            </div>
                            <div class="col-sm-4">
                                <label class="radio-inline">
                                    <input id="LegalActionCheckbox" name="seeking[]" value="LegalAction" type="checkbox"><span class="mat">Canvasing</span>
                                </label>
                            </div> 
							
                        </div>
                    </div>-->
                </div>
				
				<div class="form-group">
                    <label class="control-label col-sm-3">Strategies </label>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4">
                                <label class="radio-inline">
                                    <input name="strategie[]" id="AdvocacyCheckbox" value="Get Money out of Politics" type="checkbox"><span class="mat">Get Money out of Politics </span>
                                </label>
                            </div>
                            <div class="col-sm-4">
                                <label class="radio-inline">
                                    <input name="strategie[]" id="Data&amp;AnalysisCheckbox" value="Guarantee Voting Rights" type="checkbox"><span class="mat">Guarantee Voting Rights</span>
                                </label>
                            </div>
                            <div class="col-sm-4">
                                <label class="radio-inline">
                                    <input name="strategie[]" id="LegalActionCheckbox" value="Advocate and Educate" type="checkbox"><span class="mat">Advocate and Educate</span>
                                </label>
                            </div> 
							<div class="col-sm-4">
                                <label class="radio-inline">
                                       <input name="strategie[]" id="CitizenActionCheckbox" value="Dig into Data" type="checkbox"><span class="mat">Dig into Data</span>
                                </label>
                            </div>
							<div class="col-sm-4">
                                <label class="radio-inline">
                                    <input id="SourceofFundingCheckbox" name="strategie[]" value="Take Legal Action" type="checkbox"> <span class="mat">Take Legal Action</span>
                                </label>
                            </div>
							<div class="col-sm-4">
                                <label class="radio-inline">
								
                                   <input name="strategie[]" id="PACsCheckbox" value="Activate Citizens" type="checkbox"><span class="mat">Activate Citizens</span>
                                </label>
                            </div>
							<div class="col-sm-4">
                                <label class="radio-inline">
								
                                   <input name="strategie[]" id="PACsCheckbox" value="Fund the Movement" type="checkbox"><span class="mat">Fund the Movement</span>
                                </label>
                            </div>
							<div class="col-sm-4">
                                <label class="radio-inline">
								
                                   <input name="strategie[]" id="PACsCheckbox" value="Political Action Committee" type="checkbox"><span class="mat">Political Action Committee</span>
                                </label>
                            </div>
							<div class="col-sm-4">
                                <label class="radio-inline">
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
                                </label>
                            </div>
							
							
                        </div>
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="control-label col-sm-3">Type of Work</label>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4">
                                <label class="radio-inline">
                                    <input name="w_type[]" id="administrativeCheckbox" value="Administrative" type="checkbox"><span class="mat">Administrative</span>
                                </label>
                            </div>
                            <div class="col-sm-4">
                                <label class="radio-inline">
                                    <input name="w_type[]" id="accountingCheckbox" value="Accounting" type="checkbox"><span class="mat">Accounting</span>
                                </label>
                            </div>
                            <div class="col-sm-4">
                                <label class="radio-inline pad">
                                    <input name="w_type[]" id="canvasing door-to-doorCheckbox" value="Canvasing door-to-door" type="checkbox"><span class="mat">Canvasing door-to-door</span>
                                </label>
                            </div> 
							<div class="col-sm-4">
                                <label class="radio-inline">
                                       <input name="w_type[]" id="legalCheckbox" value="legal" type="checkbox"><span class="mat">Legal</span>
                                </label>
                            </div>
							<div class="col-sm-4">
                                <label class="radio-inline">
                                    <input name="w_type[]" id="LegislationCheckbox" value="Legislation" type="checkbox"> <span class="mat">Legislation</span>
                                </label>
                            </div>
							<div class="col-sm-4">
                                <label class="radio-inline">
								
                                   <input name="w_type[]" id="MediaCheckbox" value="Media" type="checkbox"><span class="mat">Media</span>
                                </label>
                            </div>
							<div class="col-sm-4">
                                <label class="radio-inline">
								
                                   <input name="w_type[]" id="Phone BankCheckbox" value="other" type="checkbox"><span class="mat">Phone Bank</span>
                                </label>
                            </div>
							
							<div class="col-sm-4">
                                <label class="radio-inline">
								
                                   <input  name="w_type[]" id="Web ManagementCheckbox" value="Web Management" type="checkbox"><span class="mat">Web Management</span>
                                </label>
                            </div>
							
							<div class="col-sm-4">
                                <label class="radio-inline">
								
                                   <input name="w_type[]" id="writingCheckbox" value="Writing" type="checkbox"><span class="mat">Writing</span>
                                </label>
                            </div>
							<div class="col-sm-4">
                                <label class="radio-inline">
								
                                   <input name="w_type[]" id="writingCheckbox" value="Writing" type="checkbox"><span class="mat">Fund Raising</span>
                                </label>
                            </div>
							<div class="col-sm-4">
                                <label class="radio-inline">
								
                                   
								   <input id="Other" name="w_other" placeholder="Other" class="form-control hrt" autofocus="" type="text">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
			
                <div class="form-group">
                    <label for="country" class="col-sm-3 control-label">Locations of Needed Work</label>
                    <div class="col-sm-4">
					<select data-placeholder="Select Locations of Work" class="chosen-select" name="location[]" multiple style="width:350px;" tabindex="4">
					
                        
                               <option value="California">California</option>
                            <option value="Texas">Texas</option>
                            <option value="Florida">Florida</option>
                            <option value="Hawaii">Hawaii</option>
                            <option value="Massachusetts">Massachusetts</option>
                            <option value="Texas2">Texas2</option>
                            <option value="Pennsylvania">Pennsylvania</option>
                        </select>
                    </div>
					<div class="col-sm-5">
					<input id="Other"  placeholder="Other Locations" name="l_other"class="form-control" autofocus="" type="text">
					</div>
                </div>
				
				
			
				
				
				
				
			  
                <div class="form-group col-sm-12">
                     <label class="control-label col-sm-3 pada">Main Office</label>
                    <div class="col-sm-3">
                     <div class="inpu">
                          
							
                      <input  name="c_name" id="name" placeholder="Name" class="form-control" autofocus="" type="text">
                       
                    
                        </div>   
                       
                    </div>
					<div class="col-sm-3">
                     <div class="inpu">
                          
							
                      <input  name="address" id="Phone" placeholder="Address" class="form-control" autofocus="" type="text">
                       
                    
                        </div>   
                       
                    </div>
					
					<div class="col-sm-3">
                     <div class="inpu">
                          
							
                      <input  name="phone" id="mob" placeholder="Phone" class="form-control" autofocus="" type="number">
                       <span id="status2"></span>
                    
                        </div>   
                       
                    </div>
					
					<div class="col-sm-3">
                       
                       
                    </div>
					<div class="col-sm-3">
                     <div class="mar">
                          
							
                      <input  name="email" id=" Email" placeholder=" Email" class="form-control" autofocus="" type="email">
                       
                    
                        </div>   
                       
                    </div>
					<div class="col-sm-3">
                     <div class="mar">
                          
							
                      <input name="skype" id="Skype" placeholder="Skype" class="form-control" autofocus="" type="email">
                       
                    
                        </div>   
                       
                    </div>
					<div class="col-sm-3">
                     <div class="mar">
                          
							
                      <input  name="c_other" id="Other " placeholder="Other " class="form-control" autofocus="" type="text">
                       
                    
                        </div>   
                       
                    </div>
                </div>

				<!-- /.form-group -->
				
				 <div class="form-group col-sm-12">
                     <label class="control-label col-sm-3 pada">Organization Editor</label>
                    <div class="col-sm-3">
                     <div class="inpu">
                          
							
                      <input required name="o_name" id="Phone" placeholder="Name" class="form-control" autofocus="" type="text">
                       
                    
                        </div>   
                       
                    </div>
					
					<div class="col-sm-3">
                     <div class="inpu">
                          
							
                      <input required name="o_address" id="Phone" placeholder="Address" class="form-control" autofocus="" type="text">
                       
                    
                        </div>   
                       
                    </div>
					
					<div class="col-sm-3">
                     <div class="inpu">
                          
							
                      <input required name="o_phone" id="mob2" placeholder="Phone" class="form-control" autofocus="" type="number">
                       <span id="status3"></span>
                    
                        </div>   
                       
                    </div>
					
					<div class="col-sm-3">
                       
                       
                    </div>
					<div class="col-sm-3">
                     <div class="mar">
                          
							
                      <input required name="o_email" id="mail1" placeholder=" Email" class="form-control" autofocus="" type="email">
                       	<span id="status1"></span>
                    
                        </div>   
                       
                    </div>
					<div class="col-sm-3">
                     <div class="mar">
                          
							
                      <input required name="o_skype" id="Skype" placeholder="Skype" class="form-control" autofocus="" type="email">
                       
                    
                        </div>   
                       
                    </div>
					
					<div class="col-sm-3">
                     <div class="mar">
                          
							
                      <input required name="o_other" id="Other " placeholder="Other " class="form-control" autofocus="" type="text">
                       
                    
                        </div>   
                       
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <div class="checkbox go">
                            <label>
                                <input required name="confirm" type="checkbox"><a href="#">I have read and, on behalf of my organization, accept the policies and terms of the Field Guide to the Democracy Movement.   </a>
                            </label>
                        </div>
                    </div>
                </div> <!-- /.form-group -->
                <div class="form-group">
                    <div class="col-sm-2  marg-5 ">
                        <input name="submit" type="submit" onclick="document.pressed=this.value" value="Submit" class="btn btn-primary btn-block cwid">
                        
                    </div>
					 
					 
					 <div class="col-sm-2 ">
                        <input type="submit" name="preview" onclick="document.pressed=this.value" value="Preview" id="preview"  class="btn btn-primary btn-block cwid-1">
                        
                    </div>
					 <div class="col-sm-4  ">
                        <input name="save_without" id="save_without" onclick="document.pressed=this.value" type="submit" class="btn btn-primary btn-block wth" value="Save without Submitting">
                        
                    </div>
					<!--<div class="col-sm-4 ">
                        
                        <button name="submit" type="submit" class="btn btn-primary btn-block width-mar">Read Field Guide Policies</button>
                    </div>-->
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
            </form>
    </div>
    </div>

    
  </div>
  </div>
  </div>
</div>

		</section>
	<!-- contact end -->

	<!--<script>
	$(document).ready(function() {
$(function(){
    $("#preview").click(function(event){ 
        event.preventDefault();
        $.ajax({
            type:"post",
            url:"org_details"
            data:$("#form").serialize(),
            
        });
    });
});
	});
</script>
	<script>
	$('#preview').click(function(e){
  
    e.preventDefault(); // Prevent Default Submission
  
    $.ajax({
 url: '<?=$site_url;?>org_preview',
 type: 'POST',
 data: $(#form).serialize(), // it will serialize the form data
 console.log(data);
        dataType: 'html'
    })
    
   
});
</script>	-->



	
	<?php include('include/footer.php');?>


   
  
</body>



