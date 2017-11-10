<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
ob_start();
session_start();
include('../include/constants.php');
include('include/header.php'); 
require_once("class/class.admin.php");
//$login = new ADMIN();
include('include/sidebar.php');

$id=base64_decode($_REQUEST['id']);

$stmt = $admin->runQuery("select * from `tbl_resources` where `id`=:id");
$stmt->execute(array(':id' => $id));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$publishers = $admin->pub_list();

if(isset($_POST['submit']))
{
  $dt_name = $_REQUEST['name'];
  $dt_mem_id = isset($_REQUEST['mem_id']) ? $_REQUEST['mem_id'] : '';
  $dt_pub_id = isset($_REQUEST['pub_id']) ? $_REQUEST['pub_id'] : '';
  $dt_pub_date = isset($_REQUEST['pub_date']) ? $_REQUEST['pub_date'] : '';
  $dt_a_fname = isset($_REQUEST['a_fname']) ? $_REQUEST['a_fname'] : '';
  $dt_a_lname = isset($_REQUEST['a_lname']) ? $_REQUEST['a_lname'] : '';
  $dt_url = isset($_REQUEST['url']) ? $_REQUEST['url'] : '';
  $dt_description = isset($_REQUEST['description']) ? $_REQUEST['description'] : '';
  $dt_availability = isset($_REQUEST['availability']) ? $_REQUEST['availability'] : '';

  $dt_interest1 = isset($_REQUEST['interest1']) ? implode('::', $_REQUEST['interest1']): '';
  $dt_interest2 = isset($_REQUEST['interest2']) ? implode('::', $_REQUEST['interest2']): '';
  $dt_interest3 = isset($_REQUEST['interest3']) ? implode('::', $_REQUEST['interest3']): '';
  $dt_interest4 = isset($_REQUEST['interest4']) ? implode('::', $_REQUEST['interest4']): '';

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

  if($admin->editresource($id, $dt_name, $dt_mem_id, $dt_pub_id, $dt_pub_date, $dt_a_fname, $dt_a_lname, $dt_url, $dt_description, $dt_availability, $dt_interest1, $dt_interest2, $dt_interest3, $dt_interest4, $imgFile, $tmp_dir, $imgSize))
  {
    $_SESSION['org1'] = "Record Updated Successfully";
    header("location:resource_details");
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
      <li class="active">Edit Resource</li>
    </ul>
  </div>
  <!-- /Page Breadcrumb -->
  <!-- Page Header -->
  <div class="page-header position-relative page-header-fixed">
    <div class="header-title">
      <h1>Edit Resource</h1>
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
                <span class="widget-caption">Edit Resource</span>
              </div>
              <div class="widget-body">
                <div id="registration-form">
                  <form id="register-form" role="form" action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Name</label>
                          <input type="text" class="form-control" value="<?php echo $row['name'];?>" placeholder="Name" name="name" required>
                          <span class="help-block" id="error"></span>
                        </div>
                      </div>
                      <div class="col-sm-2">
                        <div class="form-group">
                          <label>Availability</label><br/>
                          <select data-placeholder="Availability" class="chosen-select" name="availability">
                            <option value="Yes" <?php if($row['availability'] == 'Yes') echo 'selected' ?> >Yes</option>
                            <option value="No" <?php if($row['availability'] == 'No') echo 'selected' ?> >No</option>
                          </select>
                          <span class="help-block" id="error"></span>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                        <label>URL</label>
                          <input type="text" class="form-control" placeholder="URL" name="url" value="<?php echo $row['url'];?>">
                          <label>Address</label>
                          <span class="help-block" id="error"></span>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Publication Title</label><br/>
                          <select data-placeholder="Publisher" class="chosen-select" name="pub_id">
                          <?php foreach($publishers as $publisher){ ?>
                            <option value="<?php echo $publisher['pub_id']; ?>" <?php if($row['pub_id'] == $publisher['pub_id']) echo 'selected' ?> ><?php echo $publisher['name'] ?></option>
                          <?php } ?>
                          </select>
                          <input type="hidden" name="mem_id" value="<?php echo $row['mem_id'];?>">
                        </div>
                      </div>
                      <div class="col-sm-2">
                        <div class="form-group">
                          <label>Publication Date</label>
                          <input type="text" class="form-control" placeholder="Publication Date" name="pub_date" value="<?php echo $row['pub_date'];?>">
                          <span class="help-block" id="error"></span>
                        </div>
                      </div>
                      
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Upload Publication</label>
                          <input type="file" class="form-control" name="publication">
                        </div>
                      </div>
                    </div>

                    <fieldset>
                      <legend>Author</legend>
                      <div class="row">
                      <div class="col-sm-4">
                          <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" placeholder="First Name" name="a_fname" value="<?php echo $row['a_fname'];?>">
                            <span class="help-block" id="error"></span>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" placeholder="Last Name" name="a_lname" value="<?php echo $row['a_lname'];?>">
                            <span class="help-block" id="error"></span>
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

                    <button type="submit" class="btn btn-info shiny" name="submit">Update</button>

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
$("#e3").select2({
  placeholder: "Select volunteers ",
  allowClear: true
});
</script>

<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/themes/cupertino/jquery-ui.css">

<?php include('include/footer.php'); ?>
