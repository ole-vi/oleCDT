<?php 
ob_start();
session_start();
include('include/config.php');
include('include/header.php');

$id=base64_decode($_REQUEST['id']);

$sql = "select * from pro_democracy where pro_id=:id";
$query = $conn->prepare($sql);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();
$row = $query->fetch(PDO::FETCH_ASSOC);
?>
    

<section id="contact" class=" background-img-uplod" style="padding: 156px 0 5%;">
	<div class="container">
		<div class="row">
      <div class="col-sm-12 jal mar-left-12 pad-ouar new-img">
				<div class="manu" data-wow-delay=".6s" data-wow-duration="1s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.6s; animation-name: fadeInRight;">
					<a href="<?php echo $site_url;?>searching"><p class=" jal-2 jal-4"><span><b>Return to Directory</b></span><br>                              
          </p></a>					
				</div>
				<!-- /.intro-block end -->
			</div>
			<!--	<div class="col-sm-12 jal mar-left-12 pad-ouar new-img pull-right">
				<div class="manu" data-wow-delay=".6s" data-wow-duration="1s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.6s; animation-name: fadeInRight;">
					<a href="<?php echo $site_url;?>update_organization/<?php echo base64_encode($id);?>"><p class=" jal-2 jal-4"><span><b>Update Profile</b></span><br>                            
          </p></a>					
				</div>	
			</div>-->
      <div class="text-pera last">
				<div class="lastupdate">Last Updated On  <?php echo date('d-M-Y',strtotime($row['last_update'])); ?></div>
				<h1><?php echo $row['name'];?></h1>
				
				<div class="col-sm-9">
				  <p><b style="color:#000;">Mission:</b><?php echo $row['mission'];?></p>
				  <p>Year Founded: <?php echo $row['establish_year']; ?>  •   <?php echo $row['o_phone'];?>   •   <?php echo $row['o_email'];?>  •   <a href="<?php echo $row['weblink'];?>"><?php echo $row['weblink'];?></a></p>
				</div>
						   
				<div class="col-sm-3">
        <?php if($row['logo']!=''){ ?>
          <img src="<?php echo $site_url;?>img/<?php echo $row['logo'];?>" height="150px" width="150px">
        <?php } else { ?>
          <img src="<?php echo $site_url;?>img/ole_logo.png" height="150px" width="150px">
        <?php } ?>
      </div>

      <div class="w-line"></div>					                            

      <div class="col-sm-12">
        <div class="new-1-pera">
          <h1>Current Democracy Work</h1>
          <p><?php echo $row['work_type'];?></p>
        </div> 
      </div>
					
			<div class="w-line-2"></div>

      <div class="col-sm-12">
        <div class="new-1-pera">
          <h1>Recent Successes</h1>
          <p><?php echo $row['achievements'];?></p>
        </div> 
      </div>
					
			<div class="w-line-2"></div>

			<div class="col-sm-12">
        <div class="new-1-pera">
          <h1>Your Entry Points</h1>
          <p class="font_9"><span style="color:#666666;">Attend the Brennan Center’s&nbsp;</span><span style="font-weight:bold;"><a href="#" target="_blank" data-content="#" data-type="external"><span style="color:#0957a2;">events</span></a></span><span style="color:#666666;">&nbsp;and explore its detailed&nbsp;</span><span style="font-weight:bold;"><a href="#" target="_blank" data-content="#" data-type="external"><span style="color:#0957a2;">policy proposals</span></a></span><span style="color:#666666;">,&nbsp;</span><span style="font-weight:bold;"><a href="#" target="_blank" data-content="#" data-type="external"><span style="color:#0957a2;">expert analysis</span></a></span><span style="color:#666666;">, and easy-to-read&nbsp;</span><span style="font-weight:bold;"><a href="http://www.brennancenter.org/press" target="_blank" data-content="#" data-type="external"><span style="color:#0957a2;">articles</span></a></span><span style="color:#666666;">&nbsp;online. Want to get more involved? Apply for one of the Brennan Center’s many&nbsp;</span><span style="font-weight:bold;"><a href="#" 
          target="_blank" data-content="#" data-type="external">
          <span style="color:#0957a2;">fellowship opportunities</span></a></span><span style="color:#666666;">
          &nbsp;or, if you are a legal professional,&nbsp;</span><span style="font-weight:bold;"><a href="#" 
          target="_blank" data-content="#" data-type="external"><span style="color:#0957a2;">volunteer</span>
          </a></span><span style="color:#666666;">&nbsp;with the Center on litigation, policy research, 
          and public advocacy. While based in New York City, the Brennan Center works with people across
           the country and in many different fields.</span></p>
        </div> 
      </div>
					
			<div class="col-sm-12">
			  <div class="piy-p">
					<div class="col-sm-6 butten">
					  <div class="star ">
              <p>Rate this item</p>
              <?php 
              $trat='';
              $rating = $conn->prepare("SELECT * FROM `rating` WHERE oid=:id");
              $rating->execute(array(':id' => $id));
              $count2 = $rating->rowCount();
              $r_row = $rating->fetchAll(PDO::FETCH_ASSOC);
              if($count2 >0)
              {
                foreach($r_row as $r_row1)
                {
                  $trat+=$r_row1['rating'];
                }
                $rscore=floor($trat/$count2);
	              if($rscore==1){ ?>
                  <i class="fa fa-star" style="font-size:30px;color:yellow"></i>
                  <i class="fa fa-star" style="font-size:30px;color:black"></i>
                  <i class="fa fa-star" style="font-size:30px;color:black"></i>
                  <i class="fa fa-star" style="font-size:30px;color:black"></i>
                  <i class="fa fa-star" style="font-size:30px;color:black"></i>
                <?php } else if($rscore==2) { ?>
                  <i class="fa fa-star" style="font-size:30px;color:yellow"></i>
                  <i class="fa fa-star" style="font-size:30px;color:yellow"></i>
                  <i class="fa fa-star" style="font-size:30px;color:black"></i>
                  <i class="fa fa-star" style="font-size:30px;color:black"></i>
                  <i class="fa fa-star" style="font-size:30px;color:black"></i>
                <?php } else if($rscore==3) { ?>
                  <i class="fa fa-star" style="font-size:30px;color:yellow"></i>
                  <i class="fa fa-star" style="font-size:30px;color:yellow"></i>
                  <i class="fa fa-star" style="font-size:30px;color:yellow"></i>
                  <i class="fa fa-star" style="font-size:30px;color:black"></i>
                  <i class="fa fa-star" style="font-size:30px;color:black"></i>
                <?php } else if($rscore==4) { ?>
                  <i class="fa fa-star" style="font-size:30px;color:yellow"></i>
                  <i class="fa fa-star" style="font-size:30px;color:yellow"></i>
                  <i class="fa fa-star" style="font-size:30px;color:yellow"></i>
                  <i class="fa fa-star" style="font-size:30px;color:yellow"></i>
                  <i class="fa fa-star" style="font-size:30px;color:black"></i>
                <?php } else if($rscore == 5) { ?>
                  <i class="fa fa-star" style="font-size:30px;color:yellow"></i>
                  <i class="fa fa-star" style="font-size:30px;color:yellow"></i>
                  <i class="fa fa-star" style="font-size:30px;color:yellow"></i>
                  <i class="fa fa-star" style="font-size:30px;color:yellow"></i>
                  <i class="fa fa-star" style="font-size:30px;color:yellow"></i>
                <?php } else{}
              } ?>
              <?php include('include/reviewandrating.php');
              if(isset($_SESSION['id']))
              {
              ?>
                <a href="javascript:void(0);" data-toggle="modal" data-target="#review" class="w3-btn w3-ripple w3-green mart"><i class="fa fa-plus"></i>Write a review</a> 
              <?php }
              else
              {?>
                <a href="<?php echo $site_url;?>login"  class="w3-btn w3-ripple w3-green mart"><i class="fa fa-plus"></i>Write a review</a>
              <?php }?> 
            </div>
            <div class="col-sm-3 left-po">
              <div id="myProgress">
                <span class="tp-lo">5 star</span><div id="myBar"></div><span class="rto-lo">0%</span>
              </div>

              <div id="myProgress">
                <span class="tp-lo">4 star</span><div id="myBar" class="widt-1"></div><span class="rto-lo">0%</span>
              </div>

              <div id="myProgress">
                <span class="tp-lo">3 star</span><div id="myBar" class="widt-2"></div><span class="rto-lo">0%</span>
              </div>

              <div id="myProgress">
                <span class="tp-lo">2 star</span><div id="myBar" class="widt-3"></div><span class="rto-lo">0%</span>
              </div>

              <div id="myProgress">
                <span class="tp-lo">1 star</span><div id="myBar" class="widt-4"></div><span class="rto-lo">0%</span>
              </div>
            </div>
          </div>
					
					<div class="col-sm-6 butten le">
					  <button class="w3-btn w3-ripple w3-green mat-12">Volunteer</button>
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

  
