<?php 
ob_start();
session_start();
include('include/config.php');
include('include/header.php');
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
		<section id="contact" class=" background-img-uplod" style="padding: 156px 0 5%;">
			<div class="container">
			<div class="row">

                 <div class="text-pera phela-bac">
				
				 <h1><span style="color:rgb(15, 76, 133); font-family:futura-lt-w01-book, sans-serif; letter-spacing:0.15em; text-aline:center;">Advocate &amp; Educate</span></h1>
				<div class="col-sm-12 nilinecen">
				<div class="line-ko"></div>
				</div>
				 
				 <p>Here we gather organizations providing analysis and resources about the problem of money in politics and what we can do about it.</p>
				 <div class="lo-arf">
				<a href="#" class="mestak-file"style="font:normal normal 700 16px/1.4em futura-lt-w01-book,sans-serif;">Return to Field Guide</a>
				</div>
						   
						   <script> 
$(document).ready(function(){
    $("#flip").click(function(){
        $("#panel").slideToggle("slow");
    });
});
</script>
                       		 
						   
                               

				
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
		<section  class=" full-mart-div" style="padding: 72px 0 5%;">
		
		<div class="container">
			<div class="row">
			<div class="col-sm-12 fast-demo-1">
			<h1><a href="">Brennan Center for Justice at NYU School of Law</a></h1>
			<div class="col-sm-2 cebt-img">
			<img src="img/10bn.png">
			</div>
			<div class="col-sm-10 past-life-pear">
			<p>Mission: To “hold our political institutions and laws accountable to the twin American ideals of democracy and equal justice for all.”</p>
			</div>
			</div>
			
			<div class="col-sm-12 fast-demo-1">
			<h1><a href="">Campaign Legal Center</a></h1>
			<div class="col-sm-2 cebt-img" style="background-color:#fff;">
			<img src="img/1bn.jpeg">
			</div>
			<div class="col-sm-10 past-life-pear">
			<p>Mission: To represent “the public interest to protect and strengthen our democracy” through litigation and advocacy.</p>
			</div>
			</div>
			
			<div class="col-sm-12 fast-demo-1">
			<h1><a href="">Committee of Seventy</a></h1>
			<div class="col-sm-2 cebt-img">
			<img src="img/3bn.jpg">
			</div>
			<div class="col-sm-10 past-life-pear">
			<p>Mission: To open up and improve the voting process and political culture, to engage citizens in the process of making important decisions about the future, to help to elect qualified public officials, and to assist them to make gov...</p>
			</div>
			</div>
			<div class="col-sm-12 fast-demo-1">
			<h1><a href="">Common Cause</a></h1>
			<div class="col-sm-2 cebt-img" style="background-color:#fff;">
			<img src="img/7bn.jpg">
			</div>
			<div class="col-sm-10 past-life-pear">
			<p>Mission: To restore “the core values of American democracy, reinventing an open, honest and accountable government that serves the public interest, and empowering ordinary people to make their voices heard in the political process....</p>
			</div>
			</div>
			
			<div class="col-sm-12 fast-demo-1">
			<h1><a href="">Democracy 21</a></h1>
			<div class="col-sm-2 cebt-img">
			<img src="img/9bn.png">
			</div>
			<div class="col-sm-10 past-life-pear">
			<p>Mission: “To eliminate the undue influence of big money in American politics, prevent government corruption, empower citizens in the political process and ensure the integrity and fairness of government decisions and elections. The...</p>
			</div>
			</div>
			
			<div class="col-sm-12 fast-demo-1">
			<h1><a href="">Democracy for East Tennessee</a></h1>
			<div class="col-sm-2 cebt-img " style="background-color:#fff;">
			<img src="img/14bn.jpg">
			</div>
			<div class="col-sm-10 past-life-pear">
			<p>Mission: To support an effective and democratic government.</p>
			</div>
			</div>
			
			<div class="col-sm-12 fast-demo-1">
			<h1><a href="">Democracy Matters</a></h1>
			<div class="col-sm-2 cebt-img">
			<img src="img/4bn.jpg">
			</div>
			<div class="col-sm-10 past-life-pear">
			<p>Mission: To “strengthen democracy” by training young people to be “effective grassroots organizers and advocates for public financing of election campaigns” as well as other pro-democracy reforms</p>
			</div>
			</div>
			
			<div class="col-sm-12 fast-demo-1">
			<h1><a href="">Demo</a></h1>
			<div class="col-sm-2 cebt-img">
			<img src="img/8bn.jpg">
			</div>
			<div class="col-sm-10 past-life-pear">
			<p>Mission: To “reduce both political and economic inequality, deploying original research, advocacy, litigation, and strategic communications to create the America the people deserve.”</p>
			</div>
			</div>
			
			<div class="col-sm-12 fast-demo-1">
			<h1><a href="">End Citizens United</a></h1>
			<div class="col-sm-2 cebt-img" style="background-color:#fff;">
			<img src="img/11bn.png">
			</div>
			<div class="col-sm-10 past-life-pear">
			<p>Mission: To “counter the disastrous effects of Citizens United and reform our campaign finance system. To show elected officials, candidates, voters, and the press that the grassroots are fighting back with force against the increa...</p>
			</div>
			</div>
			
			<div class="col-sm-12 fast-demo-1">
			<h1><a href="">Every Voice</a></h1>
			<div class="col-sm-2 cebt-img">
			<img src="img/15bn.png">
			</div>
			<div class="col-sm-10 past-life-pear">
			<p>Mission: To win campaigns and policies that combat the influence of money at the federal, state, and local levels, to ensure that not only the voices of everyday Americans are heard, but that the people of our country have control...</p>
			</div>
			</div>
			
			<div class="col-sm-12 fast-demo-1">
			<h1><a href="">Fair Share</a></h1>
			<div class="col-sm-2 cebt-img">
			<img src="img/6bn.png">
			</div>
			<div class="col-sm-10 past-life-pear">
			<p>Mission: To achieve fair elections and government policies that reflect the will of the people and not the power of money.</p>
			</div>
			</div>
			
			<div class="col-sm-12 fast-demo-1">
			<h1><a href="">Issue One</a></h1>
			<div class="col-sm-2 cebt-img cebt-img" style="background-color:#fff; padding:10px;">
			<img src="img/5bn.png">
			</div>
			<div class="col-sm-10 past-life-pear">
			<p>Mission: To put “everyday citizens back in control of our democracy by reducing the influence of money over American politics and policymaking.”</p>
			</div>
			</div>

			<div class="col-sm-12 fast-demo-1">
			<h1><a href="">Justice at Stake</a></h1>
			<div class="col-sm-2 cebt-img" style="background-color:#fff; padding:10px;">
			<img src="img/2bn.png">
			</div>
			<div class="col-sm-10 past-life-pear">
			<p>Mission: To keep courts fair and impartial by promoting merit-based selection of judges and diversity on the bench, and to protect our justice system through public education, litigation, reform, and safeguarding our courts against...</p>
			</div>
			</div>
			
			<div class="col-sm-12 fast-demo-1">
			<h1><a href="">Michigan Campaign Finance Network</a></h1>
			<div class="col-sm-2 cebt-img"  style="background-color:#fff; padding:10px;">
			<img src="img/12bn.jpg" >
			</div>
			<div class="col-sm-10 past-life-pear">
			<p>Mission: To shine light on money’s role in politics, to improve both accountability and transparency within Michigan state government, and to promote state campaign finance reform.</p>
			</div>
			</div>
			
			<div class="col-sm-12 text-center">
		 <ul class="pagination">
  <li><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
</ul>
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

  
