<?php
session_start();
include('include/config.php');
include('include/constants.php');
include('include/header.php');

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
<script type="text/javascript">
function onsubmitform()
{
  if(document.pressed == 'Submit')
  {
   document.form.action ="insert_resource";
  }
  else if(document.pressed == 'Preview')
  {
    document.form.action ="insert_prev";
  }
  else if(document.pressed == 'Save without Submitting')
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

<section id="contact" class="" style="padding: 139px 0 0">
  <div class="container">

    <h2 class="text-center flo">Add Resource</h2>
    <div class="full-form">
      <div class="bor-1">

        <div class="">
          <div id="home" class="tab-pane fade in active margin-tp">

            <div class="form-menu bor">
              <form method="POST" name="form" onsubmit="return onsubmitform();" action="" enctype="multipart/form-data" class="form-horizontal"  role="form">
                <h2 class="text-center marg"></h2>
                <!-- Name -->
                <div class="form-group">
                  <label for="firstName" class="col-sm-3 control-label">Name</label>
                  <div class="col-sm-9">
                    <input  name="name" id="firstName" placeholder="Name" class="form-control" autofocus="" type="text">
                  </div>
                </div>
                <!-- Publisher -->
                <div class="form-group">
                  <label for="firstName" class="col-sm-3 control-label">Publisher</label>
                  <div class="col-sm-9">
                    <select data-placeholder="Publisher" class="chosen-select" name="pub_id">
                    <?php foreach($publishers as $publisher){ ?>
                      <option value="<?php echo $publisher['pub_id']; ?>"><?php echo $publisher['name'] ?></option>
                    <?php } ?>
                    </select>
                  </div>
                </div>
                <!-- Date -->
                <div class="form-group">
                  <label for="firstName"  class="col-sm-3 control-label">Publication Date</label>
                  <div class="col-sm-2">
                    <input id="mob" maxlength="4" placeholder="YYYY" class="form-control" required name="pub_date" type="text">
                    <span id="errmsg"></span>
                  </div>
                </div>
                <!-- Author -->
                <div class="form-group col-sm-12">
                  <label class="control-label col-sm-3 pada">Author</label>
                  <div class="col-sm-3">
                    <div class="inpu">
                      <input  name="a_fname" placeholder="First Name" class="form-control" autofocus="" type="text">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="inpu">
                      <input  name="a_lname" placeholder="Last Name" class="form-control" autofocus="" type="text">
                    </div>
                  </div>
                </div>
                <!-- URL -->
                <div class="form-group">
                  <label for="firstName" class="col-sm-3 control-label">URL</label>
                  <div class="col-sm-9">
                    <input  name="url" id="firstName" placeholder="URL" class="form-control" autofocus="" type="text">
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
                      <option value="Yes">Yes</option>
                      <option value="No">No</option>
                    </select>
                  </div>
                </div>
                <!-- Interest -->
                <div class="form-group">
                  <label class="control-label col-sm-3">Interest</label>
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

                <!-- Buttons -->
                <div class="form-group">
                  <div class="col-sm-2  marg-5 ">
                    <input name="submit" type="submit" onclick="document.pressed=this.value" value="Submit" class="btn btn-primary btn-block cwid">
                  </div>
                  <!--<div class="col-sm-2 ">
                    <input type="submit" name="preview" onclick="document.pressed=this.value" value="Preview" id="preview"  class="btn btn-primary btn-block cwid-1">
                  </div>
                  <div class="col-sm-4  ">
                    <input name="save_without" id="save_without" onclick="document.pressed=this.value" type="submit" class="btn btn-primary btn-block wth" value="Save without Submitting">
                  </div>-->
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
