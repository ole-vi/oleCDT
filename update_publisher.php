<?php
ob_start();
session_start();
include('include/config.php');
include('include/constants.php');
include('include/header.php');

//$msg='';
/*$publisher_query = "select `publisher` from `tbl_individual_member` where `id`=:id";
$query = $conn->prepare($publisher_query);
$query->bindParam(':id',$_SESSION['id'],PDO::PARAM_STR);
$query->execute();
$row = $query->fetch(PDO::FETCH_ASSOC);
$id = $row['publisher'];*/
$id=base64_decode($_REQUEST['id']);

if(isset($_POST['update']))
{
  $dt_name = $_REQUEST['name'];
  $dt_web = isset($_REQUEST['web']) ? $_REQUEST['web'] : '';
  $dt_mission = isset($_REQUEST['mission']) ? $_REQUEST['mission'] : '';
  $dt_m_info = isset($_REQUEST['m_info']) ? $_REQUEST['m_info'] : '';
  $dt_c_name = isset($_REQUEST['c_name']) ? $_REQUEST['c_name'] : '';
  $dt_c_email = isset($_REQUEST['c_email']) ? $_REQUEST['c_email'] : '';
  $dt_c_phone = !empty($_REQUEST['c_phone']) ? $_REQUEST['c_phone'] : 0;
  $dt_c_url = isset($_REQUEST['c_url']) ? $_REQUEST['c_url'] : '';
  $dt_c_address = isset($_REQUEST['c_address']) ? $_REQUEST['c_address'] : '';
  $dt_o_name = isset($_REQUEST['o_name']) ? $_REQUEST['o_name'] : '';
  $dt_o_address = isset($_REQUEST['o_address']) ? $_REQUEST['o_address'] : '';
  $dt_o_phone = !empty($_REQUEST['o_phone']) ? $_REQUEST['o_phone'] : 0;
  $dt_o_email = isset($_REQUEST['o_email']) ? $_REQUEST['o_email'] : '';
  $dt_o_skype = isset($_REQUEST['o_skype']) ? $_REQUEST['o_skype'] : '';
  $dt_o_other = isset($_REQUEST['o_other']) ? $_REQUEST['o_other'] : '';
  $dt_grade = isset($_REQUEST['grade']) ? implode('::', $_REQUEST['grade']): '';
  $dt_subject = isset($_REQUEST['subject']) ? implode('::', $_REQUEST['subject']): '';
  $dt_format = isset($_REQUEST['format']) ? implode('::', $_REQUEST['format']): '';
  $dt_distribution = isset($_REQUEST['distribution']) ? implode('::', $_REQUEST['distribution']): '';
  $dt_license = isset($_REQUEST['license']) ? implode('::', $_REQUEST['license']): '';
  $dt_language = isset($_REQUEST['language']) ? implode('::', $_REQUEST['language']): '';
  $dt_msa = isset($_REQUEST['msa']) ? implode('::', $_REQUEST['msa']): '';
  $dt_wcag = isset($_REQUEST['wcag']) ? implode('::', $_REQUEST['wcag']): '';
  $dt_pub_available = isset($_REQUEST['pub_available']) ? implode('::', $_REQUEST['pub_available']): '';
  $dt_curriculum = isset($_REQUEST['curriculum']) ? $_REQUEST['curriculum'] : '';
  $dt_edu_usage = isset($_REQUEST['edu_usage']) ? $_REQUEST['edu_usage'] : '';
  $dt_edu_content = isset($_REQUEST['edu_content']) ? implode('::', $_REQUEST['edu_content']): '';
  $dt_assessment = isset($_REQUEST['assessment']) ? implode('::', $_REQUEST['assessment']): '';
  $dt_content_usage = isset($_REQUEST['content_usage']) ? $_REQUEST['content_usage'] : '';
  $dt_content_other = isset($_REQUEST['content_other']) ? $_REQUEST['content_other'] : '';
  $dt_content_quality = isset($_REQUEST['content_quality']) ? $_REQUEST['content_quality'] : '';

  $dt_interest1 = isset($_REQUEST['interest1']) ? implode('::', $_REQUEST['interest1']): '';
  $dt_interest2 = isset($_REQUEST['interest2']) ? implode('::', $_REQUEST['interest2']): '';
  $dt_interest3 = isset($_REQUEST['interest3']) ? implode('::', $_REQUEST['interest3']): '';
  $dt_interest4 = isset($_REQUEST['interest4']) ? implode('::', $_REQUEST['interest4']): '';

  $date = date("Y-m-d");
  $imgFile = $_FILES['pic']['name'];
  $tmp_dir = $_FILES['pic']['tmp_name'];
  $imgSize = $_FILES['pic']['size'];

  if($imgFile!='') 
  {
    $upload_dir = 'publisher/'; // upload directory
  
    $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
    
    // valid image extensions
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
    
    // rename uploading image
    $pic1 = rand(1000,1000000).".".$imgExt;
        
    // allow valid image file formats
    if(in_array($imgExt, $valid_extensions)){
      // Check file size '10KB'
      if($imgSize < 5000000) {
        move_uploaded_file($tmp_dir,$upload_dir.$pic1);
      }
      else{
        $msg = "Sorry, your file is too large.";
        //header("location:stream-details");
      }
    }

    // if no error occured, continue ....
    if(!isset($msg))
    {
      $stmt = "update `tbl_publishers` SET  pic=:pic where `pub_id`=:id";
      $query = $conn->prepare($stmt);
      $query->bindParam(':pic',$pic1, PDO::PARAM_STR);
      $query->bindParam(':id',$id , PDO::PARAM_STR);
      $query->execute();
    }
  }

  $sql1 = "update `tbl_publishers` set name=:name, web=:web, mission=:mission, m_info=:m_info, c_name=:c_name, c_email=:c_email, c_phone=:c_phone, c_url=:c_url, c_address=:c_address, o_name=:o_name, o_address=:o_address, o_phone=:o_phone, o_email=:o_email, o_skype=:o_skype, o_other=:o_other, grade=:grade, subject=:subject, format=:format, distribution=:distribution, license=:license, language=:language, msa=:msa, wcag=:wcag, pub_available=:pub_available, curriculum=:curriculum, edu_usage=:edu_usage, edu_content=:edu_content, assessment=:assessment, content_usage=:content_usage, content_other=:content_other, content_quality=:content_quality, interest1=:interest1, interest2=:interest2, interest3=:interest3, interest4=:interest4, last_update=:date where `pub_id`=:id";
  $query1 = $conn->prepare($sql1);
  $query1->bindParam(':id', $id, PDO::PARAM_STR);
  $query1->bindParam(':name', $dt_name, PDO::PARAM_STR);
  $query1->bindParam(':web', $dt_web, PDO::PARAM_STR);
  $query1->bindParam(':mission', $dt_mission, PDO::PARAM_STR);
  $query1->bindParam(':m_info', $dt_m_info, PDO::PARAM_STR);
  $query1->bindParam(':c_name', $dt_c_name, PDO::PARAM_STR);
  $query1->bindParam(':c_email', $dt_c_email, PDO::PARAM_STR);
  $query1->bindParam(':c_phone', $dt_c_phone, PDO::PARAM_STR);
  $query1->bindParam(':c_url', $dt_c_url, PDO::PARAM_STR);
  $query1->bindParam(':c_address', $dt_c_address, PDO::PARAM_STR);
  $query1->bindParam(':o_name', $dt_o_name, PDO::PARAM_STR);
  $query1->bindParam(':o_address', $dt_o_address, PDO::PARAM_STR);
  $query1->bindParam(':o_phone', $dt_o_phone, PDO::PARAM_STR);
  $query1->bindParam(':o_email', $dt_o_email, PDO::PARAM_STR);
  $query1->bindParam(':o_skype', $dt_o_skype, PDO::PARAM_STR);
  $query1->bindParam(':o_other', $dt_o_other, PDO::PARAM_STR);
  $query1->bindParam(':grade', $dt_grade, PDO::PARAM_STR);
  $query1->bindParam(':subject', $dt_subject, PDO::PARAM_STR);
  $query1->bindParam(':format', $dt_format, PDO::PARAM_STR);
  $query1->bindParam(':distribution', $dt_distribution, PDO::PARAM_STR);
  $query1->bindParam(':license', $dt_license, PDO::PARAM_STR);
  $query1->bindParam(':language', $dt_language, PDO::PARAM_STR);
  $query1->bindParam(':msa', $dt_msa, PDO::PARAM_STR);
  $query1->bindParam(':wcag', $dt_wcag, PDO::PARAM_STR);
  $query1->bindParam(':pub_available', $dt_pub_available, PDO::PARAM_STR);
  $query1->bindParam(':curriculum', $dt_curriculum, PDO::PARAM_STR);
  $query1->bindParam(':edu_usage', $dt_edu_usage, PDO::PARAM_STR);
  $query1->bindParam(':edu_content', $dt_edu_content, PDO::PARAM_STR);
  $query1->bindParam(':assessment', $dt_assessment, PDO::PARAM_STR);
  $query1->bindParam(':content_usage', $dt_content_usage, PDO::PARAM_STR);
  $query1->bindParam(':content_other', $dt_content_other, PDO::PARAM_STR);
  $query1->bindParam(':content_quality', $dt_content_quality, PDO::PARAM_STR);
  $query1->bindParam(':interest1', $dt_interest1, PDO::PARAM_STR);
  $query1->bindParam(':interest2', $dt_interest2, PDO::PARAM_STR);
  $query1->bindParam(':interest3', $dt_interest3, PDO::PARAM_STR);
  $query1->bindParam(':interest4', $dt_interest4, PDO::PARAM_STR);
  $query1->bindParam(':date', $date, PDO::PARAM_STR);

  $run=$query1->execute();
  if($run)
  {
    $to=$o_email;
    $from = $mail_send_from;

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
      header('location:'.$site_url.'detailpage?id='.base64_encode($id));
      echo '<script language="javascript">';
      echo 'alert("Updated Record Sucessfully")';
      echo '</script>';
    }
  }
  else
  {
    header('location:'.$site_url.'detailpage?id='.base64_encode($id));
    echo '<script language="javascript">';
    echo 'alert("Record is not Updated")';
    echo '</script>';
  }
}

$sql = "select * from tbl_publishers where pub_id=:id";
$query = $conn->prepare($sql);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();
$row = $query->fetch(PDO::FETCH_ASSOC);

$state1 = array('Alaska','Alabama','Arizona','Arkansas','California','Colorado','Connecticut','Delaware','Florida','Georgia','Hawaii','Idaho','Illinois','Indiana','Iowa','Kansas','Kentucky','Louisiana','Maine','Maryland','Massachusetts','Michigan','Minnesota','Mississippi','Missouri','Montana','Nebraska','Nevada','New Hampshire','New Jersey','New Mexico','New York','North Carolina','North Dakota','Ohio','Oklahoma','Oregon','Pennsylvania','Rhode Island','South Carolina','South Dakota','Tennessee','Texas','Utah','Vermont','Virginia','Washington','West Virginia','Wisconsin','Wyoming');
?>
<!-- contact start --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo $site_url;?>js/chosen.jquery.js" type="text/javascript"></script>
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

    <h2 class="text-center flo">Update Publisher Detail</h2>
    <div class="full-form">
      <div class="bor-1">
  
        <div class="tab-content">
          <div id="home" class="tab-pane fade in active margin-tp">
     
            <div class="form-menu bor">
              <form method="POST" name="form" onsubmit="return onsubmitform();" action="" enctype="multipart/form-data" class="form-horizontal"  role="form">
                <h2 class="text-center marg"></h2>
                <!-- Name -->
                <div class="form-group">
                  <label for="firstName" class="col-sm-3 control-label">Name</label>
                  <div class="col-sm-9">
                    <input  name="name" id="firstName" placeholder="Full Name" value="<?php echo $row['name'];?>" class="form-control" autofocus="" type="text">
                  </div>
                </div>
                <!-- Website -->
                <div class="form-group">
                  <label for="Websites (Links)" class="col-sm-3 control-label"> Websites (Links)</label>
                  <div class="col-sm-9">
                    <input  id="Websites (Links)" name="web" placeholder="Websites (Links)" class="form-control" type="text">
                  </div>
                </div>
                <!-- Mission -->
                <div class="form-group">
                  <label for="password" class="col-sm-3 control-label">Mission</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" name="mission" placeholder="Enter Mission"></textarea>
                  </div>
                </div>
                <!-- More Info -->
                <div class="form-group">
                  <label for="firstName" class="col-sm-3 control-label">About</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" name="m_info" placeholder="More information about publisher"></textarea>
                  </div>
                </div>
                <!-- Main office -->
                <div class="form-group col-sm-12">
                  <label class="control-label col-sm-3 pada">Main Office</label>
                  <div class="col-sm-3">
                    <div class="inpu">
                      <input  name="c_name" id="name" placeholder="Name" class="form-control" autofocus="" type="text">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="inpu">
                      <input  name="c_email" id=" Email" placeholder=" Email" class="form-control" autofocus="" type="email">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="inpu">
                      <input  name="c_phone" id="mob" placeholder="Phone" class="form-control" autofocus="" type="number">
                      <span id="status2"></span>
                    </div>
                  </div>
                  <div class="col-sm-3">
                  </div>
                  <div class="col-sm-3">
                    <div class="mar">
                      <input  name="c_url" id="Other" placeholder="URL" class="form-control" autofocus="" type="text">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="mar">
                      <input  name="c_address" id="Phone" placeholder="Address" class="form-control" autofocus="" type="text">
                    </div>
                  </div>
                </div>
                <!-- Editor info -->
                <div class="form-group col-sm-12">
                  <label class="control-label col-sm-3 pada">Organization Editor</label>
                  <div class="col-sm-3">
                    <div class="inpu">
                      <input name="o_name" id="Phone" placeholder="Name" class="form-control" autofocus="" type="text">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="inpu">
                      <input name="o_address" id="Phone" placeholder="Address" class="form-control" autofocus="" type="text">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="inpu">
                      <input name="o_phone" id="mob2" placeholder="Phone" class="form-control" autofocus="" type="number">
                      <span id="status3"></span>
                    </div>
                  </div>
                  <div class="col-sm-3">
                  </div>
                  <div class="col-sm-3">
                    <div class="mar">
                      <input name="o_email" id="mail1" placeholder=" Email" class="form-control" autofocus="" type="email">
                      <span id="status1"></span>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="mar">
                      <input name="o_skype" id="Skype" placeholder="Skype" class="form-control" autofocus="" type="email">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="mar">
                      <input name="o_other" id="Other " placeholder="Other " class="form-control" autofocus="" type="text">
                    </div>
                  </div>
                </div>
                <!-- Logo -->
                <div class="form-group">
                  <label for="Logo" class="col-sm-3 control-label">Logo</label>
                  <div class="col-sm-9">
                    <input id="file" name="pic" class="custom-file-input" type="file">
                    <span class="custom-file-control"></span>
                  </div>
                </div>
                <!-- Interest -->
                <div class="form-group">
                  <label class="control-label col-sm-3">Interests</label>
                  <div class="col-sm-9">
                    <div class="row">
                      <?php foreach($pub_filter_lbl as $filter_type => $filter_lbl) {
                        foreach($filter_lbl as $lbl) {
                        echo '<div class="col-sm-4">
                          <label class="radio-inline">
                            <input name="'.$filter_type.'[]" value="'.$lbl.'" type="checkbox"><span class="mat">'.$lbl.'</span>
                          </label>
                          </div>';
                        }
                      } ?>
                    </div>
                  </div>
                </div>
            <!--
            <div class="form-group">
              <div class="col-sm-9 col-sm-offset-3">
                <div class="checkbox go">
                  <label>
                    <input required name="confirm" type="checkbox"><a href="#">I have read and, on behalf of my organization, accept the policies and terms of the Field Guide to the Democracy Movement.   </a>
                  </label>
                </div>
              </div>
            </div> -->
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
</section>

<?php include('include/footer.php');?>
</body>
