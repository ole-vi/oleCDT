<?php
@ob_start();
session_start();
include('include/header.php'); 
require_once("class/class.admin.php");
//$login = new ADMIN();
include('include/sidebar.php');

if(isset($_POST['submit']))
{
	
$_SESSION['indv'] = "Please fill All fields";

$name = $_POST['fname'];
$location = implode(',', $_POST['location']);
$education = implode(',', $_POST['education']);
$history = implode(',', $_POST['work_history']);
$hours = $_POST['hours'];
$email = $_POST['email'];
$mob = $_POST['mob'];
$phone = $_POST['phone'];
$phone2 = $_POST['off_phone'];
$phone3 = $_POST['o_phone'];
$skype = $_POST['skype'];
$facebook = $_POST['facebook'];
$street = $_POST['street'];
$city = $_POST['city'];
$state = implode(',', $_POST['state']);
$zip = $_POST['zip'];


$dob1 = $_POST['dob'];
$dob = date('Y-m-d ', strtotime($dob1));
$citizenship = $_POST['citizenship'];
//$lname = $_POST['lname'];
$pass1 = $_POST['password'];
//$pass2 = $_POST['repassword'];
$pass3 = $_POST['password'];
$worktype = implode(',', $_POST['worktype']);

if($_FILES['pic']['tmp_name']!='') 
{

$imgFile = $_FILES['pic']['name'];
$tmp_dir = $_FILES['pic']['tmp_name'];
$imgSize = $_FILES['pic']['size'];	
}
else
{
$imgFile='';	
}

if($_FILES['pic2']['tmp_name']!='') 
{

$imgFile2 = $_FILES['pic2']['name'];
$tmp_dir2 = $_FILES['pic2']['tmp_name'];
$imgSize2 = $_FILES['pic2']['size'];	
}
else
{
$imgFile2='';	
}

/*if(($name=='') or ($location=='') or ($education=='') or ($history=='') or ($hours=='') or ($email=='') or ($mob=='') or ($phone=='') or ($skype=='') or ($facebook=='') or ($street=='') or ($city=='') or ($state=='') or ($zip=='') or ($dob=='') or ($citizenship=='') or ($pass1=='') or ($pass3=='') or ($worktype==''))
	
{
$_SESSION['ind'] = "Please fill All fields";	
//$admin->redirect('add-individual');
	*/
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
                if($admin->adindividual($name,$location,$education,$history,$hours,$email,$mob,$phone,$skype,$facebook,$street,$city,$state,$zip,$dob,$citizenship,$pass3,$worktype,$phone2,$phone3,$imgFile,$tmp_dir,$imgSize,$imgFile2,$tmp_dir2,$imgSize2))
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
                        <h1>
                            Add Individual

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
                                                              <label>Email</label>		
                                                <input type="text" class="form-control" placeholder="E-mail Id" name="email">
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
                                                                 <label>Mobile No</label>    
													 <input type="text" class="form-control" placeholder="Mobile No" name="mob">
													 <span class="help-block" id="error"></span>
																 </div>
																 
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                       <label>Home Phone</label>
                                                       <input type="text" class="form-control" placeholder="Home Phone" name="phone">
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
																</div>
																<div class="row">
																 <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                       <label>Other Phone</label>
                                                       <input type="text" class="form-control" placeholder="Other Phone" name="o_phone">
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
                                                                 <label>Date of Birth</label>    
													 <input id="dateofplay" type="text" class="form-control" placeholder="Date of Birth" name="dob">
													 <span class="help-block" id="error"></span>
																 </div>
																 
                                                                </div>
                                                            </div>
															<div class="row">
                                                             <div class="col-sm-4">
                                                                <div class="form-group">
                                                                 <label>Facebook</label>    
													 <input type="text" class="form-control" placeholder="Facebook" name="facebook">
													 <span class="help-block" id="error"></span>
																 </div>
																 
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                       <label>Education</label>
                                                       <input type="text" class="form-control" placeholder="Education" name="education[]">
                                                                            
                                                                    </div>
                                                                </div>
																<div class="col-sm-4">
                                                                    <div class="form-group">
                                                                       <label>Work History</label>
                                               <input type="text" class="form-control" placeholder="Work History" name="work_history[]">
                                                                            
                                                                    </div>
                                                                </div>
																
                                                            </div>
				<div class="row">
                                                             
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                       <label>Citizenship</label>
                                                       <input type="text" class="form-control" placeholder="Citizenship" name="citizenship">
                                                                            
                                                                    </div>
                                                                </div>
																
																<div class="col-sm-4">
                                                                    <div class="form-group">
                                                                       <label>Attach Resume </label>
                                                       <input type="file" class="form-control"  name="pic">
                                                                            
                                                                    </div>
                                                                </div>
																<div class="col-sm-4">
                                                                    <div class="form-group">
                                                                       <label>Photo </label>
                                                       <input type="file" class="form-control"  name="pic2">
                                                                            
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
    <legend>Possible Volunteer Work</legend>	
<div class="row">

<div class="col-sm-3">
<div class="form-group">
<div class="checkbox">
<label>
<input type="checkbox" class="colored-primary" value="Administrative" name="worktype[]">
<span class="text">Administrative</span>
</label>
</div>
</div>
</div>
<div class="col-sm-3">
<div class="form-group">
<div class="checkbox">
<label>
<input type="checkbox" class="colored-primary" value="Accounting" name="worktype[]">
<span class="text">Accounting</span>
</label>
</div>
</div>
</div>
<div class="col-sm-3">
<div class="form-group">
<div class="checkbox">
<label>
<input type="checkbox" class="colored-primary" value="Canvasing door-to-door" name="worktype[]">
<span class="text">Canvasing door-to-door</span>
</label>
</div>
</div>
</div>
<div class="col-sm-3">
<div class="form-group">
<div class="checkbox">
<label>
<input type="checkbox" class="colored-primary" value="Legal" name="worktype[]">
<span class="text">Legal</span>
</label>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-3">
<div class="form-group">
<div class="checkbox">
<label>
<input type="checkbox" class="colored-primary" value="Legislation" name="worktype[]">
<span class="text">Legislation</span>
</label>
</div>
</div>
</div>
<div class="col-sm-3">
<div class="form-group">
<div class="checkbox">
<label>
<input type="checkbox" class="colored-primary" value="Media" name="worktype[]">
<span class="text">Media</span>
</label>
</div>
</div>
</div>
<div class="col-sm-3">
<div class="form-group">
<div class="checkbox">
<label>
<input type="checkbox" class="colored-primary" value="Phone Bank" name="worktype[]">
<span class="text">Phone Bank</span>
</label>
</div>
</div>
</div>
<div class="col-sm-3">
<div class="form-group">
<div class="checkbox">
<label>
<input type="checkbox" class="colored-primary" value="Web Management" name="worktype[]">
<span class="text">Web Management</span>
</label>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-3">
<div class="form-group">
<div class="checkbox">
<label>
<input type="checkbox" class="colored-primary" value="Writing" name="worktype[]">
<span class="text">Writing</span>
</label>
</div>
</div>
</div>
<div class="col-sm-3">
<div class="form-group">
<div class="checkbox">
<label>
<input type="checkbox" class="colored-primary" value="Fund Raising" name="worktype[]">
<span class="text">Fund Raising</span>
</label>
</div>
</div>
</div>
<div class="col-sm-3">
                                                                <div class="form-group">
                                                                     
													 <input type="text" class="form-control" placeholder="Other" name="w_other">
													 <span class="help-block" id="error"></span>
																 </div>
																 
                                                                </div>
</div>
<div class="row">	
<div class="col-sm-4">
                                                                    <div class="form-group">
                                                                       <label>Possible locations </label>
                                               
											   
											   <select name="location[]" id="e2" multiple="multiple" style="width: 100%;" >
                <option value="Office">Office</option>
                <option value="Online">Online</option>
                <option value="Field">Field</option>
                
             
            </select> 
                                                                            
                                                                    </div>
       </div>
	   <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                       <label>Hours per Week</label>
                                                       <input type="text" class="form-control" placeholder="Hours per Week" name="hours">
                                                                            
                                                                    </div>
                                                                </div>
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
  yearRange: "-5:+0",
      
   
     });
</script>	
        <?php include('include/footer.php');  ?>
 
