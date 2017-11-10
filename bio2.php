<?php
ob_start();
session_start();
include('include/config.php');
include('include/header.php');

if(isset($my_profile)) $id = $_SESSION['id'];
else $id = base64_decode($_REQUEST['id']);

$sql = "select * from tbl_individual_member where id='".$id."' ";
$query = $conn->prepare($sql);
$query->bindParam(':id', $id, PDO::PARAM_STR);

$query->execute();
$count = $query->rowCount();
$count;
$row = $query->fetch(PDO::FETCH_ASSOC);	

$work_type = explode(',',($row['work_type']));
$location = explode(',',($row['location']));
$state1 = array('Alaska','Alabama','Arizona','Arkansas','California','Colorado','Connecticut','Delaware','Florida','Georgia','Hawaii','Idaho','Illinois','Indiana','Iowa','Kansas','Kentucky','Louisiana','Maine','Maryland','Massachusetts','Michigan','Minnesota','Mississippi','Missouri','Montana','Nebraska','Nevada','New Hampshire','New Jersey','New Mexico','New York','North Carolina','North Dakota','Ohio','Oklahoma','Oregon','Pennsylvania','Rhode Island','South Carolina','South Dakota','Tennessee','Texas','Utah','Vermont','Virginia','Washington','West Virginia','Wisconsin','Wyoming');
$state = explode(',',($row['state']));

$work = array('Administrative','Accounting','Canvasing door-to-door','Legal','Legislation','Media','Phone Bank','Web Management','Writing','Fund Raising');
$loc = array('Office','Online','Field');
echo $row['name'];
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
<script src="js/chosen.jquery.js" type="text/javascript"></script>
<script src="docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="docsupport/style.css">
<link rel="stylesheet" href="docsupport/prism.css">
<link rel="stylesheet" href="chosen.css">
<style type="text/css" media="all">
/* fix rtl for demo */
.chosen-rtl .chosen-drop { left: -9000px; }

.fstElement { font-size: 1.2em; }
.fstToggleBtn { min-width: 16.5em; }

.submitBtn { display: none; }

.fstMultipleMode { display: block; }
.fstMultipleMode .fstControls { width: 100%; }

#status1
{
font-size:11px;
margin-left:10px;
}
#status2
{
font-size:11px;
margin-left:310px;
}
.green11
{
background-color:#CEFFCE;
}
.red11
{
background-color:#FFD9D9;
}
.warning {
  color:#000;
  padding:5px;
  width:100%;
  display:none;
}
</style>
<?php 
if(isset($_SESSION['ind']))
{
  $msg=$_SESSION['ind'];
  echo '<script language="javascript">';
  echo 'alert("'.$msg.'")';
  echo '</script>';
  unset($_SESSION['ind']);
}
?>
<section id="contact" class="" style="padding: 139px 0 1500px;">
  <div class="container">
    <div class="row">

      <h2 class="text-center flo">My Profile</h2>
      <div class="full-form" style=" margin-top: 57px;">
        <div class="bor-1">
          <div id="home">
            <div class="form-menu bor">
              <form class="form-horizontal" role="form" method="POST" action="insert_individual">
                <div class="form-group">
                  <label for="firstName" class="col-sm-3 control-label">Name</label>
                  <div class="col-sm-9">
                    <?php echo $row['name'];?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="firstName" class="col-sm-3 control-label">Email</label>
                  <div class="col-sm-9">
                    <?php echo $row['email'];?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="l_name" class="col-sm-3 control-label"></label>
                  <div class="col-sm-9">
                    <label for="l_name" class=" control-label">Login Name</label>
                    <?php echo $row['l_name'];?>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-3">Type of Work</label>
                  <div class="col-sm-6">
                    <div class="row">
                      <?php
                      $work_type = explode(',', $row['work_type']);
                      foreach($work_type as $wtype) {
                        echo '<div class="col-sm-4">'.$wtype.'</div>';
                      } ?>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-3">Possible Work Locations</label>
                  <div class="col-sm-9">
                    <div class="row">
                      <?php
                      $work_loc = explode(',', $row['location']);
                      foreach($work_loc as $wloc) {
                        echo '<div class="col-sm-4">'.$wloc.'</div>';
                      } ?>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="country" class="col-sm-3 control-label">Possible Hours of Work per Week</label>
                  <div class="col-sm-9">
                    <?php echo $row['hours_perweak'];?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="Education" class="col-sm-3 control-label">Education</label>
                  <div class="col-sm-9">
                    <div class="row">
                      <?php
                      $education = explode(',', $row['education']);
                      foreach($education as $edu) {
                        echo '<div class="col-sm-4">'.$edu.'</div>';
                      } ?>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="firstName"  class="col-sm-3 control-label">Work History</label>
                  <div class="col-sm-9">
                    <?php echo $row['work_history'];?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="firstName"  class="col-sm-3 control-label">Mobile phone</label>
                  <div class="col-sm-9">
                    <?php echo $row['mob'];?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="firstName" class="col-sm-3 control-label">Home phone</label>
                  <div class="col-sm-9">
                    <?php echo $row['phone'];?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="firstName" class="col-sm-3 control-label">Office phone</label>
                  <div class="col-sm-9">
                    <?php echo $row['office_phone'];?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="firstName" class="col-sm-3 control-label">Other phone</label>
                  <div class="col-sm-9">
                    <?php echo $row['other_phone'];?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="firstName" class="col-sm-3 control-label">Skype</label>
                  <div class="col-sm-9">
                    <?php echo $row['skype'];?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="firstName" class="col-sm-3 control-label">Facebook</label>
                  <div class="col-sm-9">
                    <?php echo $row['facebook'];?>
                  </div>
                </div>

                <div class="form-group col-sm-12">
                  <label class="control-label col-sm-3 pada">Address</label>
                  <div class="col-sm-3">
                    <div class="inpu">
                      <label for="street" class=" control-label">Street</label>
                      <?php echo $row['street'];?>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="inpu">
                      <label for="city" class=" control-label">City</label>
                      <?php echo $row['city'];?>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="inpu">
                      <label for="zip" class=" control-label">Zip</label>
                      <?php echo $row['zip'];?>
                    </div>
                  </div>
                  <div class="col-sm-3">
                  </div>
                  <div class="col-sm-9">
                    <div class="row">
                      <?php
                      $education = explode(',', $row['state']);
                      foreach($education as $edu) {
                        echo '<div class="col-sm-4">'.$edu.'</div>';
                      } ?>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="firstName" class="col-sm-3 control-label"> Birth Date</label>
                  <div class="col-sm-4">
                    <?php echo $row['dob'];?>
                  </div>
                  <div class="col-sm-5">
                    <label for="citizenship" class=" control-label">Citizenship</label>
                    <?php echo $row['citizenship'];?>
                  </div>
                </div>

                <!-- <div class="form-group">
                  <label for="firstName" class="col-sm-3 control-label">Propose a New Organization</label>
                  <div class="col-sm-6">
                    <input id="org" required name="org" placeholder="Name of Organization" class="form-control" autofocus="" type="text">
                  </div>
                </div>-->
                <div class="form-group">
                  <label for="firstName" class="col-sm-3 control-label">Photo</label>
                  <div class="col-sm-3">
                    <input id="pic" name="pic" class="custom-file-input" autofocus="" type="file">
                  </div>
                </div>
                <div class="form-group">
                  <label for="firstName" class="col-sm-3 control-label">Attach Resume</label>
                  <div class="col-sm-3">
                    <input id="pic1" name="pic1" class="custom-file-input" autofocus="" type="file">
                  </div>
                </div>
                <?php if(isset($my_profile)) { ?>
                <div class="form-group col-sm-12 margngh">
                  <div class="col-sm-2">
                    <a href="editprofile" class="btn btn-primary btn-block">Edit Profile</a>
                  </div>
                  <div class="col-sm-3">
                    <?php if(empty($row['publisher'])) { ?>
                    <a href="<?php echo $site_url;?>add_publisher" class="btn btn-primary btn-block">Add Publisher</a>
                    <?php } else { ?>
                    <a href="<?php echo $site_url;?>detailpage?id=<?php echo base64_encode($row['publisher']) ?>" class="btn btn-primary btn-block">View Publisher</a>
                    <?php } ?>
                  </div>
                </div>
                <?php } ?>
              </form>
            </div>
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
<!-- map end -->
<?php include('include/footer.php'); ?>
