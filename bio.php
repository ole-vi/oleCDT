<?php 
ob_start();
session_start();
include('include/config.php');
include('include/constants.php');
include('include/header.php');

if(isset($my_profile)) $id = $_SESSION['id'];
else $id = base64_decode($_REQUEST['id']);

$sql = "select * from tbl_individual_member where id='".$id."' ";
$query = $conn->prepare($sql);
$query->bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$row = $query->fetch(PDO::FETCH_ASSOC);
?>

<section id="contact" class=" background-img-uplod" style="padding: 156px 0 5%;">
  <div class="container">
    <div class="row">
      <?php if(isset($my_profile)) { ?>
        <div class="pull-right">
          <a href="editprofile">
            <button type="button" class="default btn-lg bun-1 btn-green">Update Profile <i class="fa fa-edit" aria-hidden="true"></i></button>
          </a>
          <a href="add_publisher"><button type="button" class="default btn-lg bun-1 btn-green">Add Publisher <i class="fa fa-edit" aria-hidden="true"></i></button></a>
          <a href="#"><button type="button" class="default btn-lg bun-1 btn-green">My Publishers <i class="fa fa-edit" aria-hidden="true"></i></button></a>
          <a href="add_resource"><button type="button" class="default btn-lg bun-1 btn-green">Add Resource <i class="fa fa-edit" aria-hidden="true"></i></button></a>
          <a href="#"><button type="button" class="default btn-lg bun-1 btn-green">My Resources <i class="fa fa-edit" aria-hidden="true"></i></button></a>
        </div>
      <?php } ?>
      <div class="text-pera last col-sm-12">
        <div class="lastupdate">Last Updated On <?php echo date('d-M-Y',strtotime($row['last_update'])); ?></div>
        <h1><?php echo $row['fname'];?></h1>
        <div class="col-sm-9">
          <div class="row">
            <label for="firstName" class="col-sm-6">Email</label>
            <label for="firstName" class="col-sm-6">User Name</label>
            <div class="col-sm-6"><?php echo $row['email'];?></div>
            <div class="col-sm-6"><?php echo $row['l_name'];?></div>
          </div>
          <div class="row">
            <label for="firstName" class="col-sm-6">Birth Date</label>
            <label for="firstName" class="col-sm-6">Citizenship</label>
            <div class="col-sm-6"><?php echo $row['dob'];?></div>
            <div class="col-sm-6"><?php echo $row['citizenship'];?></div>
          </div>
        </div>
        <div class="col-sm-3">
        <?php if($row['pic']!=''){ ?>
          <img src="profile/<?php echo $row['pic'];?>" height="150px" width="150px">
        <?php } else { ?>
          <img src="img/ole_logo.png" height="150px" width="150px">
        <?php } ?>
      </div>

      <div class="w-line"></div>
      <div class="col-sm-12">
        <div class="new-1-pera">
          <h1>Contact</h1>
          <div class="row">
            <label for="firstName" class="col-sm-4">Mobile phone</label>
            <label for="firstName" class="col-sm-4">Office Phone</label>
            <label for="firstName" class="col-sm-4">Other Phone</label>
            <div class="col-sm-4"><?php echo $row['mob'];?></div>
            <div class="col-sm-4"><?php echo $row['off_phone'];?></div>
            <div class="col-sm-4"><?php echo $row['o_phone'];?></div>
          </div>
          <div class="row">
            
            <label for="firstName" class="col-sm-4">Street</label>
            <label for="firstName" class="col-sm-4">City</label>
            <label for="firstName" class="col-sm-4">Zip</label>
            <div class="col-sm-4"><?php echo $row['street'];?></div>
            <div class="col-sm-4"><?php echo $row['city'];?></div>
            <div class="col-sm-4"><?php echo $row['zip'];?></div>

            <label for="firstName" class="col-sm-12">State</label>
            <?php $sts = explode('::', $row['state']);
            foreach($sts as $st) { ?>
            <div class="col-sm-4"><?php echo '• '.$st; ?></div>
            <?php } ?>
          </div>
          <div class="row">
            <label for="firstName" class="col-sm-4">Skype</label>
            <label for="firstName" class="col-sm-4">Facebook</label>
            <label for="firstName" class="col-sm-4"></label>
            <div class="col-sm-4"><?php echo $row['skype'];?></div>
            <div class="col-sm-4"><?php echo $row['facebook'];?></div>
            <div class="col-sm-4"></div>
          </div>
        </div>
      </div>

      <div class="w-line-2"></div>
      <div class="col-sm-12">
        <div class="new-1-pera">
          <h1>Purpose</h1>
          <p><?php if(!empty($row['purpose'])) {
            $pur = explode('::', $row['purpose']);
            foreach($pur as $p) {
              echo '<div class="col-sm-3">• '.$p.'</div>';
            }
          }
          ?></p>
        </div>
      </div>

      <div class="w-line-2"></div>
      <div class="col-sm-12">
        <div class="new-1-pera">
          <h1>Content Areas</h1>
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
