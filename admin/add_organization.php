<?php
ob_start();
session_start();
include('include/header.php'); 
require_once("class/class.admin.php");
//$login = new ADMIN();
include('include/sidebar.php');
//$_SESSION['org'] = "This Record Already Inserted";
if(isset($_POST['submit']))
{

 $name = $_REQUEST['name'];
$web = $_REQUEST['link'];
$year = $_REQUEST['year'];
@$tax = $_REQUEST['tax'];
$lstatus = $_REQUEST['status'];
@$location = implode(',',$_REQUEST['location']);

$l_other = $_REQUEST['l_other'];
$mission = implode(',', $_REQUEST['mission']);
$priorities = implode(',', $_REQUEST['prioritie']);
//$action = $_REQUEST['action'];
$achievements = implode(',', $_REQUEST['achievements']);
$org = implode(',', $_REQUEST['org']);
$m_info = implode(',', $_REQUEST['m_info']);
//$state = $_REQUEST['state'];
@$state1 = implode(',',$_REQUEST['state']);

//$Volunteers = implode(',',$_REQUEST['Volunteers']);
//$budget = $_REQUEST['budget'];
//$c_name = $_REQUEST['c_name'];
//$address = $_REQUEST['address'];
$phone = $_REQUEST['phone'];
$email = $_REQUEST['email'];
$skype = $_REQUEST['skype'];
//$c_other = $_REQUEST['c_other'];
$e_name = $_REQUEST['e_name'];
$e_address = $_REQUEST['e_address'];
$e_phone = $_REQUEST['e_phone'];
$e_email = $_REQUEST['e_email'];
$e_skype = $_REQUEST['e_skype'];
$e_other = $_REQUEST['e_other'];
$w_other = $_REQUEST['w_other'];
//$confirm = $_REQUEST['confirm'];
 $w_other = $_REQUEST['w_other'];
@$seeking = implode(',', $_REQUEST['seeking']);
@$w_type = implode(',', $_REQUEST['worktype']);

@$strategie = implode(',', $_REQUEST['strategies']);
$imgFile = $_FILES['pic']['name'];
$tmp_dir = $_FILES['pic']['tmp_name'];
$imgSize = $_FILES['pic']['size'];	

 $stmt = $admin->runQuery("select * from pro_democracy where email=:email");
            $stmt->execute(array(':email' => $email));
			
            //$row=$stmt->fetch(PDO::FETCH_ASSOC);
            $rowcount = $stmt->rowCount();           
         
		   if($rowcount > 0)
            {
               
              $_SESSION['org'] = "This Record Already Inserted";
              // $admin->redirect('add_organization');
                
            }
            else
            {
                if($admin->adorg($name,$web,$year,$tax,$lstatus,$location,$mission,$priorities,$achievements,$org,$m_info,$email,$phone,$skype,$e_name,$e_address,$e_phone,$e_email,$e_skype,$e_other,$seeking,$strategie,$state1,$w_type,$w_other,$imgFile,$tmp_dir,$imgSize))
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
                        <li class="active">Add Organization</li>
                    </ul>
                </div>
                <!-- /Page Breadcrumb -->
                <!-- Page Header -->
                <div class="page-header position-relative page-header-fixed">
                    <div class="header-title">
                        <h1>
                            Add Organization

                        </h1>
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
                                                    <span class="widget-caption">Add Organization</span>
													
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
                                                              <label>Email</label>		
                                                <input type="text" class="form-control" placeholder="E-mail Id" name="email" required>
                                                                     <span class="help-block" id="error"></span>    
                                                                    </div>
                                                                    
                                                                </div>
																<div class="col-sm-4">
                                                                <div class="form-group">
                                                                 <label>Password</label>    
												 <input type="password" class="form-control" placeholder="Password" name="password" required>  
												 <span class="help-block" id="error"></span>
																 </div>
																 
                                                                </div>
																
                                                            </div>							
                                                             
                                                                
                                                            <div class="row">
                                                             
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                       <label>Phone No</label>
                                                       <input type="text" class="form-control" placeholder="Phone No" name="phone">
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
                                                                       <label>websites</label>
                                                       <input type="text" class="form-control" placeholder="Link" name="link">
                                                                            
                                                                    </div>
                                                                </div>
																
                                                            </div>
													
															<div class="row">
                                                             
                                                                
																<div class="col-sm-4">
                                                                    <div class="form-group">
                                                                       <label>Legal Status</label>
                                               <input type="text" class="form-control" placeholder="Legal Status" name="status">
                                                                            
                                                                    </div>
                                                                </div>
																<div class="col-sm-4">
                                                                    <div class="form-group">
                                                                       <label>Location of Work </label>
                                               
											   
											   <select name="location[]" id="e2" multiple="multiple" style="width: 100%;" >
                <option value="Office">Office</option>
                <option value="Online">Online</option>
                <option value="Field">Field</option>
                
             
            </select> 
                                                                            
                                                                    </div>
																	</div>
																	<div class="col-sm-4">
                                                                    <div class="form-group">
                                                                     <label>Other Location</label>  
                                               <input type="text" class="form-control" placeholder="Other Location" name="l_other">
                                                                            
                                                                    </div>
                                                                </div>
                                                                
																 
                                                            </div>
				<div class="row">
                                                            
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                       <label>Established Year</label>
                                                       <select name="year" style="width: 100%;" >
                <?php
                                                      $year=date('Y');
                                                      
                                                      
                                                     for($i=$year; $i>=2000; $i--)
                                                     {                                                       ?>
                                                 <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                   <?php
                                                   
                                                      }
                                                      ?>
                
             
            </select>
                                                                            
                                                                    </div>
                                                                </div>
																<div class="col-sm-4">
                                                                <div class="form-group">
                                                                 <label>Mission</label>    
													 <input  type="textarea" class="form-control" placeholder="Mission" name="mission[]"></textarea>
													 <span class="help-block" id="error"></span>
																 </div>
																 
                                                                </div>
																
																    <div class="col-sm-4">
															<div class="form-group">
                                                                       <label>Tax Exempt </label>
															<select name="tax"  style="width: 100%;" >
                <option value="Yes">Yes</option>
                <option value="No">No</option>
                
                
             
            </select>
			</div></div>
																
															<!--	<div class="col-sm-4">
                                                                <div class="form-group">
                                                                 <label>Current Action</label>    
													 <input id="" type="text" class="form-control" placeholder="Current Action" name="action">
													 <span class="help-block" id="error"></span>
																 </div>
																 
                                                                </div>-->
                                                            </div>
															
															<div class="row">
															<div class="col-sm-4">
                                                                <div class="form-group">
                                                                 <label>Current priorities </label>    
													 <input id="" type="text" class="form-control" placeholder="Current Priorities" name="prioritie[]">
													 <span class="help-block" id="error"></span>
																 </div>
																 
                                                                </div>
																
																<div class="col-sm-4">
                                                                <div class="form-group">
                                                                 <label>Recent Achievements</label>    
													 <input id="" type="text" class="form-control" placeholder="Recent Achievements" name="achievements[]">
													 <span class="help-block" id="error"></span>
																 </div>
																 
                                                                </div>
																
																<div class="col-sm-4">
                                                                <div class="form-group">
                                                                 <label>Associated Organizations</label>    
													 <input id="" type="text" class="form-control" placeholder="Associated Organizations" name="org[]">
													 <span class="help-block" id="error"></span>
																 </div>
																 
                                                                </div>
															</div>
															
															<div class="row">
                                                             
                                                           
																
																<div class="col-sm-4">
                                                                    <div class="form-group">
                                                                       <label>More Info</label>
                                                       <input type="text" class="form-control" placeholder="More Info" name="m_info[]">
                                                                            
                                                                    </div>
                                                                </div>
																<div class="col-sm-4">
                                                                    <div class="form-group">
                                                                       <label>Seeking volunteers </label>
                                               
											   
											   <select name="seeking[]" id="e3" multiple="multiple" style="width: 100%;" >
                <option value="Office">Office</option>
                <option value="Online">Online</option>
                <option value="Convasing">Convasing</option>
                
             
            </select> 
                                                                            
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
                                                            <legend>Organization Editor</legend>
															
                                                             		   <div class="row">
                                                             <div class="col-sm-4">
                                                                <div class="form-group">
                                                                 <label>Name</label>
                                                          <input type="text" class="form-control" placeholder="Name" name="e_name">
                                                           <span class="help-block" id="error"></span>																 
																 </div>
																
                                                                </div>
                                                                <div class="col-sm-4">
                                                               <div class="form-group">
                                                              <label>Address</label>		
                                                <input type="text" class="form-control" placeholder="Address" name="e_address">
                                                                     <span class="help-block" id="error"></span>    
                                                                    </div>
                                                                    
                                                                </div>
																 <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                       <label>Phone No</label>
                                                       <input type="text" class="form-control" placeholder="Phone No" name="e_phone">
                                                                 <span class="help-block" id="error"></span>           
                                                                    </div>
                                                                </div>
																
                                                            </div>							
                                                             
                                                                
                                                            <div class="row">
                                                              <div class="col-sm-4">
                                                               <div class="form-group">
                                                              <label>Email</label>		
                                                <input type="text" class="form-control" placeholder="E-mail Id" name="e_email">
                                                                     <span class="help-block" id="error"></span>    
                                                                    </div>
                                                                    
                                                                </div>
                                                               
																<div class="col-sm-4">
                                                                    <div class="form-group">
                                                                       <label>Skype</label>
                                               <input type="text" class="form-control" placeholder="Skype" name="e_skype">
                                                                            
                                                                    </div>
                                                                </div>
																
																
																 <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                       <label>other</label>
                                                       <input type="text" class="form-control" placeholder="Other No" name="e_other">
                                                                 <span class="help-block" id="error"></span>           
                                                                    </div>
                                                                </div>
                                                            </div>
																
                                                           
															</fieldset>
	<fieldset>
    <legend>Strategies </legend>	
<div class="row">

<div class="col-sm-3">
<div class="form-group">
<div class="checkbox">
<label>
<input type="checkbox" class="colored-primary" value="Get Money out of Politics" name="strategies[]">
<span class="text">Get Money out of Politics</span>
</label>
</div>
</div>
</div>
<div class="col-sm-3">
<div class="form-group">
<div class="checkbox">
<label>
<input type="checkbox" class="colored-primary" value="Advocate and Educate" name="strategies[]">
<span class="text">Advocate and Educate</span>
</label>
</div>
</div>
</div>
<div class="col-sm-3">
<div class="form-group">
<div class="checkbox">
<label>
<input type="checkbox" class="colored-primary" value="Dig into Data" name="strategies[]">
<span class="text">Dig into Data</span>
</label>
</div>
</div>
</div>
<div class="col-sm-3">
<div class="form-group">
<div class="checkbox">
<label>
<input type="checkbox" class="colored-primary" value="Take Legal Action" name="strategies[]">
<span class="text">Take Legal Action</span>
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
<input type="checkbox" class="colored-primary" value="Activate Citizens" name="strategies[]">
<span class="text">Activate Citizens</span>
</label>
</div>
</div>
</div>
<div class="col-sm-3">
<div class="form-group">
<div class="checkbox">
<label>
<input type="checkbox" class="colored-primary" value="Fund the Movement" name="strategies[]">
<span class="text">Fund the Movement</span>
</label>
</div>
</div>
</div>
<div class="col-sm-3">
<div class="form-group">
<div class="checkbox">
<label>
<input type="checkbox" class="colored-primary" value="Political Action Committee" name="strategies[]">
<span class="text">Political Action Committee</span>
</label>
</div>
</div>
</div>
<div class="col-sm-3">
                                                                    <div class="form-group">
                                                                       
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
    <legend>Type of Work</legend>	
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
        <?php include('include/footer.php');  ?>
 
