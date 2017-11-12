<?php 
ob_start();
session_start();
include('include/config.php');
include('include/constants.php');
include('include/header.php');

$id=base64_decode($_REQUEST['id']);

$sql = "select * from tbl_publishers where pub_id=:id";
$query = $conn->prepare($sql);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();
$row = $query->fetch(PDO::FETCH_ASSOC);

$is_owner = (isset($_SESSION['id']) && $row['mem_id'] == $_SESSION['id']);
?>

<section id="contact" class=" background-img-uplod" style="padding: 156px 0 5%;">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 jal mar-left-12 pad-ouar new-img">
        <div class="manu" data-wow-delay=".6s" data-wow-duration="1s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.6s; animation-name: fadeInRight;">
          <a href="searching"><p class=" jal-2 jal-4"><span><b>Return to Directory</b></span><br>
          </p></a>
        </div>
        <!-- /.intro-block end -->
      </div>
      <?php if($is_owner) { ?>
        <div class="col-sm-4 pull-right">
          <a href="update_publisher?id=<?php echo base64_encode($row['pub_id']); ?>">
            <button type="button" class="default btn-lg bun-1 btn-green">Update Publisher <i class="fa fa-edit" aria-hidden="true"></i></button>
          </a>
          <a href="javascript:void(0);" id="delPub">
            <button type="button" class="default btn-lg bun-1 btn-green">Delete Publisher <i class="fa fa-trash" aria-hidden="true"></i></button>
          </a>
        </div>
      <?php } ?>
      <!-- <div class="col-sm-12 jal mar-left-12 pad-ouar new-img pull-right">
        <div class="manu" data-wow-delay=".6s" data-wow-duration="1s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.6s; animation-name: fadeInRight;">
          <a href="update_publisher"><p class=" jal-2 jal-4"><span><b>Update Profile</b></span><br>
          </p></a>
        </div>
      </div>-->
      <div class="text-pera last col-sm-12">
        <div class="lastupdate">Last Updated On <?php echo date('d-M-Y',strtotime($row['last_update'])); ?></div>
        <h1><?php echo $row['name'];?></h1>
        
        <div class="col-sm-9">
          <p><?php echo ($row['c_phone'] != 0) ? '• '.$row['c_phone'] : '';
          echo (!empty($row['c_email'])) ? ' • '.$row['c_email'] : '';
          echo (!empty($row['web'])) ? ' • '.'<a href="'.$row['web'].'">'.$row['web'].'</a>' : '';
          ?></p>
          <p><b style="color:#000;">Mission: </b><?php echo $row['mission'];?></p>
          <p><b style="color:#000;">About: </b><?php echo $row['m_info'];?></p>
        </div>

        <div class="col-sm-3">
        <?php if($row['pic'] != ''){ ?>
          <img src="publisher/<?php echo $row['pic'];?>" height="150px" width="150px">
        <?php } else { ?>
          <img src="img/ole_logo.png" height="150px" width="150px">
        <?php } ?>
      </div>

      <div class="w-line"></div>

      <div class="col-sm-12">
        <div class="new-1-pera">
          <h1>Interests</h1>
          <p><?php foreach($pub_filter_group as $filter_type => $group) {
            if(!empty($row[$filter_type])) {
              $filters = explode('::', $row[$filter_type]);
              foreach($filters as $interest) {
                echo '<div class="col-sm-3">• '.$interest.'</div>';
              }
            }
          }
          ?></p>
        </div>
      </div>

      <div class="w-line-2"></div>
      <div class="col-sm-12">
        <div class="piy-p">
          <div class="col-sm-6 butten">
            <div class="star ">
              <p>Rate this item</p>
              <?php
              $trat='';
              $rcnt[1] = $rcnt[2] = $rcnt[3] = $rcnt[4] = $rcnt[5] = 0;
              $rating = $conn->prepare("SELECT * FROM `rating` WHERE oid=:id");
              $rating->execute(array(':id' => $id));
              $count2 = $rating->rowCount();
              $r_row = $rating->fetchAll(PDO::FETCH_ASSOC);
              if($count2 > 0)
              {
                foreach($r_row as $r_row1)
                {
                  $rcnt[$r_row1['rating']]++;
                  $trat+=$r_row1['rating'];
                }
                $rscore=floor($trat/$count2);
                for($i=1; $i<=5; $i++) {
                  if($rscore >= $i) {
                    echo '<i class="fa fa-star" style="font-size:30px;color:yellow"></i>';
                  } else {
                    echo '<i class="fa fa-star" style="font-size:30px;color:black"></i>';
                  }
                }
              } ?>
              <?php include('include/reviewandrating.php');
              if(isset($_SESSION['id']))
              {
              ?>
                <a href="javascript:void(0);" data-toggle="modal" data-target="#review" class="w3-btn w3-ripple w3-green mart"><i class="fa fa-plus"></i>Write a review</a> 
              <?php }
              else
              {?>
                <a href="<?php echo $site_url;?>login" class="w3-btn w3-ripple w3-green mart"><i class="fa fa-plus"></i>Write a review</a>
              <?php }?> 
            </div>
            <?php if($count2 > 0) { ?>
            <div class="col-sm-3 left-po">
              <div id="myProgress">
                <span class="tp-lo">5 star</span><div id="myBar" style="width:<?php echo round($rcnt[5]*100/$count2);?>%"></div><span class="rto-lo"><?php echo round($rcnt[5]*100/$count2);?>%</span>
              </div>

              <div id="myProgress">
                <span class="tp-lo">4 star</span><div id="myBar" style="width:<?php echo round($rcnt[4]*100/$count2);?>%"></div><span class="rto-lo"><?php echo round($rcnt[4]*100/$count2);?>%</span>
              </div>

              <div id="myProgress">
                <span class="tp-lo">3 star</span><div id="myBar" style="width:<?php echo round($rcnt[3]*100/$count2);?>%"></div><span class="rto-lo"><?php echo round($rcnt[3]*100/$count2);?>%</span>
              </div>

              <div id="myProgress">
                <span class="tp-lo">2 star</span><div id="myBar" style="width:<?php echo round($rcnt[2]*100/$count2);?>%"></div><span class="rto-lo"><?php echo round($rcnt[2]*100/$count2);?>%</span>
              </div>

              <div id="myProgress">
                <span class="tp-lo">1 star</span><div id="myBar" style="width:<?php echo round($rcnt[1]*100/$count2);?>%"></div><span class="rto-lo"><?php echo round($rcnt[1]*100/$count2);?>%</span>
              </div>
            </div>
          <?php } ?>
          </div>
          <div class="col-sm-6 butten le">
            <a href="javascript:;" id="view-detail"><button class="default btn-lg bun-1 mat-12">Detail</button></a>
          </div>
        </div>
      </div>

      <div class="w-line-2"></div>
      <div class="col-sm-12" id="detail-section" style="display:none;">
        <div class="new-1-pera">
          <h1>Detail</h1>
          <div class="col-sm-12"><b style="color:#000;">Grade Levels: </b></div>
          <?php $pub_grades = explode('::', $row['grade']);
            foreach($pub_grades as $pub_grade) {
              echo '<div class="col-sm-3">• '.$pub_grade.'</div>';
            } ?>
          <div class="col-sm-12"><b style="color:#000;">Subject Areas: </b></div>
          <?php $pub_subjects = explode('::', $row['subject']);
          foreach($pub_subjects as $pub_subject) {
            echo '<div class="col-sm-3">• '.$pub_subject.'</div>';
          } ?>
          <div class="col-sm-12"><b style="color:#000;">Available Digital Formats: </b></div>
          <?php $pub_formats = explode('::', $row['format']);
          foreach($pub_formats as $pub_format) {
            echo '<div class="col-sm-3">• '.$pub_format.'</div>';
          } ?>
          <div class="col-sm-12"><b style="color:#000;">How is the content distributed?</b></div>
          <?php $pub_distributions = explode('::', $row['distribution']);
          foreach($pub_distributions as $pub_distribution) {
            echo '<div class="col-sm-3">• '.$pub_distribution.'</div>';
          } ?>
          <div class="col-sm-12"><b style="color:#000;">How is the content currently licensed?</b><p class="col-sm-12">Unsure of licensing? See <a href="https://creativecommons.org/licenses/" target="_blank">creativecommons.org/licenses</a> for various Creative Commons licensing definitions.</p></div>
          <?php $pub_licenses = explode('::', $row['license']);
          foreach($pub_licenses as $pub_license) {
            echo '<div class="col-sm-3">• '.$pub_license.'</div>';
          } ?>
          <div class="col-sm-12"><b style="color:#000;">Language(s)</b></div>
          <?php $pub_languages = explode('::', $row['language']);
          foreach($pub_languages as $pub_language) {
            echo '<div class="col-sm-3">• '.$pub_language.'</div>';
          } ?>
          <div class="col-sm-12"><b style="color:#000;">Currently available in Modern Standard Arabic (MSA) or a particular dialect</b></div>
          <?php $pub_msas = explode('::', $row['msa']);
          foreach($pub_msas as $pub_msa) {
            echo '<div class="col-sm-3">• '.$pub_msa.'</div>';
          } ?>
          <div class="col-sm-12"><b style="color:#000;">What is the accessibility level of the content according to the Web Content Accessibility Guidelines (WCAG)?</b><p class="col-sm-12">Learn more about levels here: <a href="https://www.w3.org/TR/WCAG21/#cc1" target="_blank">https://www.w3.org/TR/WCAG21/#cc1</a></p></div>
          <?php $pub_wcags = explode('::', $row['wcag']);
          foreach($pub_wcags as $pub_wcag) {
            echo '<div class="col-sm-3">• '.$pub_wcag.'</div>';
          } ?>
          <div class="col-sm-12"><b style="color:#000;">Status</b></div>
          <?php $pub_statuses = explode('::', $row['pub_available']);
          foreach($pub_statuses as $pub_status) {
            echo '<div class="col-sm-3">• '.$pub_status.'</div>';
          } ?>
          <div class="col-sm-12"><b style="color:#000;">Usage, Geographies and Standards</b><p class="col-sm-12"><small><em>Optional, but valuable.</em></small></p>
            <p class="col-sm-12">Has this content been aligned to curricular standards and/or approved by a curricular body?</p></div>
          <?php echo '<p>'.$row['curriculum'].'</p>'; ?>
          <div class="col-sm-12"><b style="color:#000;">What is the educational function of the content (how it fits into a particular learning pathway)?</b><p class="col-sm-12"><small>Note: The content doesn't need to have a particular educational focus (e.g., it could be a book, news program, etc. that initially wasn't intended for an educational use).</small></p></div>
          <?php echo '<p>'.$row['edu_usage'].'</p>'; ?>
          <div class="col-sm-12"><b style="color:#000;">Standard educational pathway (i.e. progressing through grade levels or a degree program)</b></div>
          <?php $pub_contents = explode('::', $row['edu_content']);
          foreach($pub_contents as $pub_content) {
            echo '<div class="col-sm-3">• '.$pub_content.'</div>';
          } ?>
          <div class="col-sm-12"><b style="color:#000;">Does the content include any type of assessment mechanism?</b></div>
          <?php $pub_assessments = explode('::', $row['assessment']);
          foreach($pub_assessments as $pub_assessment) {
            echo '<div class="col-sm-3">• '.$pub_assessment.'</div>';
          } ?>
          <div class="col-sm-12"><b style="color:#000;">Where is the content being used (if known) and at what scale?</b><p class="col-sm-12">Please include geographic contexts, programmatic organizations, number of users (if known), etc.</small></p>
          <?php echo '<p>'.$row['content_usage'].'</p>'; ?>
            <p class="col-sm-12">Is there anything else you would like to note about this content?</p>
            <?php echo '<p>'.$row['content_other'].'</p>'; ?>
            <p class="col-sm-12">Do you know whether the content has gone through any process for quality control, and if so, by who?</p>
            <?php echo '<p>'.$row['content_quality'].'</p>'; ?>
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
$('#delPub').on('click', function() {
  if (confirm("Are you sure? Deleting publisher will delete related resources as well.") == true) {
    window.location.href="<?php echo $site_url.'delete_publisher?id='.base64_encode($row['pub_id']) ?>";
  }
})
$( "#dateofplay" ).datepicker({
  altField: "#alternate1",
  altFormat: "DD, d MM, yy",
  showWeek: true,
  maxDate: 0,
  changeMonth: true,
  changeYear: true,
  yearRange: "-5:+0",
});
$(function(){
  $('#view-detail').click(function() {
    $('#detail-section').toggle();
  });
});
</script>
<!-- map end -->

<?php include('include/footer.php');?>
