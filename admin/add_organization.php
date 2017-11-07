<?php
ob_start();
session_start();
include('../include/constants.php');
include('include/header.php'); 
require_once("class/class.admin.php");
//$login = new ADMIN();
include('include/sidebar.php');
//$_SESSION['org'] = "This Record Already Inserted";
if(isset($_POST['submit']))
{
  $dt_name = $_REQUEST['name'];
  $dt_web = isset($_REQUEST['web']) ? $_REQUEST['web'] : '';
  $dt_mission = isset($_REQUEST['mission']) ? $_REQUEST['mission'] : '';
  $dt_m_info = isset($_REQUEST['m_info']) ? $_REQUEST['m_info'] : '';
  $dt_c_name = isset($_REQUEST['c_name']) ? $_REQUEST['c_name'] : '';
  $dt_c_email = isset($_REQUEST['c_email']) ? $_REQUEST['c_email'] : '';
  $dt_c_phone = isset($_REQUEST['c_phone']) ? $_REQUEST['c_phone'] : '';
  $dt_c_url = isset($_REQUEST['c_url']) ? $_REQUEST['c_url'] : '';
  $dt_c_address = isset($_REQUEST['c_address']) ? $_REQUEST['c_address'] : '';
  $dt_o_name = isset($_REQUEST['o_name']) ? $_REQUEST['o_name'] : '';
  $dt_o_address = isset($_REQUEST['o_address']) ? $_REQUEST['o_address'] : '';
  $dt_o_phone = isset($_REQUEST['o_phone']) ? $_REQUEST['o_phone'] : '';
  $dt_o_email = isset($_REQUEST['o_email']) ? $_REQUEST['o_email'] : '';
  $dt_o_skype = isset($_REQUEST['o_skype']) ? $_REQUEST['o_skype'] : '';
  $dt_o_other = isset($_REQUEST['o_other']) ? $_REQUEST['o_other'] : '';
  $dt_grade = isset($_REQUEST['grade']) ? implode('::', $_REQUEST['grade']): '';
  $dt_subject = isset($_REQUEST['subject']) ? implode('::', $_REQUEST['subject']): '';
  $dt_format = isset($_REQUEST['format']) ? implode('::', $_REQUEST['format']): '';
  $dt_distribution = isset($_REQUEST['distribution']) ? implode('::', $_REQUEST['distribution']): '';
  $dt_license = isset($_REQUEST['license']) ? implode('::', $_REQUEST['license']): '';
  $dt_language = isset($_REQUEST['language']) ? implode('::', $_REQUEST['language']): '';
  $dt_msa = isset($_REQUEST['msa']) ? implode('::', $_REQUEST['msa']): '';
  $dt_wcag = isset($_REQUEST['wcag']) ? implode('::', $_REQUEST['wcag']): '';
  $dt_pub_available = isset($_REQUEST['pub_available']) ? implode('::', $_REQUEST['pub_available']): '';
  $dt_curriculum = isset($_REQUEST['curriculum']) ? $_REQUEST['curriculum'] : '';
  $dt_edu_usage = isset($_REQUEST['edu_usage']) ? $_REQUEST['edu_usage'] : '';
  $dt_edu_content = isset($_REQUEST['edu_content']) ? implode('::', $_REQUEST['edu_content']): '';
  $dt_assessment = isset($_REQUEST['assessment']) ? implode('::', $_REQUEST['assessment']): '';
  $dt_content_usage = isset($_REQUEST['content_usage']) ? $_REQUEST['content_usage'] : '';
  $dt_content_other = isset($_REQUEST['content_other']) ? $_REQUEST['content_other'] : '';
  $dt_content_quality = isset($_REQUEST['content_quality']) ? $_REQUEST['content_quality'] : '';

  $dt_interest1 = isset($_REQUEST['interest1']) ? implode('::', $_REQUEST['interest1']): '';
  $dt_interest2 = isset($_REQUEST['interest2']) ? implode('::', $_REQUEST['interest2']): '';
  $dt_interest3 = isset($_REQUEST['interest3']) ? implode('::', $_REQUEST['interest3']): '';
  $dt_interest4 = isset($_REQUEST['interest4']) ? implode('::', $_REQUEST['interest4']): '';

  $status= 'Active';
  $date = date("Y-m-d");

  $imgFile = $_FILES['pic']['name'];
  $tmp_dir = $_FILES['pic']['tmp_name'];
  $imgSize = $_FILES['pic']['size'];

  $stmt = $admin->runQuery("select * from tbl_publisher where c_email=:c_email");
  $stmt->execute(array(':c_email' => $dt_c_email));

  //$row=$stmt->fetch(PDO::FETCH_ASSOC);
  $rowcount = $stmt->rowCount();

  if($rowcount > 0)
  {
    $_SESSION['org'] = "This Record Already Inserted";
    // $admin->redirect('add_organization');
  }
  else
  {
    if($admin->adorg($dt_name, $dt_web, $dt_mission, $dt_m_info, $dt_c_name, $dt_c_email, $dt_c_phone, $dt_c_url, $dt_c_address, $dt_o_name, $dt_o_address, $dt_o_phone, $dt_o_email, $dt_o_skype, $dt_o_other, $dt_grade, $dt_subject, $dt_format, $dt_distribution, $dt_license, $dt_language, $dt_msa, $dt_wcag, $dt_pub_available, $dt_curriculum, $dt_edu_usage, $dt_edu_content, $dt_assessment, $dt_content_usage, $dt_content_other, $dt_content_quality, $dt_interest1, $dt_interest2, $dt_interest3, $dt_interest4, $imgFile, $tmp_dir, $imgSize))
    {
      $_SESSION['org1'] = 'Record Inserted Successfully';
      header("location:org_details");
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
      <li class="active">Add Publisher</li>
    </ul>
  </div>
  <!-- /Page Breadcrumb -->
  <!-- Page Header -->
  <div class="page-header position-relative page-header-fixed">
    <div class="header-title">
      <h1>Add Publisher</h1>
      <script type="text/javascript">
      setTimeout(function () {
      $(".alert").fadeOut();
      },4000); // 5 seconds
      </script>
      <span style="color: #B31E18;">
      <?php
      if(isset($_SESSION['org']))
      {
        $msg=$_SESSION['org'];
        echo '<span class="alert alert-success">
        <strong>Note: </strong>'.$msg.'</span>';
        unset($_SESSION['org']);
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
                <span class="widget-caption">Add Publisher</span>
                <div class="widget-caption pull-right"><a href="org_details" class="btn btn-link shiny" ><i class="fa fa-plus"></i> Back To Details</a></div>
              </div>
              <div class="widget-body">
                <div id="registration-form">
                  <form id="register-form" role="form" action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Name</label>
                          <input type="text" class="form-control" placeholder="Name" name="name" required>
                          <span class="help-block" id="error"></span>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Websites (Links)</label>
                          <input type="text" class="form-control" placeholder="Link" name="web">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Address</label>
                          <input type="text" class="form-control" placeholder="Address" name="c_address">
                          <span class="help-block" id="error"></span>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Email</label>
                          <input type="text" class="form-control" placeholder="E-mail Id" name="c_email" required>
                          <span class="help-block" id="error"></span>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Phone No</label>
                          <input type="text" class="form-control" placeholder="Phone No" name="c_phone">
                          <span class="help-block" id="error"></span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Mission</label>
                          <textarea type="textarea" class="form-control" placeholder="Mission" name="mission"></textarea>
                          <span class="help-block" id="error"></span>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>About</label>
                          <textarea type="textarea" class="form-control" placeholder="More information" name="m_info"></textarea>
                          <span class="help-block" id="error"></span>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Logo</label>
                          <input type="file" class="form-control"  name="pic" required>
                        </div>
                      </div>
                    </div>

                    <fieldset>
                      <legend>Publisher Editor</legend>
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="Name" name="o_name">
                            <span class="help-block" id="error"></span>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control" placeholder="Address" name="o_address">
                            <span class="help-block" id="error"></span>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Phone No</label>
                            <input type="text" class="form-control" placeholder="Phone No" name="o_phone">
                            <span class="help-block" id="error"></span>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" placeholder="E-mail Id" name="o_email">
                            <span class="help-block" id="error"></span>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Skype</label>
                            <input type="text" class="form-control" placeholder="Skype" name="o_skype">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Other</label>
                            <input type="text" class="form-control" placeholder="Other No" name="o_other">
                            <span class="help-block" id="error"></span>
                          </div>
                        </div>
                      </div>
                    </fieldset>
                    <fieldset>
                      <legend>Interests</legend>
                      <div class="row">
                        <?php foreach($pub_filter_lbl as $filter_type => $filter_lbl) {
                          foreach($filter_lbl as $lbl) {
                            echo '<div class="col-sm-3">
                              <div class="form-group">
                                <div class="checkbox">
                                  <label>
                                    <input type="checkbox" class="colored-primary" value="'.$lbl.'" name="'.$filter_type.'[]">
                                    <span class="text">'.$lbl.'</span>
                                  </label>
                                </div>
                              </div>
                            </div>';
                          }
                        } ?>
                      </div>
                    </fieldset>

                    <button type="submit" class="btn btn-info shiny" name="submit">Submit</button>
                    <!--<button type="reset" class="btn btn-info shiny">Save Draft</button>-->

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
<?php include('include/footer.php'); ?>
