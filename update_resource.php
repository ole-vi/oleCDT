<?php
session_start();
include('include/config.php');
include('include/constants.php');
include('include/header.php');

$id=base64_decode($_REQUEST['id']);

if(isset($_POST['update']))
{
  $dt_name = $_REQUEST['name'];
  $dt_pub_id = isset($_REQUEST['pub_id']) ? $_REQUEST['pub_id'] : '';
  $dt_pub_date = isset($_REQUEST['pub_date']) ? $_REQUEST['pub_date'] : '';
  $dt_a_fname = isset($_REQUEST['a_fname']) ? $_REQUEST['a_fname'] : '';
  $dt_a_lname = isset($_REQUEST['a_lname']) ? $_REQUEST['a_lname'] : '';
  $dt_url = isset($_REQUEST['url']) ? $_REQUEST['url'] : '';
  $dt_description = isset($_REQUEST['description']) ? $_REQUEST['description'] : '';
  $dt_availability = isset($_REQUEST['availability']) ? $_REQUEST['availability'] : '';

  $dt_interest1 = isset($_REQUEST['interest1']) ? implode('::', $_REQUEST['interest1']): '';
  $dt_interest2 = isset($_REQUEST['interest2']) ? implode('::', $_REQUEST['interest2']): '';
  $dt_interest3 = isset($_REQUEST['interest3']) ? implode('::', $_REQUEST['interest3']): '';
  $dt_interest4 = isset($_REQUEST['interest4']) ? implode('::', $_REQUEST['interest4']): '';

  $date = date("Y-m-d");
  $imgFile = $_FILES['publication']['name'];
  $tmp_dir = $_FILES['publication']['tmp_name'];
  $imgSize = $_FILES['publication']['size'];

  if($imgFile!='') 
  {
    $upload_dir = 'resource/'; // upload directory
  
    $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
    
    // valid image extensions
    $valid_extensions = array("exl", "doc", "docm", "docx","csv","pdf","jpg", "xlsx", "xls", "png"); // valid extensions
    
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
      $stmt = "update `tbl_resources` SET  publication=:publication where `id`=:id";
      $query = $conn->prepare($stmt);
      $query->bindParam(':publication',$pic1, PDO::PARAM_STR);
      $query->bindParam(':id',$id , PDO::PARAM_STR);
      $query->execute();
    }
  }

  $sql1 = "update `tbl_resources` set name=:name, pub_id=:pub_id, pub_date=:pub_date, a_fname=:a_fname, a_lname=:a_lname, url=:url, description=:description, availability=:availability, last_update=:update, interest1=:interest1, interest2=:interest2, interest3=:interest3, interest4=:interest4 where id=:id";
  $query1 = $conn->prepare($sql1);
  $query1->bindParam(':id', $id, PDO::PARAM_STR);
  $query1->bindParam(':name', $dt_name, PDO::PARAM_STR);
  $query1->bindParam(':pub_id', $dt_pub_id, PDO::PARAM_STR);
  $query1->bindParam(':pub_date', $dt_pub_date, PDO::PARAM_STR);
  $query1->bindParam(':a_fname', $dt_a_fname, PDO::PARAM_STR);
  $query1->bindParam(':a_lname', $dt_a_lname, PDO::PARAM_STR);
  $query1->bindParam(':url', $dt_url, PDO::PARAM_STR);
  $query1->bindParam(':description', $dt_description, PDO::PARAM_STR);
  $query1->bindParam(':availability', $dt_availability, PDO::PARAM_STR);

  $query1->bindParam(':interest1', $dt_interest1, PDO::PARAM_STR);
  $query1->bindParam(':interest2', $dt_interest2, PDO::PARAM_STR);
  $query1->bindParam(':interest3', $dt_interest3, PDO::PARAM_STR);
  $query1->bindParam(':interest4', $dt_interest4, PDO::PARAM_STR);
  $query1->bindParam(':update', $date, PDO::PARAM_STR);

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
      header('location:'.$site_url.'resourcepage?id='.base64_encode($id));
      echo '<script language="javascript">';
      echo 'alert("Updated Record Sucessfully")';
      echo '</script>';
    }
  }
  else
  {
    header('location:'.$site_url.'resourcepage?id='.base64_encode($id));
    echo '<script language="javascript">';
    echo 'alert("Record is not Updated")';
    echo '</script>';
  }
}


$sql = "select * from tbl_resources where id=:id";
$query = $conn->prepare($sql);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();
$row = $query->fetch(PDO::FETCH_ASSOC);

$sql1 = "SELECT pub_id, name from `tbl_publishers` ";
$query1 = $conn->prepare($sql1);
$query1->execute();
$publishers = $query1->fetchAll(PDO::FETCH_ASSOC);
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
      obj.after('<span style="font-size: 11px; clear: both; margin-top: 3px; display: block;" id="counter-text-'+options.ref+'">Max. '+options.limit+' words</span>');

      obj.keyup(function() {
        text = obj.val();
        if(text === "") {
          wordcount = 0;
        } else {
          wordcount = $.trim(text).split(" ").length;
        }
        if(wordcount > options.limit) {
          $("#counter-text-"+options.ref).html('<span style="color: #DD0000;">0 words left</span>');
          limited = $.trim(text).split(" ", options.limit);
          limited = limited.join(" ");
          $(this).val(limited);
        } else {
           $("#counter-text-"+options.ref).html((options.limit - wordcount)+' words left');
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

<section id="contact" class="" style="padding: 139px 0 0">
  <div class="container">

    <h2 class="text-center flo">Update Resource</h2>
    <div class="full-form">
      <div class="bor-1">

        <div class="">
          <div id="home" class="tab-pane fade in active margin-tp">

            <div class="form-menu bor">
              <form method="POST" name="form" onsubmit="return onsubmitform();" action="" enctype="multipart/form-data" class="form-horizontal"  role="form">
                <h2 class="text-center marg"></h2>
                <!-- Name -->
                <div class="form-group">
                  <label for="firstName" class="col-sm-3 control-label">Name*</label>
                  <div class="col-sm-9">
                    <input  name="name" id="firstName" placeholder="Name" class="form-control" autofocus="" type="text" required value="<?php echo $row['name'];?>">
                  </div>
                </div>
                <!-- Publisher -->
                <div class="form-group">
                  <label for="firstName" class="col-sm-3 control-label">Publisher</label>
                  <div class="col-sm-9">
                    <select data-placeholder="Publisher" class="chosen-select" name="pub_id">
                    <?php foreach($publishers as $publisher){
                      if($row['pub_id'] == $publisher['pub_id']) { ?>
                        <option value="<?php echo $publisher['pub_id']; ?>" selected><?php echo $publisher['name'] ?></option>
                      <?php } else { ?>
                        <option value="<?php echo $publisher['pub_id']; ?>"><?php echo $publisher['name'] ?></option>
                    <?php } } ?>
                    </select>
                  </div>
                </div>
                <!-- Date -->
                <div class="form-group">
                  <label for="firstName"  class="col-sm-3 control-label">Publication Date</label>
                  <div class="col-sm-2">
                    <input id="mob" maxlength="4" placeholder="YYYY" class="form-control" value="<?php echo $row['pub_date'];?>" required name="pub_date" type="text">
                    <span id="errmsg"></span>
                  </div>
                </div>
                <!-- Author -->
                <div class="form-group col-sm-12">
                  <label class="control-label col-sm-3 pada">Author</label>
                  <div class="col-sm-3">
                    <div class="inpu">
                      <input  name="a_fname" placeholder="First Name" class="form-control" autofocus="" type="text" value="<?php echo $row['a_fname'];?>">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="inpu">
                      <input  name="a_lname" placeholder="Last Name" class="form-control" autofocus="" type="text" value="<?php echo $row['a_lname'];?>">
                    </div>
                  </div>
                </div>
                <!-- URL -->
                <div class="form-group">
                  <label for="firstName" class="col-sm-3 control-label">URL</label>
                  <div class="col-sm-9">
                    <input  name="url" id="firstName" placeholder="URL" class="form-control" autofocus="" type="text" value="<?php echo $row['url'];?>">
                  </div>
                </div>
                <!-- Description -->
                <div class="form-group">
                  <label for="firstName" class="col-sm-3 control-label">Brief Description</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" name="description" placeholder="Brief Description"></textarea>
                  </div>
                </div>
                <!-- Publication File -->
                <div class="form-group">
                  <label for="Logo" class="col-sm-3 control-label">Upload Publication</label>
                  <div class="col-sm-9">
                    <input  id="file" name="publication" class="custom-file-input" type="file">
                    <span class="custom-file-control"></span>
                  </div>
                </div>
                <!-- Availibity -->
                <div class="form-group">
                  <label for="Logo" class="col-sm-3 control-label">Availibity</label>
                  <div class="col-sm-9">
                    <select data-placeholder="Availability" class="chosen-select" name="availability">
                      <option value="Yes" <?php echo ($row['availability']) ? 'selected' : ''; ?>>Yes</option>
                      <option value="No" <?php echo ($row['availability']) ? 'selected' : ''; ?>>No</option>
                    </select>
                  </div>
                </div>
                <!-- Interest -->
                <div class="form-group">
                  <label class="control-label col-sm-3">Interests</label>
                  <div class="col-sm-9">
                    <div class="row">
                      <?php
                      foreach($pub_filter_lbl as $filter_type => $filter_lbl) {
                        foreach($filter_lbl as $lbl) {
                          $interests = explode('::', $row[$filter_type]);
                          echo '<div class="col-sm-4">
                            <label class="radio-inline">';
                          if(in_array($lbl, $interests)) {
                            echo '<input name="'.$filter_type.'[]" value="'.$lbl.'" type="checkbox" checked>';
                          } else {
                            echo '<input name="'.$filter_type.'[]" value="'.$lbl.'" type="checkbox">';
                          }
                          echo '<span class="mat">'.$lbl.'</span>
                        </label>
                        </div>';
                        }
                      } ?>
                    </div>
                  </div>
                </div>

                <!-- Buttons -->
                <div class="form-group">
                  <div class="col-sm-2  marg-5 ">
                    <button name="update" type="submit" class="btn btn-primary btn-block cwid">Update</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
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
$('[name="mission"]').textareaCounter({limit: 100, ref: "mission"});
$('[name="m_info"]').textareaCounter({limit: 100, ref: "m_info"});
$('[name="curriculum"]').textareaCounter({limit: 100, ref: "curriculum"});
$('[name="edu_usage"]').textareaCounter({limit: 100, ref: "edu_usage"});
$('[name="content_usage"]').textareaCounter({limit: 100, ref: "content_usage"});
$('[name="content_other"]').textareaCounter({limit: 100, ref: "content_other"});
$('[name="content_quality"]').textareaCounter({limit: 100, ref: "content_quality"});
</script>
<!-- contact end -->
<?php include('include/footer.php');?>
</body>
