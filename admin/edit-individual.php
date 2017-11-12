<?php
@ob_start();
session_start();
include('../include/constants.php');
include('include/header.php');
require_once("class/class.admin.php");
//$login = new ADMIN();
include('include/sidebar.php');

$id = base64_decode($_REQUEST['id']);
if(isset($_POST['submit']))
{
  $dt_fname = $_REQUEST['fname'];
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

  if($_FILES['pic']['tmp_name'] != '')
  {
    $imgFile = $_FILES['pic']['name'];
    $tmp_dir = $_FILES['pic']['tmp_name'];
    $imgSize = $_FILES['pic']['size'];
  }
  else
  {
    $imgFile = $tmp_dir = $imgSize = '';
  }

  if($admin->editindividual($id, $dt_fname, $dt_email, $dt_mob, $dt_off_phone, $dt_o_phone, $dt_skype, $dt_facebook, $dt_street, $dt_city, $dt_state, $dt_zip, $dt_dob, $dt_citizenship, $dt_interest1, $dt_interest2, $dt_interest3, $dt_interest4, $dt_purpose, $imgFile, $tmp_dir, $imgSize))
  {
    $_SESSION['indv'] = "Record Updated Successfully";
    header("location:individual-details");
  }
}

$stmt = $admin->runQuery("select * from tbl_individual_member where id=:id");
$stmt->execute(array(':id' => $id));
$row=$stmt->fetch(PDO::FETCH_ASSOC);

$state1 = array('Alaska','Alabama','Arizona','Arkansas','California','Colorado','Connecticut','Delaware','Florida','Georgia','Hawaii','Idaho','Illinois','Indiana','Iowa','Kansas','Kentucky','Louisiana','Maine','Maryland','Massachusetts','Michigan','Minnesota','Mississippi','Missouri','Montana','Nebraska','Nevada','New Hampshire','New Jersey','New Mexico','New York','North Carolina','North Dakota','Ohio','Oklahoma','Oregon','Pennsylvania','Rhode Island','South Carolina','South Dakota','Tennessee','Texas','Utah','Vermont','Virginia','Washington','West Virginia','Wisconsin','Wyoming');

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
      <li class="active">Edit Individual</li>
    </ul>
  </div>
  <!-- /Page Breadcrumb -->
  <!-- Page Header -->
  <div class="page-header position-relative page-header-fixed">
    <div class="header-title">
      <h1>Edit Individual</h1>
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
                <span class="widget-caption">Edit Individual</span>
              </div>
              <div class="widget-body">
                <div id="registration-form">
                  <form id="register-form" role="form" action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Name</label>
                          <input type="text" class="form-control" value="<?php echo $row['fname'];?>" placeholder="Name" name="fname">
                          <span class="help-block" id="error"></span>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Username</label>
                          <input type="text" class="form-control" value="<?php echo $row['l_name'];?>" placeholder="Username" name="l_name" disabled>
                          <span class="help-block" id="error"></span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Email</label>
                          <input type="text" value="<?php echo $row['email'];?>" class="form-control" placeholder="E-mail Id" name="email">
                          <span class="help-block" id="error"></span>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Skype</label>
                          <input type="text" class="form-control" placeholder="Skype" value="<?php echo $row['skype'];?>" name="skype">
                          <span class="help-block" id="error"></span>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Facebook</label>
                          <input type="text" class="form-control" value="<?php echo $row['facebook'];?>" placeholder="Facebook" name="facebook">
                          <span class="help-block" id="error"></span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Mobile phone</label>
                          <input type="text" class="form-control" placeholder="Mobile phone" value="<?php echo $row['mob'];?>" name="mob">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Office phone</label>
                          <input type="text" class="form-control" placeholder="Office phone" value="<?php echo $row['off_phone'];?>" name="off_phone">
                          <span class="help-block" id="error"></span>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Other phone</label>
                          <input type="text" class="form-control" placeholder="Other phone" value="<?php echo $row['o_phone'];?>" name="o_phone">
                          <span class="help-block" id="error"></span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Birth Date</label>
                          <input id="dateofplay" type="text" class="form-control" placeholder="Birth Date" value="<?php echo $row['dob'];?>" name="dob">
                          <span class="help-block" id="error"></span>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Citizenship</label>
                          <input type="text" class="form-control" placeholder="Citizenship" value="<?php echo $row['citizenship'];?>" name="citizenship">
                          <span class="help-block" id="error"></span>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Photo </label>
                          <input type="file" class="form-control" name="pic">
                        </div>
                      </div>
                    </div>
                    <fieldset>
                      <legend>Address</legend>
                      <div class="row">
                        <div class="col-sm-3">
                          <div class="form-group">
                            <label>Street</label>
                            <input type="text" class="form-control" value="<?php echo $row['street'];?>" placeholder="Street" name="street">
                            <span class="help-block" id="error"></span>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="form-group">
                            <label>City</label>
                            <input type="text" class="form-control" value="<?php echo $row['city'];?>" placeholder="City" name="city">
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="form-group">
                            <label>Zip</label>
                            <input type="text" value="<?php echo $row['zip'];?>" class="form-control" placeholder="Zip" name="zip">
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="form-group">
                            <label>State</label>
                            <select name="state[]" id="e1" multiple="multiple" style="width: 100%;" >
                              <?php $state = explode('::', $row['state']); foreach($state1 as $state1){
                              if(in_array($state1,$state))
                              {
                              ?>
                                <option value="<?php echo $state1; ?>" selected><?php echo ucfirst($state1); ?></option>
                              <?php }
                              else { ?>
                                <option value="<?php echo $state1; ?>"><?php echo ucfirst($state1); ?></option>
                              <?php }} ?>
                            </select>
                          </div>
                        </div>
                      </div>
                    </fieldset>
                    <fieldset>
                      <legend>Interests</legend>
                      <div class="row">
                        <?php foreach($pub_filter_lbl as $filter_type => $filter_lbl) {
                          $str = explode('::', $row[$filter_type]);
                          foreach($filter_lbl as $lbl) {
                            echo '<div class="col-sm-3">
                            <div class="form-group">
                            <div class="checkbox">
                            <label>';
                              if(in_array($lbl, $str)) {
                                echo '<input type="checkbox" class="colored-primary" checked value="'.$lbl.'" name="'.$filter_type.'[]">';
                              } else {
                                echo '<input type="checkbox" class="colored-primary" value="'.$lbl.'" name="'.$filter_type.'[]">';
                              }
                              echo '<span class="text">'.$lbl.'</span>
                            </label>
                            </div>
                            </div>
                            </div>';
                          }
                        } ?>
                      </div>
                    </fieldset>
                    <fieldset>
                      <legend>Purposes</legend>
                      <div class="row">
                        <?php $str = explode('::', $row['purpose']);
                        foreach($member_purpose as $purpose) {
                          echo '<div class="col-sm-3">
                          <div class="form-group">
                          <div class="checkbox">
                          <label>';
                            if(in_array($purpose, $str)) {
                              echo '<input type="checkbox" class="colored-primary" checked value="'.$purpose.'" name="purpose[]">';
                            } else {
                              echo '<input type="checkbox" class="colored-primary" value="'.$purpose.'" name="purpose[]">';
                            }
                            echo '<span class="text">'.$purpose.'</span>
                          </label>
                          </div>
                          </div>
                          </div>';
                        } ?>
                      </div>
                    </fieldset>

                    <button type="submit" class="btn btn-info shiny" name="submit">Update</button>
                    <!--<button type="reset" class="btn btn-danger shiny">Cancel</button>-->
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
  placeholder: "Select State",
  allowClear: true
});
$("#e2").select2({
  placeholder: "Select Location",
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
