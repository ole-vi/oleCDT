

<?php
//@ob_start();
session_start();
$conn=mysqli_connect("localhost","dppms","dfHGf$3987Jgf","dppms_fieldguide");
if($conn){
//echo"connected";

}

include('include/header1.php'); 
//require_once("class/class.admin.php");
//$login = new ADMIN();
include('include/sidebar1.php');

if(isset($_POST['submit']))
{
//echo $oldpassword =md5($_POST['oldpassword']);
$newpassword=$_POST['newpassword'];
$new_password = md5($newpassword);
echo"<br>";
 $repeatnewpassword=$_POST['password'];
 $repeat_newpassword = md5($repeatnewpassword);
 $uemail='admin@gmail.com';
$sql="select * from `tbl_individual_member` where id='".$id."'";
	$query=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($query);
//echo"<br>";
$oldpassworddb= $row['admin_pass'];

if($newpassword==$repeatnewpassword)

{
$sqk="update `tbl_individual_member` SET pass='".$new_password."' where id='".$id."'";
$res=mysqli_query($conn,$sqk);

echo '<script> alert("password  updated successfully")</script>';
}
else{

echo '<script> alert("password dont matched")</script>';

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
                            <a href="myaccount.php">Home</a>
                        </li>
                        <li class="active">Individual Details</li>
                    </ul>
                </div>
                <!-- /Page Breadcrumb -->
                <!-- Page Header -->
                <div class="page-header position-relative page-header-fixed">
                    <div class="header-title">
                        <h1>
                        change your password

                        </h1>
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
                                                    <span class="widget-caption">change your password</span>
													<div class="widget-caption pull-right"><a href="myaccount.php" class="btn btn-link shiny" ><i class="fa fa-plus"></i> Back To Details</a></div>
													<!--<a href="individual-details.php" class="back2">Back To Details Page</a>-->
                                                </div>
                                                <div class="widget-body">
                                                    <div id="registration-form">
                                                        <form id="register-form" role="form"  method="post" >            
                                                            <div class="row">
                                                             <!--<div class="col-sm-6">
                                                                <div class="form-group">
                                                                <label> Enter your old Password</label> 
                                                          <input type="password" class="form-control" placeholder="Name" name="oldpassword">
                                                           <span class="help-block" id="error"></span>																 
																 </div>
																
                                                                </div>-->
                                                                <div class="col-sm-6">
                                                               <div class="form-group">
                                                             <label>Enter your New Password</label> 		
                                                <input type="password" class="form-control" placeholder="enter new password" name="newpassword" required>
                                                                     <span class="help-block" id="error"></span>    
                                                                    </div>
                                                                    
                                                                </div>
																<div class="col-sm-6">
                                                                <div class="form-group">
                                                                 <label> Confirm Password</label>    
												 <input type="password" class="form-control" placeholder="confirm Password" name="password" required>  
												 <span class="help-block" id="error"></span>
																 </div>
																 
                                                                </div>
																
                                                            </div>							
                                                             
                                                                
                                                     
                                                            
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
  yearRange: "-5:+0",
      
You have made no changes to save.
   
     });
</script>	
        <?php include('include/footer.php');  ?>
 

