<?php 
ob_start();
session_start();
include('include/header.php');
include('include/config.php');
$value1=$_SESSION['list'];
$final=$_SESSION['final'];
if(isset($_POST['submit']))
{
	
$strat=array();
$found=array();
 $strat= $_POST['strategie'];	
$checkboxes = $_POST['strategie'];
$_SESSION['list'] = $checkboxes;
$value2=$strat;
$finalvalue=array_merge($value2,$value1);
echo $str=implode(',',$strat);
 $state=$_POST['state'];
$volunteers=$_POST['volunteers'];
if(($state=='') and ($volunteers==''))
{
$sql1 = "SELECT * from `pro_democracy` ";
}
else if(($state!='') and ($volunteers==''))
{
$sql1 = "SELECT * from `pro_democracy` where `state` IS NOT NULL";
}
else if(($state=='') and ($volunteers!=''))
{
$sql1 = "SELECT * from `pro_democracy` where `seeking` IS NOT NULL";
}
else 
{
$sql1 = "SELECT * from `pro_democracy` where (`state` and `seeking`) IS NOT NULL";
}
 $query1 = $conn->prepare($sql1);
 $query1->execute();
while($rowdata = $query1->fetch(PDO::FETCH_ASSOC))
 {
	 $strat1 = explode(',', $rowdata['strategies']);
	
	if(($state!='') or ($volunteers!=''))
	{
		if($state!='')
		{
			if($rowdata['state']!='')
			{
			if($strat!='')
			{		
			$var= array_intersect($strat, $strat1);
			foreach($var as $var1)
			{
			if($var==$strat)
			{
			$found[] = $rowdata['pro_id'];	
			}
			}
			}
			else
			{
			$found[] = $rowdata['pro_id'];		
			}
			}
			
		
		}
		elseif($volunteers!='')
		{
			
		
		if($rowdata['seeking']!='')
			{
			if($strat!='')
			{		
			$var= array_intersect($strat, $strat1);
			foreach($var as $var1)
			{
			if($var==$strat)
			{
			$found[] = $rowdata['pro_id'];	
			}
			}
			}
			else
			{
			$found[] = $rowdata['pro_id'];		
			}
			}
		}
		
	}
	else
	{
			$var= array_intersect($strat, $strat1);
			foreach($var as $var1)
			{
				if($var==$strat)
			//if(in_array( $strat1,$strat))
			{
			$found[] = $rowdata['pro_id'];	
			}
			}
	}
}
//print_r($found);
$found = array_unique($found);
//print_r($found);
//print_r($row);
}
else
{
$sql1 = "SELECT `pro_id` from `pro_democracy` order by `name` ";

 $query1 = $conn->prepare($sql1);
 $query1->execute();
while($rowdata = $query1->fetch(PDO::FETCH_ASSOC))
{
	$found[] = $rowdata['pro_id'];
}	
}

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



  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

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

 input.big {
        height: 2.5em;
        width: 2.5em;
    }

</style>

<div class="menu-bar-fixed" id="" >

<div class="col-sm-12 ">
				 
				 
				 <div class="ads fgh">
				 <ul>
				  <li class="select5" rel="A"><a href="#"> A</a> </li>   <li class="select5" rel="B"><a href="#"> B </a></li>  <li class="select5" rel="C"><a href="#"> C </a></li>  <li class="select5" rel="D"><a href="#"> D </a></li>  <li class="select5" rel="E"><a href="#"> E</a> </li> <li class="select5" rel="F"><a href="#"> F</a> </li>  <li class="select5" rel="G"><a href="#"> G </a></li>  <li class="select5" rel="H"><a href="#"> H </a></li>  <li class="select5" rel="I"><a href="#"> I </li>  <li class="select5" rel="J"><a href="#"> J </a></li>  <li class="select5" rel="K"><a href="#"> K </a></li>  <li class="select5" rel="L"><a href="#"> L </a></li>  <li class="select5" rel="M"><a href="#"> M </a></li>  <li class="select5" rel="N"><a href="#"> N </a></li>  <li class="select5" rel="O"><a href="#"> O </a></li>  <li class="select5" rel="P"><a href="#"> P </a></li>  <li class="select5" rel="Q"><a href="#"> Q </a></li>  <li class="select5" rel="R"><a href="#"> R </a></li>  <li class="select5" rel="S"><a href="#"> S </a></li>  <li class="select5" rel="T"><a href="#"> T </a></li>  <li class="select5" rel="U"><a href="#"> U </a></li> <li class="select5" rel="V"><a href="#"> V </a></li> <li class="select5" rel="W"><a href="#"> W </a></li> <li class="select5" rel="X"><a href="#"> X </a></li>  <li class="select5" rel="Y"><a href="#"> Y</a> </li> <li class="select5" rel="Z"><a href="#"> Z </a></li>
				 </ul>
				 </div>
				 
				  

				 </div>
				
		<section id="contact" class=" background-uplod-2" style="padding: 112px 0 5%; margin-top:0px ! important;">
			<form method="post" action="">
			<div class="container">
			<div class="row">

                
				
				
				<div class="col-sm-12">
				<div class="col-sm-3">
				 <h1 class="lok-lo"><span style="color:#fff; font-size:55px; font-family:futura-lt-w01-book, sans-serif; letter-spacing:0.15em; text-aline:center;"><b>FieldGuide Directory</b></span></h1>
				 </div>
				 
				<div class="col-sm-9">
				<div class="lo-imh">
				
				  <img src="img/Untitled-3.png">
				  
				  
				  
				<div class="box-po io-poli">
				<form method="post">
			 
			 <div class="mayt-po-pop">

		
			
		<div class="btn-group koi-po"   >
	
			<label class="btn btn-success  mao-po" style="background-color:#FF8745 !important;   border-color: hsl(21, 100%, 64%) !important; padding: 7px 10px !important;">
				<input style="margin:0px; "  type="checkbox" name="strategie[]" value="Get Money out of Politics"
					<?php if(in_array('Get Money out of Politics',$strat)) { ?> checked="checked"
					style='background-color:#333; color:#FFF;' <?php } ?> >
				
			</label>
			
		
			
			

					 
		
						
				
</div>

	</div>
	
	 <div class="mayt-po-pop poiop">

		
		
		<div class="btn-group koi-po"   >
			
			<label class="btn btn-success  mao-po" style="background-color:#FF8745 !important;   border-color: hsl(21, 100%, 64%) !important; padding: 7px 10px !important; ">
			<input style="margin:0px;" type="checkbox" name="strategie[]" value="Guarantee Voting Rights"
					<?php if(in_array('Guarantee Voting Rights',$strat)) { ?> checked="checked"
					style='background-color:#333; color:#FFF;' <?php } ?> >
				
			</label>
			
			</div>

	</div>
	
	 <div class="mayt-po-pop poiop op-mi">

			<div class="btn-group koi-po"  >
			
			<label class="btn btn-success  mao-po" style="background-color:#92CDDC !important;   border-color: #92CDDC !important; padding: 7px 10px !important; ">
				<input style="margin:0px;" type="checkbox" value="Advocate and Educate" name="strategie[]"
					<?php if(in_array('Advocate and Educate',$strat)) { ?> checked="checked"
					style='background-color:#333; color:#FFF;' <?php } ?> >
			</label>
			
		</div>

	</div>
	
	 <div class="mayt-po-pop poiop op-mi po-2-po">

		
		
		<div class="btn-group koi-po"   >
			
			<label class="btn btn-success  mao-po" style="background-color:#92CDDC !important;   border-color: #92CDDC !important; padding: 7px 10px !important; ">
				<input style="margin:0px;" type="checkbox" name="strategie[]" value="Dig into Data"
					<?php if(in_array('Dig into Data',$strat)) { ?> checked="checked"
					style='background-color:#333; color:#FFF;' <?php } ?> >
			</label>
		
			
		</div>

	</div>
	
	
	
	 <div class="mayt-po-pop poiop op-mi po-3-po">

		
		
		<div class="btn-group koi-po"   >
			
			<label class="btn btn-success  mao-po"  style="background-color:#92CDDC !important;   border-color: #92CDDC !important; padding: 7px 10px !important; ">
				<input style="margin:0px;" type="checkbox" name="strategie[]" value="Take Legal Action"
					<?php if(in_array('Take Legal Action',$strat)) { ?> checked="checked"
					style='background-color:#333; color:#FFF;' <?php } ?> >
			</label>
			
			
			
		</div>

	</div>
	
	<div class="mayt-po-pop poiop op-mi po-4-po">

		
		
		<div class="btn-group koi-po" >
			
			<label class="btn btn-success  mao-po" style="background-color:#92CDDC !important;   border-color: #92CDDC !important; padding: 7px 10px !important; ">
				<input style="margin:0px;" type="checkbox" name="strategie[]" value="Activate Citizens"
					<?php if(in_array('Activate Citizens',$strat)) { ?> checked="checked"
					style='background-color:#333; color:#FFF;' <?php } ?> >
			</label>
			
		</div>

	</div>
	
	<div class="mayt-po-pop poiop op-mi po-5-po">

		
		
		<div class="btn-group koi-po"   >
			
			<label class="btn btn-success  mao-po" style="background-color:#92CDDC !important;   border-color: #92CDDC !important; padding: 7px 10px !important; ">
				<input style="margin:0px;" type="checkbox" value="Fund the Movement" name="strategie[]"
					<?php if(in_array('Fund the Movement',$strat)) { ?> checked="checked"
					style='background-color:#333; color:#FFF;' <?php } ?> >
			</label>
			
		
		
			
		</div>

	</div>
	
	
	<div class="mayt-po-pop poiop op-mi po-6-po">

		
		
		<div class="btn-group koi-po"   >
			
			<label class="btn btn-success  mao-po" style="background-color:#92CDDC !important;   border-color: #92CDDC !important; padding: 7px 10px !important; ">
				<input style="margin:0px;" type="checkbox" name="strategie[]" value="Political Action Committee"
					<?php if(in_array('Political Action Committee',$strat)) { ?> checked="checked"
					style='background-color:#333; color:#FFF;' <?php } ?> >
			</label>
			
			
		</div>

	</div>
	
	
	<div class="mayt-po-pop poiop op-mi po-7-po">

		
		
		<div class="btn-group  koi-po  fool"  >
			
			<label class="btn btn-success  mao-po" style="background-color:#CCFFCC !important;   border-color: #CCFFCC !important; padding: 7px 10px !important; ">
			<input style="margin:0px;" type="checkbox" name="state" value="state"
					<?php if($state!='') { ?> checked="checked"
					style='background-color:#333; color:#FFF;' <?php } ?> >
			</label>
			
			
			
		</div>

	</div>
	
	
		<div class="mayt-po-pop poiop op-mi po-8-po">

		
		
		<div class="btn-group  koi-po  fool "  >
			
			<label class="btn btn-success  mao-po" style="background-color:#FFFF00 !important;   border-color:#FFFF00 !important; padding: 7px 10px !important; ">
				<input style="margin:0px;" type="checkbox" name="volunteers" value="volunteers"
						<?php if($volunteers!='') { ?> checked="checked"
					style='background-color:#333; color:#FFF;' <?php } ?> >
			</label>
			
		
			
		</div>

	</div>
	
	<div class="sdfr " style=" margin-top: -33px!important;">
			<button class="button button2 " style='background-color: hsl(113, 82%, 51%) !important;color: hsl(222, 100%, 34%) !important;'>All 

			</div>
			
			
			<div class=" lo-po-12 " >
			<button type="submit" name ="submit" class="button button2 ba-colo-r"><i class="fa fa-arrow-left" aria-hidden="true" style='margin-left: 0px;float: left;margin-top: 4px;'></i>Select 
</button>
			
			</div>
</form>
</div>

			</div>

			</div>
			
		

				 </div>
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 </div>
				 </div>
				 
				 
				
				
				 
				 
						   
						
                       		 
						   
                               

				
				 
					
                
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
					
				
				
				
				
				 <!-- /.form-group -->
               <!-- /.form-group -->
			  
      
    
    
    
    
  
  
  


</form>
		</section>
		
		 </div>
		
		
		<section  class=" full-mart-div" style="padding: 5px 0 5%">
		
		<div class="container">
			<div class="row">
			
			<div class="maty-op" id="masterdiv">
			<?php

foreach($found as $id)
{
$sql = "SELECT * from `pro_democracy` where `pro_id`='".$id."' ";
$query = $conn->prepare($sql);
//$query->bindParam(':email', $email, PDO::PARAM_STR);
$query->execute();
$row = $query->fetchAll(PDO::FETCH_ASSOC);





			foreach ($row as $row) { ?>
			
			<a href="<?php echo $site_url;?>detailpage/<?php echo base64_encode($row['pro_id']);?>">
			<div class="col-sm-12 no-background" >
			<div class="col-sm-5 na-color">
			<div class="texippo">
			<p><?php echo $row['name'];?></p>
			</div>
			
			</div>
			
			<?php $var=array();
			$var= explode(',', $row['strategies']);
			?>
			<div class="col-sm-7">
			<div class="box-po">
			<div class="btn-group koi-po" data-toggle="buttons">
			<?php if(in_array('Get Money out of Politics',$var)) { ?>
			<label class="btn btn-success  mao-po" style=" height: 30px;
    padding: 3px 5px;
    width: 40px;">
				
			</label>
			<?php } else { ?>
			

			<label class="btn btn-success  mao-po" style="   height: 30px;
    padding: 3px 5px;
    width: 40px; background-color:#fff !  important;">
				
			</label>			
		
			<?php } ?>			
				

						
		
			
		</div>
			</div>
			<div class="box-po">
			<div class="btn-group koi-po" data-toggle="buttons">
			

			
	<?php if(in_array('Guarantee Voting Rights',$var)) { ?>
						<label class="btn btn-success  mao-po" style="   height: 30px;
    padding: 3px 5px;
    width: 40px;"> 
				
			</label>
			<?php } else {?>
			

			<label class="btn btn-success  mao-po" style="   height: 30px;
    padding: 3px 5px;
    width: 40px; background-color:#fff !  important;">
				
			</label>			
		
			<?php } ?>			
				
			
		</div>
			</div>

			<div class="box-po">
			 <div class="btn-group koi-po-1" data-toggle="buttons">
			
			
			
				<?php if(in_array('Advocate and Educate',$var)) { ?>
			<label class="btn btn-success ban" style="   height: 30px;
    padding: 3px 5px;
    width: 40px;">
				
			</label>
			<?php } else {?>
			

			<label class="btn btn-success  mao-po" style="   height: 30px;
    padding: 3px 5px;
    width: 40px; background-color:#fff !  important;">
				
			</label>			
		
			<?php } ?>	

						
		
						
				

						
		
			
		</div>
			</div>
			<div class="box-po">
			 <div class="btn-group koi-po-1" data-toggle="buttons">
			
			
			
			
		<?php if(in_array('Dig into Data',$var)) { ?>
		<label class="btn btn-success ban" style="   height: 30px;
    padding: 3px 5px;
    width: 40px;">
				
			</label>
			<?php } else {?>
			

			<label class="btn btn-success  mao-po" style="   height: 30px;
    padding: 3px 5px;
    width: 40px; background-color:#fff !  important;">
				
			</label>			
		
			<?php } ?>	
						
		
						
				

						
		
			
		</div>
			</div>
			<div class="box-po">
			
			 <div class="btn-group koi-po-1" data-toggle="buttons">
			
			
			
			<?php if(in_array('Take Legal Action',$var)) { ?>
		<label class="btn btn-success ban" style="   height: 30px;
    padding: 3px 5px;
    width: 40px;">
				
			</label>
			<?php } else {?>
			

			<label class="btn btn-success  mao-po" style="   height: 30px;
    padding: 3px 5px;
    width: 40px; background-color:#fff !  important;">
				
			</label>			
		
			<?php } ?>

						
		
						
				

						
		
			
		</div>
			
			</div>
			<div class="box-po">
			<div class="btn-group koi-po-1" data-toggle="buttons">
			
			
			
			

			<?php if(in_array('Activate Citizens',$var)) { ?>
		<label class="btn btn-success ban" style="   height: 30px;
    padding: 3px 5px;
    width: 40px;">
				
			</label>
			<?php } else {?>
			

			<label class="btn btn-success  mao-po" style="   height: 30px;
    padding: 3px 5px;
    width: 40px; background-color:#fff !  important;">
				
			</label>			
		
			<?php } ?>			
		
						
				

						
		
			
		</div>
			</div>
			<div class="box-po">
			<div class="btn-group koi-po-1" data-toggle="buttons">
			
			
			
			
		<?php if(in_array('Fund the Movement',$var)) { ?>
		<label class="btn btn-success ban" style="   height: 30px;
    padding: 3px 5px;
    width: 40px;">
				
			</label>
			<?php } else {?>
			

			<label class="btn btn-success  mao-po" style="   height: 30px;
    padding: 3px 5px;
    width: 40px; background-color:#fff !  important;">
				
			</label>			
		
			<?php } ?>
						
		
						
				

						
		
			
		</div>
			</div>
			<div class="box-po">
			 <div class="btn-group koi-po-1" data-toggle="buttons">
			
			<?php if(in_array('Political Action Committee',$var)) { ?>
		<label class="btn btn-success ban" style="   height: 30px;
    padding: 3px 5px;
    width: 40px;">
				
			</label>
			<?php } else {?>
			

			<label class="btn btn-success  mao-po" style="   height: 30px;
    padding: 3px 5px;
    width: 40px; background-color:#fff !  important;">
				
			</label>			
		
			<?php } ?>
			

						
		
						
				

						
		
			
		</div>
			</div>
			<div class="box-po">
			 <div class="btn-group koi-po-2" data-toggle="buttons">
			
			
			
			<?php if($row['state']!='') { ?>
		<label class="btn btn-success ban" style="   height: 30px;
    padding: 3px 5px;
    width: 40px;">
				
			</label>
			<?php } else {?>
			

			<label class="btn btn-success  mao-po" style="   height: 30px;
    padding: 3px 5px;
    width: 40px; background-color:#fff !  important;">
				
			</label>			
		
			<?php } ?>
						

						
		
						
				

						
		
			
		</div>
			</div>
			<div class="box-po">
			 <div class="btn-group koi-po-3" data-toggle="buttons">
			
			
			
			
		<?php if($row['seeking']!='') { ?>
		<label class="btn btn-success ban" style="   height: 30px;
    padding: 3px 5px;
    width: 40px;">
				
			</label>
			<?php } else {?>
			

			<label class="btn btn-success  mao-po" style="   height: 30px;
    padding: 3px 5px;
    width: 40px; background-color:#fff !  important;">
				
			</label>			
		
			<?php } ?>
						
		
						
				

						
		
			
		</div>
			</div>
			
		
			
			
			
			
			
			</div>
			</div>
			</a>
			
<?php } }?>
		<?php if(isset($_POST['submit'])) {?>
		<a href="<?php echo $site_url;?>searching" class="lastupdate1">Return to Directory</a>
		<?php } else {}?>
			</div>
			<div id="result1" class="maty-op"></div>
			
			
			
			
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
    $(document).ready(function(){
    $('.select5').on('click',function(){          
        var search = $(this).attr("rel");
        //alert(search);
        {
            $.ajax({                
                type: "POST",
                url: "search_alphp.php",
                data: "search=" + search,                        
                success:function(html){
					$('#masterdiv').remove();
					//$('#masterdiv div').html('');
                    $('#result1').html(html);                    
                }
            });

        } 
        })
    });

</script>	
	<!-- map end -->

	
<?php include('include/footer.php');?>

  
