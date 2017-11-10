<?php 
ob_start();
session_start();
include('include/config.php');
include('include/constants.php');
include('include/header.php');

$id=base64_decode($_REQUEST['id']);

$sql = "select r.*, p.name as pub_name, m.fname as member from tbl_resources as r left join tbl_individual_member as m on m.id=r.mem_id left join tbl_publishers as p on r.pub_id=p.pub_id where r.id=:id";
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
          <a href="update_resource?id=<?php echo base64_encode($row['id']); ?>">
            <button type="button" class="default btn-lg bun-1">Update Resource <i class="fa fa-edit" aria-hidden="true"></i></button>
          </a>
          <a href="javascript:void(0);" id="delPub">
            <button type="button" class="default btn-lg bun-1">Delete Resource <i class="fa fa-trash" aria-hidden="true"></i></button>
          </a>
        </div>
      <?php } ?>
      <!-- <div class="col-sm-12 jal mar-left-12 pad-ouar new-img pull-right">
        <div class="manu" data-wow-delay=".6s" data-wow-duration="1s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.6s; animation-name: fadeInRight;">
          <a href="update_publisher"><p class=" jal-2 jal-4"><span><b>Update Profile</b></span><br>
          </p></a>
        </div>
      </div>-->
      <div class="text-pera last col-sm-12 ">
        <div class="lastupdate">Last Updated On <?php echo date('d-M-Y',strtotime($row['last_update'])); ?></div>
        <h1><?php echo $row['name'];?></h1>
        
        <div class="col-sm-9">
          <p><b style="color:#000;">Member:</b><?php echo $row['member'];?></p>
          <p><b style="color:#000;">Submission Date:</b><?php echo $row['add_date'];?></p>
        </div>

        <div class="col-sm-3">
        <?php if($row['publication']!=''){ ?>
          <a href="resource/<?php echo $row['publication'];?>">Download</a>
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
      <div class="new-1-pera col-sm-12">
          <p><b style="color:#000;">Publication:</b><?php echo $row['pub_name'];?></p>
          <p><b style="color:#000;">Publication Date:</b><?php echo $row['pub_date'];?></p>
          <p><b style="color:#000;">Author:</b><?php echo $row['a_fname'].' '.$row['a_lname'];?></p>
          <p><b style="color:#000;">URL:</b><?php echo $row['url'];?></p>
          <p><b style="color:#000;">Availability:</b><?php echo $row['availability'];?></p>
      </div>

      <div class="w-line-2"></div>
      <div class="new-1-pera col-sm-12">
      <p><?php echo $row['description'];?>
      </p>
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
    window.location.href="<?php echo $site_url.'delete_publisher?id='.base64_encode($row['id']) ?>";
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
</script>
<!-- map end -->

<?php include('include/footer.php');?>
