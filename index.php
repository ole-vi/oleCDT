<?php 
ob_start();
session_start();
include('include/config.php');
include('include/header.php');
?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
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
    $("#status1").html('<img src="img/loader.gif">&nbsp;Checking availability.');

    $.ajax({
      type: "POST",
      url: "check_ajax",
      data: "email="+ username,
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
<section class="hero">
  <div class="container">
    <h1>Collections Development Tool</h1>
    <p>A tool that makes easy finding learning resources aligned with your needs</p>
  </div>
</section>
<section id="cdt-in-brief" class="background-img-uplod">
  <div class="container">
    <div class="jumbotron">
      <p>OLE’s Collections Development Tool is designed to enable you to search for and find learning resources that are aligned with your needs. It can also be used for policy makers and publishers to identify resource gaps.</p>
      <p>As a brief overview, each database of the Tool––Publishers, Resources, Collections and Members–– shares a common set of filters, under the overall content areas of grade levels, subjects, or languages, for example that are used to identify specific Publishers and Resources.</p>
      <p>The Advisory Board of OLE’S <a href="https://www.ole.org/free-education-library-syrians/">Free Education Library for Syrians</a> (FELS) is responsible for overseeing the functions and uses of the Collections Development Tool. Chaired by Fernando Reimers, Professor of Education at the Harvard Graduate School of Education, FELS is an open library of resources that will enable Syrians continued learning of Syrian educational content, along with resources to pursue career pathways, and specific guides to help Syrian refugees of all ages adjust to life in their host country.</p>
      <p>To learn more about FELS, contact fels@ole.org</p>
    </div>
  </div>
</section>
<script>
  $(document).ready(function(){
    $("#flip").click(function(){
      $("#panel").slideToggle("slow");
    });
  });
</script>
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
  yearRange: "-5:+0"
});
</script>	
<!-- map end -->

<?php include('include/footer.php');?>
