<?php
@ob_start();
session_start();
include('include/header.php'); 
require_once("class/class.admin.php");
include('include/sidebar.php');
$count =1;
$sql = $admin->runQuery("SELECT * FROM `tbl_individual_member` where `status`='Active' ORDER BY `id` DESC");
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
                        <li class="active">Individual Members Details</li>
                    </ul>
                </div>
                <!-- /Page Breadcrumb -->
                <!-- Page Header -->
                <div class="page-header position-relative page-header-fixed">
                    <div class="header-title">
                        <h1>
                            Individual Members Details

                        </h1>
						<script type="text/javascript">
								setTimeout(function () {
								$(".alert").fadeOut();
								},4000); // 5 seconds

							  </script>
							 <span style="color: #B31E18;">
							 <?php 
					
					if(isset($_SESSION['indv']))
					{
						$msg=$_SESSION['indv'];
						echo '<span class="alert alert-success">
						<strong>Note: </strong>'.$msg.'</span>';
						unset($_SESSION['indv']);
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
                                  Individual Members Details</div>
                                    <!--<div class="widget-caption pull-right"><a class="btn btn-link shiny" data-toggle="modal" data-target="#stream" data-keyboard="false" data-backdrop="static" rel=""><i class="fa fa-plus"></i> Add Subject</a></div>-->
                                    
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
                                                Email
                                            </th>
											<th>
                                                Mobile No
                                            </th>
											<th>
                                                Education
                                            </th>
											<th>
											Status
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
											<td>
                                                <?php echo $row['email']; ?>
                                            </td>
											<td width="8%">
                                                <?php echo $row['mob'];?>
												
                                            </td>
											<td width="5%">
                                                <?php echo $row['education']; ?> 
                                            </td>
											<td>
											 <a href="javascript:void(0);"  class="btn btn-sm btn-warning shiny hides" id="<?php echo $row['id'];?>"><i class="fa fa-warning right"></i>Hide</a>
											
											</td>
                                            
											<td>
                                            
       <a href="edit-individual?id=<?php echo base64_encode($row['id']); ?>" class="btn btn-sm btn-info shiny editvoucher"><i class="fa fa-edit"></i>Edit</a>
	 <a href="javascript:void(0);" class="btn btn-sm btn-darkorange shiny delete" id="<?php echo $row['id'];?>"><i class="fa fa-trash"></i>Delete </a>
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
   url: "delete-individual",
   data: info,
   success: function(){
 }
});
 $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
.animate({ opacity: "hide" }, "slow");
}
return false;
});
});

//edit stream
</script>
<script type="text/javascript">
    //delete stream
$(function() {
$(".hides").click(function(){
var element = $(this);
var id = element.attr("id");
var info = 'id=' + id;
if(confirm("Are you sure you want to Hide this?"))
{
 $.ajax({
   type: "POST",
   url: "hide-individual",
   data: info,
   success: function(){
 }
});
 $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
.animate({ opacity: "hide" }, "slow");
}
return false;
});
});

//edit stream
</script>



