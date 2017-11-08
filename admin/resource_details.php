<?php
@ob_start();
session_start();
include('include/header.php'); 
require_once("class/class.admin.php");
//$login = new ADMIN();
include('include/sidebar.php');
$count =1;
$sql = $admin->runQuery("SELECT * FROM `tbl_resources` ORDER BY `id` DESC, `name` ASC");
$sql->execute();
$row = $sql->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- Page Content -->
<div class="page-content">
  <!-- Page Breadcrumb -->
  <div class="page-breadcrumbs breadcrumbs-fixed">
    <ul class="breadcrumb">
      <li>
        <i class="fa fa-home"></i>
        <a href="dashboard">Home</a>
      </li>
      <li class="active"> Resources List</li>
    </ul>
  </div>
  <!-- /Page Breadcrumb -->
  <!-- Page Header -->
  <div class="page-header position-relative page-header-fixed">
    <div class="header-title">
      <h1>Resources List</h1>
      <script type="text/javascript">
      setTimeout(function () {
        $(".alert").fadeOut();
      },4000); // 5 seconds
      </script>
      <span style="color: #B31E18;">
      <?php 
      if(isset($_SESSION['org1']))
      {
        $msg=$_SESSION['org1'];
        echo '<span class="alert alert-success">
        <strong>Note: </strong>'.$msg.'</span>';
        unset($_SESSION['org1']);
      }?>
    </div>
  </div>
  <!-- /Page Header -->
  <!-- Page Body -->
  <div class="page-body">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="row">
          <div class="col-lg-12 col-sm-12 col-xs-12">
            <div class="widget">
              <div class="widget-header ">
                <div class="widget-caption">
                Resources List
                </div>
              </div>
              <div class="widget-body">
                <table class="table table-responsive table-bordered table-hover" id="expandabledatatable">
                  <thead>
                    <tr>
                      <th>
                        S.No
                      </th>
                      <th>
                        Name
                      </th>
                      <th>
                        Last Updated
                      </th>
                      <th>
                        Availability
                      </th>
                      <th  width="20%">
                        Action
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($row as $row) { ?>
                      <tr class="record">
                        <td width="5%">
                          <?php echo $count++; ?>
                        </td>
                        <td width="8%">
                          <?php echo $row['name']; ?>
                        </td>
                        <td width="8%">
                          <?php echo date('d-M-Y',strtotime($row['last_update'])); ?>
                        </td>
                        <td>
                          <?php echo $row['availability']; ?>
                        </td>
                        <td>
                          <a href="edit_resource?id=<?php echo base64_encode($row['id']); ?>" class="btn btn-sm btn-info shiny"><i class="fa fa-edit"></i>Edit</a>
                          <a href="javascript:void(0);" class="btn btn-sm btn-darkorange shiny delete" id="<?php echo $row['id'];?>"><i class="fa fa-trash"></i>Delete</a>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
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

<?php include("include/footer.php"); ?>

<script type="text/javascript">
//delete stream
$(function() {
  $(".delete").click(function(){
    var element = $(this);
    var del_id = element.attr("id");
    var info = 'id=' + del_id;
    if(confirm("Are you sure you want to delete this?"))
    {
      $.ajax({
        type: "POST",
        url: "delete_resource",
        data: info,
        success: function(){
        }
      });
      $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast").animate({ opacity: "hide" }, "slow");
    }
    return false;
  });
});
//edit stream
</script>
