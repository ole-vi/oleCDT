
<?php 
include('include/config.php');
include('include/header.php');
//$msg='';
 $id=base64_decode($_REQUEST['id']);
if(isset($_POST['update']))
{
$name = $_REQUEST['name'];
$web = $_REQUEST['web'];
$year = $_REQUEST['year'];
@$tax = $_REQUEST['tax'];
$lstatus = $_REQUEST['lstatus'];
$location = implode(',',$_REQUEST['location']);
$l_other = $_REQUEST['l_other'];
$mission = $_REQUEST['mission'];
$priorities = $_REQUEST['priorities'];
$action = $_REQUEST['action'];
$achievements = $_REQUEST['achievements'];
$org = $_REQUEST['org'];
$m_info = $_REQUEST['m_info'];
//$state = $_REQUEST['state'];
 @$state2 = implode(',',$_REQUEST['state']);
 
//$Volunteers = implode(',',$_REQUEST['Volunteers']);
//$budget = $_REQUEST['budget'];
$c_name = $_REQUEST['c_name'];
$address = $_REQUEST['address'];
$phone = $_REQUEST['phone'];
$email = $_REQUEST['email'];
$skype = $_REQUEST['skype'];
$c_other = $_REQUEST['c_other'];
$o_name = $_REQUEST['o_name'];
$o_address = $_REQUEST['o_address'];
$o_phone = $_REQUEST['o_phone'];
$o_email = $_REQUEST['o_email'];
$o_skype = $_REQUEST['o_skype'];
$o_other = $_REQUEST['o_other'];
$confirm = $_REQUEST['confirm'];
$w_other = $_REQUEST['w_other'];
$l_other = $_REQUEST['l_other'];
@$seeking = implode(',', $_REQUEST['seeking']);
@$w_type = implode(',', $_REQUEST['worktype']);
@$strategie = implode(',', $_REQUEST['strategies']);
$date = date("Y-m-d");
$imgFile = $_FILES['pic']['name'];
$tmp_dir = $_FILES['pic']['tmp_name'];
$imgSize = $_FILES['pic']['size'];
 if($imgFile!='') 
		{
			
			
		
		
			$upload_dir = 'img/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
			// rename uploading image
			$pic1 = rand(1000,1000000).".".$imgExt;
				
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){			
				// Check file size '10KB'
				if($imgSize < 5000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$pic1);
				}
				else{
					$msg = "Sorry, your file is too large.";
					//header("location:stream-details.php");
				}
			}
			
		
		
		// if no error occured, continue ....
		if(!isset($msg))
		{
		$stmt = "update `pro_democracy` SET  logo=:pic where `pro_id`=:id";
		$query = $conn->prepare($stmt);
		$query->bindParam(':pic',$pic1, PDO::PARAM_STR);
		$query->bindParam(':id',$id , PDO::PARAM_STR);			
		$query->execute();	
			
			
		}
	}
 
$sql1 = "update `pro_democracy` set name=:name, weblink=:web, establish_year=:year, tax_exempt=:tax, legal_status=:lstatus, location=:location, curr_priorities=:priorities, curr_action=:action, achievements=:achievements, associated_org=:org, more_info=:m_info, seeking=:seeking, work_type=:w_type, w_other=:w_other, mission=:mission, strategies=:strategie,  state=:state, c_name=:c_name, address=:address, phone=:phone, email=:email, skype=:skype, other=:c_other, o_name=:o_name, o_address=:o_address, o_email=:o_email, o_phone=:o_phone, o_skype=:o_skype, o_other=:o_other, l_other=:l_other, last_update=:date where pro_id=:id";
$query1 = $conn->prepare($sql1);
$query1->bindParam(':id', $id, PDO::PARAM_STR);
$query1->bindParam(':name', $name, PDO::PARAM_STR);
$query1->bindParam(':web', $web, PDO::PARAM_STR);
$query1->bindParam(':year', $year, PDO::PARAM_STR);
$query1->bindParam(':tax', $tax, PDO::PARAM_STR);
$query1->bindParam(':lstatus', $lstatus, PDO::PARAM_STR);
$query1->bindParam(':location', $location, PDO::PARAM_STR);
$query1->bindParam(':w_other', $w_other, PDO::PARAM_STR);
$query1->bindParam(':mission', $mission, PDO::PARAM_STR);
$query1->bindParam(':priorities', $priorities, PDO::PARAM_STR);
$query1->bindParam(':action', $action, PDO::PARAM_STR);
$query1->bindParam(':achievements', $achievements, PDO::PARAM_STR);
$query1->bindParam(':org', $org, PDO::PARAM_STR);
$query1->bindParam(':m_info', $m_info, PDO::PARAM_STR);
$query1->bindParam(':seeking', $seeking, PDO::PARAM_STR);
$query1->bindParam(':w_type', $w_type, PDO::PARAM_STR);
$query1->bindParam(':strategie', $strategie, PDO::PARAM_STR);
$query1->bindParam(':state', $state2, PDO::PARAM_STR);
//$query1->bindParam(':pic1', $pic1, PDO::PARAM_STR);
//$query1->bindParam(':budget', $budget, PDO::PARAM_STR);
$query1->bindParam(':address', $address, PDO::PARAM_STR);
$query1->bindParam(':phone', $phone, PDO::PARAM_STR);
$query1->bindParam(':email', $email, PDO::PARAM_STR);
$query1->bindParam(':skype', $skype, PDO::PARAM_STR);
$query1->bindParam(':c_other', $c_other, PDO::PARAM_STR);
$query1->bindParam(':o_address', $o_address, PDO::PARAM_STR);
$query1->bindParam(':o_phone', $o_phone, PDO::PARAM_STR);
$query1->bindParam(':o_email', $o_email, PDO::PARAM_STR);
$query1->bindParam(':o_skype', $o_skype, PDO::PARAM_STR);
$query1->bindParam(':o_other', $o_other, PDO::PARAM_STR);
$query1->bindParam(':c_name', $c_name, PDO::PARAM_STR);
$query1->bindParam(':o_name', $o_name, PDO::PARAM_STR);
$query1->bindParam(':l_other', $l_other, PDO::PARAM_STR);
$query1->bindParam(':date', $date, PDO::PARAM_STR);

//$query1->bindParam(':pic', $pic, PDO::PARAM_STR);
$run=$query1->execute();
if($run)
{
	$to=$o_email;
	      $from = "test@dppms.com";
		 
		   $subject ='Account Updation Sucessfully';
		   
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
									<strong>Organization Updation</strong></td>
							</tr>
							<tr>
								<td align="center" class="smallgreylink" height="81" width="3%">
									&nbsp;</td>
								<td align="center" class="smallgreylink style1" height="81" style="padding-right: 5px;" valign="top">
									<p align="left" class="style2">
										Dear '.$name.'</p>
									<p align="justify" class="style2">
										Thank you for Updating in Pro-Democracy Organization</p>
									<p align="justify" class="style2">
										Your &nbsp;Employer Account has been successfully Updated.</p>
									
										<strong>Thank You</strong></p>
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
                header('location:'.$site_url.'organization.php');
				  echo '<script language="javascript">';
					echo 'alert("Updated Record Sucessfully")';
					echo '</script>';
					
					
		   }}
else
{

		header('location:'.$site_url.'organization.php');

			echo '<script language="javascript">';
					echo 'alert("Record is not Updated")';
					echo '</script>';
					
					
}

}
//

$sql = "select * from pro_democracy where pro_id=:id";
$query = $conn->prepare($sql);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();
$row = $query->fetch(PDO::FETCH_ASSOC);

$state1 = array('Alaska','Alabama','Arizona','Arkansas','California','Colorado','Connecticut','Delaware','Florida','Georgia','Hawaii','Idaho','Illinois','Indiana','Iowa','Kansas','Kentucky','Louisiana','Maine','Maryland','Massachusetts','Michigan','Minnesota','Mississippi','Missouri','Montana','Nebraska','Nevada','New Hampshire','New Jersey','New Mexico','New York','North Carolina','North Dakota','Ohio','Oklahoma','Oregon','Pennsylvania','Rhode Island','South Carolina','South Dakota','Tennessee','Texas','Utah','Vermont','Virginia','Washington','West Virginia','Wisconsin','Wyoming');
$state = explode(',',($row['state']));

$loc = array('Alaska','Alabama','Arizona','Arkansas','California','Colorado','Connecticut','Delaware','Florida','Georgia','Hawaii','Idaho','Illinois','Indiana','Iowa','Kansas','Kentucky','Louisiana','Maine','Maryland','Massachusetts','Michigan','Minnesota','Mississippi','Missouri','Montana','Nebraska','Nevada','New Hampshire','New Jersey','New Mexico','New York','North Carolina','North Dakota','Ohio','Oklahoma','Oregon','Pennsylvania','Rhode Island','South Carolina','South Dakota','Tennessee','Texas','Utah','Vermont','Virginia','Washington','West Virginia','Wisconsin','Wyoming');
$loc1 = explode(',',($row['location']));

$str = explode(',',($row['strategies']));
$strat= array('Get Money out of Politics','Advocate and Educate','Dig into Data','Take Legal Action','Activate Citizens','Fund the Movement','Political Action Committee');

$work_type = explode(',',($row['work_type']));
$work = array('Administrative','Accounting','Canvasing door-to-door','Legal','Legislation','Media','Phone Bank','Web Management','Writing','Fund Raising');

$seek = explode(',',($row['seeking']));
$seek1= array('Office','Online','Convasing',);

?>
	<!-- contact start --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
  <script src="<?php echo $site_url;?>chosen.jquery.js" type="text/javascript"></script>
  <script src="<?php echo $site_url;?>docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
		
		
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


$("#status3").html('<img src="loader.gif">&nbsp;Checking availability.');

$.ajax({
type: "POST",
url: "check_ajax.php",
data: "mobile2="+ mob2,
success: function(msg){
$("#status3").html(function(event, request){

if(msg == 'OK')
{

$("#mob2").removeClass("red11"); // remove red color
$("#mob2").addClass("green11"); // add green color
msgbox.html('<img src="yes.png"> <font color="Green"> Available </font>');
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


$("#status2").html('<img src="loader.gif">&nbsp;Checking availability.');

$.ajax({
type: "POST",
url: "check_ajax.php",
data: "mobile="+ mob,
success: function(msg){
$("#status2").html(function(event, request){

if(msg == 'OK')
{

$("#mob").removeClass("red11"); // remove red color
$("#mob").addClass("green11"); // add green color
msgbox.html('<img src="yes.png"> <font color="Green"> Available </font>');
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


$("#status1").html('<img src="loader.gif">&nbsp;Checking availability.');

$.ajax({
type: "POST",
url: "check_ajax.php",
data: "username="+ username,
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
<link rel="stylesheet" href="<?php echo $site_url;?>docsupport/style.css">
  <link rel="stylesheet" href="<?php echo $site_url;?>docsupport/prism.css">
  <link rel="stylesheet" href="<?php echo $site_url;?>chosen.css">
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
	
		<section id="contact" class="" style="padding: 139px 0 161%;">
			<div class="container">

  <h2 class="text-center flo">Update Organization Member Detail</h2>
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
                        <input  name="name" id="firstName" placeholder="Full Name" value="<?php echo $row['name'];?>" class="form-control" autofocus="" type="text">
                       
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="Websites (Links)" class="col-sm-3 control-label"> Websites (Links)</label>
                    <div class="col-sm-9">
                        <input  id="Websites (Links)" value="<?php echo $row['weblink'];?>" name="web" placeholder="Websites (Links)" class="form-control" type="text">
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="country" class="col-sm-3 control-label">Year established</label>
                    <div class="col-sm-9">
                        <select  id="country" name="year" class="form-control">
                            <option><?php echo $row['establish_year']; ?></option>
												    <?php
                                                      $year=date('Y');
													  
													  
                                                     for($i=$year; $i>=1970; $i--)
													 {
														 ?>
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
                            <?php if($row['tax_exempt']=='Yes'){?>
							<div class="col-sm-4 ">
                                <label class="radio-inline">
								<input  type="radio" checked name="tax" id="OfficeworkCheckbox" value="Yes"  type="radio"><span class="mat">Yes</span>
                                </label>
                            </div>
                            <div class="col-sm-4">
                                <label  class="radio-inline">
                                    <input  type="radio" name="tax" id="Web MasterAnalysisCheckbox" value="No"  type="radio"><span class="mat">No</span>
                                </label>
                            </div>
                            <?php } else if($row['tax_exempt']=='No'){?>
							<div class="col-sm-4 ">
                                <label class="radio-inline">
								<input  type="radio"  name="tax" id="OfficeworkCheckbox" value="Yes"  type="radio"><span class="mat">Yes</span>
                                </label>
                            </div>
                            <div class="col-sm-4">
                                <label  class="radio-inline">
                                    <input  type="radio" checked name="tax" id="Web MasterAnalysisCheckbox" value="No" type="radio"><span class="mat">No</span>
                                </label>
                            </div>
							<?php } else { ?>
							<div class="col-sm-4 ">
                                <label class="radio-inline">
								<input  type="radio" name="tax" id="OfficeworkCheckbox" value="Yes"  type="radio"><span class="mat">Yes</span>
                                </label>
                            </div>
                            <div class="col-sm-4">
                                <label  class="radio-inline">
                                    <input  type="radio" name="tax" id="Web MasterAnalysisCheckbox" value="No" type="radio"><span class="mat">No</span>
                                </label>
                            </div>
							<?php } ?>
                        </div>
                    </div>
                </div>
				<div class="form-group">
                    <label for="Websites (Links)" class="col-sm-3 control-label"> Legal status</label>
                    <div class="col-sm-9">
                        <input  id="Legal status" value="<?php echo $row['legal_status'];?>" name="lstatus" placeholder="Legal status" class="form-control" type="text">
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="country" class="col-sm-3 control-label">Locations</label>
                    <div class="col-sm-4">
                        
						<select data-placeholder="Select Locations of Work" class="chosen-select" name="location[]" multiple style="width:350px;" tabindex="4">
                 <?php foreach($loc as $loc){
			   if(in_array($loc,$loc1))
				   {
?>
                      <option value="<?php echo $loc; ?>" selected><?php echo ucfirst($loc); ?></option>
                      <?php } 
				   else { ?>
                      <option value="<?php echo $loc; ?>"><?php echo ucfirst($loc); ?></option>
			   <?php }} ?> 
            </select> 
                    </div>
					<div class="col-sm-5">
					<input id="Other" value="<?php echo $row['l_other'];?>" placeholder="Other" name="l_other"class="form-control" autofocus="" type="text">
					</div>
                </div>
				 <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Mission</label>
                    <div class="col-sm-9">
                      <textarea   class="form-control mission"  name="mission" placeholder="Enter Mission"><?php echo $row['mission'];?></textarea>
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Current priorities </label>
                    <div class="col-sm-9">
                        <input  id="Current priorities " value="<?php echo $row['curr_priorities'];?>" name="priorities" placeholder="Current priorities " class="form-control priorities" autofocus="" type="text">
						
                       
                    </div>
                </div>
					
               
				<div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Current Actions</label>
                    <div class="col-sm-9">
                        <input  id="Current Actions" value="<?php echo $row['curr_action'];?>" name="action" placeholder="Current Actions" class="form-control action" autofocus="" type="text">
                       
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Recent Achievements</label>
                    <div class="col-sm-9">
                        <input  id="Associated Organizations" name="achievements" placeholder="Recent Achievements" value="<?php echo $row['achievements'];?>" class="form-control achievements" autofocus="" type="text">
                       
                    </div>
                </div>
			
				
				<div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Associated Organizations</label>
                    <div class="col-sm-9">
                        <input  id="Associated Organizations" name="org" placeholder="Associated Organizations" value="<?php echo $row['associated_org'];?>" class="form-control" autofocus="" type="text">
                       
                    </div>
                </div>
				<div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">More information</label>
                    <div class="col-sm-9">
                        <input  id="More information" value="<?php echo $row['more_info'];?>" placeholder="More information" class="form-control" autofocus="" name="m_info" type="text">
                       
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
                <?php foreach($seek1 as $seek1){
			   if(in_array($seek1,$seek))
				   {
?>
                      <option value="<?php echo $seek1; ?>" selected><?php echo ucfirst($seek1); ?></option>
                      <?php } 
				   else { ?>
                      <option value="<?php echo $seek1; ?>"><?php echo ucfirst($seek1); ?></option>
			   <?php }} ?>
                
             
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
                    <label class="control-label col-sm-3">Type of Work</label>
                    <div class="col-sm-6">
                        <div class="row">
						
						                <?php
 foreach ($work as $ser) {
	 
?>
                
                      <?php if(in_array($ser, $work_type))
				   { ?>
                      <div class="col-sm-4">
                       <label class="radio-inline">
					  <input name="worktype[]" class="colored-primary" value="<?php echo $ser; ?>" checked  type="checkbox">
					  <span class="mat"> <?php echo ucfirst($ser); ?></span>
                      </label>
                     </div>
                      <?php } else { ?>
                      <div class="col-sm-4">
                       <label class="radio-inline">
                       <input name="worktype[]" class="colored-primary" value="<?php echo $ser; ?>"  type="checkbox">
					  <span class="mat"> <?php echo ucfirst($ser); ?></span>
                      </label>
                     </div>
					  <?php } ?>
                    
                <?php } ?>
						
							<div class="col-sm-4">
                                <label class="radio-inline">
								
                                   
								   <input id="Other" value="<?php echo $row['w_other'];?>" name="w_other" placeholder="Other" class="form-control hrt" autofocus="" type="text">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
			
                
				
				<div class="form-group">
                    <label class="control-label col-sm-3">Strategies </label>
                    <div class="col-sm-6">
                        <div class="row">
                           
							
							   <?php
 foreach ($strat as $strat) {
	 
?>
               
                  
                      <?php if(in_array($strat, $str))
				   { ?>
                       <div class="col-sm-4">
					   <label class="radio-inline">
					  <input name="strategies[]" checked id="AdvocacyCheckbox" value="<?php echo $strat; ?>" type="checkbox">
                      
                      <span class="mat"> <?php echo ucfirst($strat); ?></span> </label>
                      </label>
					  </div>
					  <?php } else { ?>
					  <div class="col-sm-4">
                        <label class="radio-inline">
					  <input name="strategies[]"  id="AdvocacyCheckbox" value="<?php echo $strat; ?>" type="checkbox">
                      
                      <span class="mat"> <?php echo ucfirst($strat); ?></span> </label>
                       </label>
					   </div>
 <?php } }?>
                   
                
              
							
							<div class="col-sm-4">
                                <label class="radio-inline">
								
                                  
								  <select data-placeholder="Select State" class="chosen-select" name="state[]" multiple style="width:350px;" tabindex="4">
                 <?php foreach($state1 as $state1){
			   if(in_array($state1,$state))
				   {
?>
                      <option value="<?php echo $state1; ?>" selected><?php echo ucfirst($state1); ?></option>
                      <?php } 
				   else { ?>
                      <option value="<?php echo $state1; ?>"><?php echo ucfirst($state1); ?></option>
			   <?php }} ?> 
            </select> 
                                </label>
                            </div>
							
							
                        </div>
                    </div>
                </div>
			
				
				
				
				
			  
                <div class="form-group col-sm-12">
                     <label class="control-label col-sm-3 pada">Main Office</label>
                    <div class="col-sm-3">
                     <div class="inpu">
                          
							
                      <input  name="c_name" id="name" value="<?php echo $row['c_name'];?>" placeholder="Name" class="form-control" autofocus="" type="text">
                       
                    
                        </div>   
                       
                    </div>
					<div class="col-sm-3">
                     <div class="inpu">
                          
							
                      <input  name="address" value="<?php echo $row['address'];?>" id="Phone" placeholder="Address" class="form-control" autofocus="" type="text">
                       
                    
                        </div>   
                       
                    </div>
					
					<div class="col-sm-3">
                     <div class="inpu">
                          
							
                      <input  name="phone" value="<?php echo $row['phone'];?>" id="mob" placeholder="Phone" class="form-control" autofocus="" type="number">
                       <span id="status2"></span>
                    
                        </div>   
                       
                    </div>
					
					<div class="col-sm-3">
                       
                       
                    </div>
					<div class="col-sm-3">
                     <div class="mar">
                          
							
                      <input  name="email" value="<?php echo $row['email'];?>" id=" Email" placeholder=" Email" class="form-control" autofocus="" type="email">
                       
                    
                        </div>   
                       
                    </div>
					<div class="col-sm-3">
                     <div class="mar">
                          
							
                      <input name="skype" value="<?php echo $row['skype'];?>" id="Skype" placeholder="Skype" class="form-control" autofocus="" type="email">
                       
                    
                        </div>   
                       
                    </div>
					<div class="col-sm-3">
                     <div class="mar">
                          
							
                      <input  name="c_other" value="<?php echo $row['other'];?>" id="Other " placeholder="Other " class="form-control" autofocus="" type="text">
                       
                    
                        </div>   
                       
                    </div>
                </div>

				<!-- /.form-group -->
				
				 <div class="form-group col-sm-12">
                     <label class="control-label col-sm-3 pada">Organization Editor</label>
                    <div class="col-sm-3">
                     <div class="inpu">
                          
							
                      <input required name="o_name" value="<?php echo $row['o_name'];?>" id="Phone" placeholder="Name" class="form-control" autofocus="" type="text">
                       
                    
                        </div>   
                       
                    </div>
					
					<div class="col-sm-3">
                     <div class="inpu">
                          
							
                      <input required name="o_address" value="<?php echo $row['o_address'];?>" id="Phone" placeholder="Address" class="form-control" autofocus="" type="text">
                       
                    
                        </div>   
                       
                    </div>
					
					<div class="col-sm-3">
                     <div class="inpu">
                          
							
                      <input required name="o_phone" value="<?php echo $row['o_phone'];?>" id="mob2" placeholder="Phone" class="form-control" autofocus="" type="number">
                       <span id="status3"></span>
                    
                        </div>   
                       
                    </div>
					
					<div class="col-sm-3">
                       
                       
                    </div>
					<div class="col-sm-3">
                     <div class="mar">
                          
							
                      <input required name="o_email" value="<?php echo $row['o_email'];?>" id="mail1" placeholder=" Email" class="form-control" autofocus="" type="email">
                       	<span id="status1"></span>
                    
                        </div>   
                       
                    </div>
					<div class="col-sm-3">
                     <div class="mar">
                          
							
                      <input required name="o_skype" value="<?php echo $row['o_skype'];?>" id="Skype" placeholder="Skype" class="form-control" autofocus="" type="email">
                       
                    
                        </div>   
                       
                    </div>
					
					<div class="col-sm-3">
                     <div class="mar">
                          
							
                      <input required name="o_other" value="<?php echo $row['o_other'];?>" id="Other " placeholder="Other " class="form-control" autofocus="" type="text">
                       
                    
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
                        <button name="update" type="submit"   class="btn btn-primary btn-block cwid">Update</button>
                        
                    </div>
					 
					 
					<!-- <div class="col-sm-2 ">
                        <input type="submit" name="preview" onclick="document.pressed=this.value" value="Preview" id="preview"  class="btn btn-primary btn-block cwid-1">
                        
                    </div>
					 <div class="col-sm-4  ">
                        <button name="save_without" type="submit" class="btn btn-primary btn-block wth">Save without Submitting</button>
                        
                    </div>
					<div class="col-sm-4 ">
                        
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
  	<script type="text/javascript">
	$(".mission").textareaCounter();
	$(".priorities").textareaCounter1();
	$(".action").textareaCounter2();
	$(".achievements").textareaCounter3();
	</script>
            </form>
    </div>
    </div>

    
  </div>
  </div>
  </div>
</div>

		</section>
	



	
	<?php include('include/footer.php');?>


   
  
</body>


