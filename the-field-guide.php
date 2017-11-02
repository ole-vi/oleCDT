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
<section id="contact" class="banc-pok" style="padding: 156px 0 5%;">
	<div class="container">
	  <div class="row">

      <div class="text-pera phela-bac fir-o">
				
				<h2 class="font_2" style="font-size:60px; text-align:center;"><span style="letter-spacing:0.15em;"><span style="color:rgb(15, 76, 133); font-family:futura-lt-w01-book, sans-serif;">The Field Guide</span></span></h2>
				<div class="col-sm-12 nilinecen">
				  <div class="line-ko"></div>
				</div>
				 
				<h1 class="font_0" style="font-size:20px; text-align:center;">
				  <span style="font-family:futura-lt-w01-book,sans-serif;">
				    <span style="font-size:20px;"><span style="color:#B7121B;">1 Movement, 92&nbsp;Organizations, 3 Easy Ways to Search</span></span>
          </span>
        </h1>
				 	   
				<script> 
        $(document).ready(function(){
          $("#flip").click(function(){
            $("#panel").slideToggle("slow");
          });
        });
        </script>

      </div>
			<div class="col-sm-12 bestmov-bac ">                   
        <div class="col-sm-4 mat-oip">
          <div class="fast-po">
            <a href="">Search organizations by what <span style="color:red;">they</span> do </a>
          </div>
        </div>
        <div class="col-sm-4 mat-oip">
          <div class="fast-po">
            <a href="">Search by what <span style="color:red;">you</span> can do with the organization  </a>
          </div>
        </div>
        <div class="col-sm-4 mat-oip">
          <div class="fast-po">
            <a href="">Search by <span style="color:red;">where</span> you can get involved</a>
          </div>
        </div>
        <div class="col-sm-4 mat-oip">
          <div class="fast-po">
            <a href="">Money Out of Politics Organizations </a>
          </div>
        </div>
        <div class="col-sm-4 mat-oip">
          <div class="fast-po">
            <a href="">Browse All Organizations </a>
          </div>
        </div>
        <div class="col-sm-4 mat-oip">
          <div class="fast-po">
            <a href="">Voting Rights Organizations</a>
          </div>
        </div>
      </div>
		</div>		
    <!-- /.form-group -->
    <!-- /.form-group -->
			  
      
  </div>
</div>
    
    
          </div>
        </div>
      </div>
    </div>
  </div>

</section>

<section  class=" full-mart-div" style="padding: 38px  0 5%;">
	
	<div class="container">
		<div class="row">
			<div class="col-sm-12 ">
			  <h1 class="fop-loh">BY STRATEGY</h1>
			  <p class="text-center">Whether it’s sharing information, organizing on the ground, taking an issue to court, or elevating the voices of everyday Americans, organizations featured in this guide are tackling the crisis of money in politics using six strategies:</p>
			
			</div>
			
	    <div class="col-sm-12 ">
		    <div class="col-sm-4">
		      <div class="ml-pear">
		        <a href=""><img src="img/bco-1.jpg"/></a> 
		      </div>
        </div>
		
		    <div class="col-sm-4">
		      <div class="ml-pear">
		        <a href=""><img src="img/bco-2.jpg"/></a> 
		      </div>
		    </div>
		
		    <div class="col-sm-4">
		      <div class="ml-pear">
		        <a href=""><img src="img/bco-3.jpg"/></a> 
		      </div>
		    </div>
		    <div class="col-sm-4">
		      <div class="ml-pear">
		        <a href=""><img src="img/bco-4.jpg"/></a> 
		      </div>
		    </div>
		    <div class="col-sm-4">
		      <div class="ml-pear">
		        <a href=""><img src="img/bco-5.jpg"/></a> 
		      </div>
		    </div>
		    <div class="col-sm-4">
		      <div class="ml-pear">
		        <a href=""><img src="img/bco-6.jpg"/></a> 
		      </div>
		    </div>
		  </div>
	
		</div>
	</div>		
</section>
		
<section  class=" full-background" style="padding: 38px  0 5%;">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 ">
				<h1 class="fop-lohd">BY ENTRY POINT</h1>
			  <p class="text-center" style="font-family:futura-lt-w01-book,sans-serif; color:#0F4C85;">Our research team has combed through the many organizations in our field guide to identify those who actively seek volunteers like you. </p>
			  <div class="col-sm-12 ">
			    <div class="col-sm-4">
			      <div class="full-imlk">
			        <a href="#"><img src="img/new-1.jpg"></a> 
			      </div>
			    </div>
			    <div class="col-sm-4">
			      <div class="full-imlk">
			        <a href="#"><img src="img/new-2.jpg"></a> 
			      </div>
			    </div>
			    <div class="col-sm-4">
			      <div class="full-imlk">
			        <a href="#"><img src="img/new-3.jpg"></a> 
			      </div>
			    </div>
			  </div>
		  </div>		
</section>

<section  class=" last-background" style="padding: 38px  0 5%;">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 ">
			  <h1 class="fop-loh">BY LOCATION OF ENTRY POINT</h1>
			  <p class="text-center">As the purpose of this Field Guide is to help you get plugged in to the money-out-of-politics movement, we've sorted the organizations by location to help you find an entry point near you. We've divided this section into national and local entry points, as this field guide features organizations with a national reach that have entry points to offer no matter where you live as well as localized entry points through state-based organizations and local chapters of national organizations.</p>
			</div>
			<div class="col-sm-12">
			  <div class="col-sm-6 ">
			    <h3 class="oi-pera-po">National Entry Points</h3>
			    <div class="iklop-img">
			      <a href="#"><img class="mat-poiu" src="img/pg-1.jpg"/></a>
			      <p class="poi-yu">These organizations have opportunities for you to get involved in their main office, for example as a volunteer or intern.</p>
			    </div>
			  </div>
			  <div class="col-sm-6 ">
			
			    <div class="iklop-img">
			      <a href="#"><img class="mat-poiy-1" src="img/pg-2.jpg"/></a>
			      <p class="poi-yu">Entry points for these organizations are available from anywhere in the country.</p>
			    </div>
			  </div>
			</div>
			<div class="col-sm-12">
			  <div class="col-sm-6 ">
			    <h3 class="oi-pera-po">National Entry Points</h3>
			    <div class="iklop-img">
			      <a href="#"><img class="mat-poiu" src="img/pg-3.jpg"/></a>
			      <p class="poi-yu">These organizations have local chapters all over the country. Join one or start one near you!</p>
			    </div>
			  </div>
			  <div class="col-sm-6 ">
			    <div class="iklop-img">
			      <a href="#"><img  class="mat-poiy" src="img/pg-4.jpg"/></a>
			      <p class="poi-yu">These organizations are working at the state level to reduce the influence of money in state politics.</p>
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

  
