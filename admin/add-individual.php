<?php
@ob_start();
session_start();
include('../include/constants.php');
include('include/header.php'); 
require_once("class/class.admin.php");
//$login = new ADMIN();
include('include/sidebar.php');

if(isset($_POST['submit']))
{
  $_SESSION['indv'] = "Please fill All fields";

  $dt_fname = $_REQUEST['fname'];
  $dt_lname = isset($_REQUEST['l_name']) ? $_REQUEST['l_name'] : '';
  $dt_email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
  $dt_mob = !empty($_REQUEST['mob']) ? $_REQUEST['mob'] : 0;
  $dt_off_phone = !empty($_REQUEST['off_phone']) ? $_REQUEST['off_phone'] : 0;
  $dt_o_phone = !empty($_REQUEST['o_phone']) ? $_REQUEST['o_phone'] : 0;
  $dt_skype = isset($_REQUEST['skype']) ? $_REQUEST['skype'] : '';
  $dt_facebook = isset($_REQUEST['facebook']) ? $_REQUEST['facebook'] : '';
  $dt_street = isset($_REQUEST['street']) ? $_REQUEST['street'] : '';
  $dt_city = isset($_REQUEST['city']) ? $_REQUEST['city'] : '';
  $dt_state = isset($_REQUEST['state']) ? implode('::', $_REQUEST['state']): '';
  $dt_zip = isset($_REQUEST['zip']) ? $_REQUEST['zip'] : '';
  $dt_dob = isset($_REQUEST['dob']) ? date('Y-m-d ', strtotime($_REQUEST['dob'])) : '';
  $dt_citizenship = isset($_REQUEST['citizenship']) ? $_REQUEST['citizenship'] : '';

  $dt_interest1 = isset($_REQUEST['interest1']) ? implode('::', $_REQUEST['interest1']): '';
  $dt_interest2 = isset($_REQUEST['interest2']) ? implode('::', $_REQUEST['interest2']): '';
  $dt_interest3 = isset($_REQUEST['interest3']) ? implode('::', $_REQUEST['interest3']): '';
  $dt_interest4 = isset($_REQUEST['interest4']) ? implode('::', $_REQUEST['interest4']): '';

  $dt_purpose = isset($_REQUEST['purpose']) ? implode('::', $_REQUEST['purpose']): '';

  $dt_pass = $_POST['password'];
  //$pass2 = $_POST['repassword'];

  if($_FILES['pic']['tmp_name']!='') 
  {
    $imgFile = $_FILES['pic']['name'];
    $tmp_dir = $_FILES['pic']['tmp_name'];
    $imgSize = $_FILES['pic']['size'];	
  }
  else
  {
    $imgFile = $tmp_dir = $imgSize = '';
  }

  $stmt = $admin->runQuery("select * from tbl_individual_member where email=:email");
  $stmt->execute(array(':email' => $email));

  //$row=$stmt->fetch(PDO::FETCH_ASSOC);
  $rowcount = $stmt->rowCount();           
  if($rowcount > 0)
  {
    $_SESSION['ind'] = "This Record Already Inserted..";
    //$admin->redirect('dashboard');
  }
  else
  {
    if($admin->adindividual($dt_fname, $dt_lname, $dt_email, $dt_pass, $dt_mob, $dt_off_phone, $dt_o_phone, $dt_skype, $dt_facebook, $dt_street, $dt_city, $dt_state, $dt_zip, $dt_dob, $dt_citizenship, $dt_interest1, $dt_interest2, $dt_interest3, $dt_interest4, $dt_purpose, $imgFile, $tmp_dir, $imgSize))
    {
      $_SESSION['indv'] = "Record Inserted Successfully";
      header("location:individual-details");
    }
  }
}
?>
<!--Basic Scripts-->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/beyond.js"></script>

<!--Beyond Scripts-->
<script src="assets/js/select2/select2.js"></script>
<script src="assets/js/datatable/jquery.dataTables.min.js"></script>

<script src="assets/js/datatable/dataTables.bootstrap.min.js"></script>
<script src="assets/js/datatable/datatables-init.js"></script>

<!-- Page Content -->
<div class="page-content">
  <!-- Page Breadcrumb -->
  <div class="page-breadcrumbs breadcrumbs-fixed">
    <ul class="breadcrumb">
      <li>
        <i class="fa fa-home"></i>
        <a href="dashboard">Home</a>
      </li>
      <li class="active">Individual Details</li>
    </ul>
  </div>
  <!-- /Page Breadcrumb -->
  <!-- Page Header -->
  <div class="page-header position-relative page-header-fixed">
    <div class="header-title">
      <h1>Add Individual</h1>
      <script type="text/javascript">
      setTimeout(function () {
        $(".alert").fadeOut();
      },4000); // 5 seconds
      </script>
      <span style="color: #B31E18;">
      <?php
      if(isset($_SESSION['ind']))
      {
        $msg=$_SESSION['ind'];
        echo '<span class="alert alert-success">
        <strong>Note: </strong>'.$msg.'</span>';
        unset($_SESSION['ind']);
      }?>
    </div>
  </div>
  <!-- /Page Header -->
  <!-- Page Body -->
  <div class="page-body">
    <div class="row">
      <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="row">
        <!-- desig-->
          <div class="col-lg-12 col-sm-12 col-xs-12">
            <div class="widget flat radius-bordered">
              <div class="widget-header bg-blue">
                <span class="widget-caption">Add Individual</span>
                <div class="widget-caption pull-right"><a href="individual-details" class="btn btn-link shiny" ><i class="fa fa-plus"></i> Back To Details</a></div>
                <!--<a href="individual-details" class="back2">Back To Details Page</a>-->
              </div>
              <div class="widget-body">
                <div id="registration-form">
                  <form id="register-form" role="form" action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Name</label>
                          <input type="text" class="form-control" placeholder="Name" name="fname">
                          <span class="help-block" id="error"></span>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Username</label>
                          <input type="text" class="form-control" placeholder="Username" name="l_name">
                          <span class="help-block" id="error"></span>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Password</label>
                          <input type="password" class="form-control" placeholder="Password" name="password">
                          <span class="help-block" id="error"></span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Email</label>
                          <input type="text" class="form-control" placeholder="E-mail Id" name="email">
                          <span class="help-block" id="error"></span>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Skype</label>
                          <input type="text" class="form-control" placeholder="Skype" name="skype">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Facebook</label>
                          <input type="text" class="form-control" placeholder="Facebook" name="facebook">
                          <span class="help-block" id="error"></span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Mobile No</label>
                          <input type="text" class="form-control" placeholder="Mobile No" name="mob">
                          <span class="help-block" id="error"></span>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Office Phone</label>
                          <input type="text" class="form-control" placeholder="Office Phone" name="off_phone">
                          <span class="help-block" id="error"></span>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Other Phone</label>
                          <input type="text" class="form-control" placeholder="Other Phone" name="o_phone">
                          <span class="help-block" id="error"></span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Date of Birth</label>
                          <input id="dateofplay" type="text" class="form-control" placeholder="Date of Birth" name="dob">
                          <span class="help-block" id="error"></span>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Citizenship</label>
                          <input type="text" class="form-control" placeholder="Citizenship" name="citizenship">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Photo </label>
                          <input type="file" class="form-control"  name="pic">
                        </div>
                      </div>
                    </div>
                    <fieldset>
                      <legend>Address</legend>
                      <div class="row">
                        <div class="col-sm-3">
                          <div class="form-group">
                            <label>Street</label>
                            <input type="text" class="form-control" placeholder="Street" name="street">
                            <span class="help-block" id="error"></span>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="form-group">
                            <label>City</label>
                            <input type="text" class="form-control" placeholder="City" name="city">
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="form-group">
                            <label>Zip</label>
                            <input type="text" class="form-control" placeholder="Zip" name="zip">
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="form-group">
                            <label>Country</label>
                            <select name="state[]" id="e1" multiple="multiple" style="width: 100%;" >
                              <option value="Alaska">Alaska</option>
                              <option value="Alabama">Alabama</option>
                              <option value="Arizona">Arizona</option>
                              <option value="Arkansas">Arkansas</option>
                              <option value="California">California</option>
                              <option value="Colorado">Colorado</option>
                              <option value="Connecticut">Connecticut</option>
                              <option value="Delaware">Delaware</option>
                              <option value="Florida">Florida</option>
                              <option value="Georgia">Georgia</option>
                              <option value="Hawaii">Hawaii</option>
                              <option value="Idaho">Idaho</option>
                              <option value="Illinois">Illinois</option>
                              <option value="Indiana">Indiana</option>
                              <option value="Iowa">Iowa</option>
                              <option value="Kansas">Kansas</option>
                              <option value="Kentucky">Kentucky</option>
                              <option value="Louisiana">Louisiana</option>
                              <option value="Maine">Maine</option>
                              <option value="Maryland">Maryland</option>
                              <option value="Massachusetts">Massachusetts</option>
                              <option value="Michigan">Michigan</option>
                              <option value="Minnesota">Minnesota</option>
                              <option value="Mississippi">Mississippi</option>
                              <option value="Missouri">Missouri</option>
                              <option value="Montana">Montana</option>
                              <option value="Nebraska">Nebraska</option>
                              <option value="Nevada">Nevada</option>
                              <option value="New Hampshire">New Hampshire</option>
                              <option value="New Jersey">New Jersey</option>
                              <option value="New Mexico">New Mexico</option>
                              <option value="New York">New York</option>
                              <option value="North Carolina">North Carolina</option>
                              <option value="North Dakota">North Dakota</option>
                              <option value="Ohio">Ohio</option>
                              <option value="Oklahoma">Oklahoma</option>
                              <option value="Oregon">Oregon</option>
                              <option value="Pennsylvania">Pennsylvania</option>
                              <option value="Rhode Island">Rhode Island</option>
                              <option value="South Carolina">South Carolina</option>
                              <option value="South Dakota">South Dakota</option>
                              <option value="Tennessee">Tennessee</option>
                              <option value="Texas">Texas</option>
                              <option value="Utah">Utah</option>
                              <option value="Vermont">Vermont</option>
                              <option value="Virginia">Virginia</option>
                              <option value="Washington">Washington</option>
                              <option value="West Virginia">West Virginia</option>
                              <option value="Wisconsin">Wisconsin</option>
                              <option value="Wyoming">Wyoming</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </fieldset>
                    <fieldset>
                      <legend>Interests</legend>
                      <div class="row">
                        <?php foreach($pub_filter_lbl as $filter_type => $filter_lbl) {
                        foreach($filter_lbl as $lbl) { ?>
                          <div class="col-sm-3">
                            <div class="form-group">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" class="colored-primary" value="<?php echo $lbl; ?>" name="<?php echo $filter_type.'[]'; ?>">
                                  <span class="text"><?php echo $lbl; ?></span>
                                </label>
                              </div>
                            </div>
                          </div>
                        <?php }
                        } ?>
                      </div>
                    </fieldset>
                    <fieldset>
                      <legend>Purposes</legend>
                      <div class="row">
                        <?php foreach($member_purpose as $purpose) { ?>
                          <div class="col-sm-3">
                            <div class="form-group">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" class="colored-primary" value="<?php echo $purpose; ?>" name="purpose[]">
                                  <span class="text"><?php echo $purpose; ?></span>
                                </label>
                              </div>
                            </div>
                          </div>
                        <?php } ?>
                      </div>
                    </fieldset>
                    <button type="submit" class="btn btn-info shiny" name="submit">Submit</button>
                    <!--<button  class="btn btn-info shiny">Save Draft</button>-->
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /Page Body -->
</div>
<!-- /Page Content -->

<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/reg_ind.js"></script>
<script>
//--Jquery Select2--
$("#e1").select2({
  placeholder: "Select United States ",
  allowClear: true
});
$("#e2").select2({
  placeholder: "Select Locations",
  allowClear: true
});
</script>

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
<?php include('include/footer.php'); ?>
