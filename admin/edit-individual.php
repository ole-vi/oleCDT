<?php
@ob_start();
session_start();
include('include/header.php'); 
require_once("class/class.admin.php");
//$login = new ADMIN();
include('include/sidebar.php');
$id = base64_decode($_REQUEST['id']);
if(isset($_POST['submit']))
{


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

$w_other = $_POST['w_other'];
 $date = $_POST['dob'];
//print_r($dob);
 $dob = date('Y-m-d ', strtotime($date));
$citizenship = $_POST['citizenship'];

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

 
                if($admin->editindividual($id,$name,$location,$education,$history,$hours,$email,$mob,$phone,$skype,$facebook,$street,$city,$state,$zip,$dob,$citizenship,$worktype,$w_other,$imgFile,$tmp_dir,$imgSize,$phone2,$phone3,$imgFile2,$tmp_dir2,$imgSize2))
                {
                    
                    $_SESSION['indv'] = "Record Updated Successfully";
                    header("location:individual-details.php");

                }
            }



$stmt = $admin->runQuery("select * from tbl_individual_member where id=:id");
$stmt->execute(array(':id' => $id));
$row1=$stmt->fetch(PDO::FETCH_ASSOC);

$work_type = explode(',',($row1['work_type']));
$location = explode(',',($row1['location']));
$state1 = array('Alaska','Alabama','Arizona','Arkansas','California','Colorado','Connecticut','Delaware','Florida','Georgia','Hawaii','Idaho','Illinois','Indiana','Iowa','Kansas','Kentucky','Louisiana','Maine','Maryland','Massachusetts','Michigan','Minnesota','Mississippi','Missouri','Montana','Nebraska','Nevada','New Hampshire','New Jersey','New Mexico','New York','North Carolina','North Dakota','Ohio','Oklahoma','Oregon','Pennsylvania','Rhode Island','South Carolina','South Dakota','Tennessee','Texas','Utah','Vermont','Virginia','Washington','West Virginia','Wisconsin','Wyoming');
$state = explode(',',($row1['state']));

$work = array('Administrative','Accounting','Canvasing door-to-door','Legal','Legislation','Media','Phone Bank','Web Management','Writing','Fund Raising');
$loc = array('Office','Online','Field');			
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
                            <a href="dashboard.php">Home</a>
                        </li>
                        <li class="active">Edit Individual</li>
                    </ul>
                </div>
                <!-- /Page Breadcrumb -->
                <!-- Page Header -->
                <div class="page-header position-relative page-header-fixed">
                    <div class="header-title">
                        <h1>
                            Edit Individual

                        </h1>
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
                                                          <input type="text" class="form-control" value="<?php echo $row1['name'];?>" placeholder="Name" name="fname">
                                                           <span class="help-block" id="error"></span>																 
																 </div>
																
                                                                </div>
                                                                <div class="col-sm-4">
                                                               <div class="form-group">
                                                              <label>Email</label>		
                                                <input type="text" value="<?php echo $row1['email'];?>" class="form-control" placeholder="E-mail Id" name="email">
                                                                     <span class="help-block" id="error"></span>    
                                                                    </div>
                                                                    
                                                                </div>
																<div class="col-sm-4">
                                                                    <div class="form-group">
                                                                       <label>Skype</label>
                                               <input type="text" class="form-control" placeholder="Skype" value="<?php echo $row1['skype'];?>" name="skype">
                                                                            
                                                                    </div>
                                                                </div>
																
                                                            </div>							
                                                             
                                                                
                                                            <div class="row">
                                                             <div class="col-sm-4">
                                                                <div class="form-group">
                                                                 <label>Mobile No</label>    
													 <input type="text" class="form-control" placeholder="Mobile No" value="<?php echo $row1['mob'];?>" name="mob">
													 <span class="help-block" id="error"></span>
																 </div>
																 
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                       <label>Phone No</label>
                                                       <input type="text" class="form-control" placeholder="Phone No" value="<?php echo $row1['phone'];?>" name="phone">
                                                                 <span class="help-block" id="error"></span>           
                                                                    </div>
                                                                </div>
																<div class="col-sm-4">
                                                                    <div class="form-group">
                                                                       <label>Office Phone</label>
                                                       <input type="text" class="form-control" placeholder="Office Phone" value="<?php echo $row1['office_phone'];?>" name="off_phone">
                                                                 <span class="help-block" id="error"></span>           
                                                                    </div>
                                                                </div>
																
                                                            </div>
															<div class="row">
															<div class="col-sm-4">
                                                                    <div class="form-group">
                                                                       <label>Other Phone</label>
                                                       <input type="text" class="form-control" value="<?php echo $row1['other_phone'];?>" placeholder="Other Phone" name="o_phone">
                                                                 <span class="help-block" id="error"></span>           
                                                                    </div>
                                                                </div>
															 <div class="col-sm-4">
                                                                <div class="form-group">
                                                                 <label>Date of Birth</label>    
													 <input id="dateofplay" type="text" class="form-control" placeholder="Date of Birth" value="<?php echo $row1['dob'];?>" name="dob">
													 <span class="help-block" id="error"></span>
																 </div>
																 
                                                                </div>
																<div class="col-sm-4">
                                                                <div class="form-group">
                                                                 <label>Facebook</label>    
													 <input type="text" class="form-control" placeholder="Facebook" value="<?php echo $row1['facebook'];?>" name="facebook">
													 <span class="help-block" id="error"></span>
																 </div>
																 
                                                                </div>
															</div>
															<div class="row">
                                                             
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                       <label>Education</label>
                                                       <input type="text" class="form-control" value="<?php echo $row1['education'];?>" placeholder="Education" name="education[]">
                                                                            
                                                                    </div>
                                                                </div>
																<div class="col-sm-4">
                                                                    <div class="form-group">
                                                                       <label>Work History</label>
                                               <input type="text" value="<?php echo $row1['work_history'];?>" class="form-control" placeholder="Work History" name="work_history[]">
                                                                            
                                                                    </div>
                                                                </div>
																 <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                       <label>Citizenship</label>
                                                       <input type="text" class="form-control" value="<?php echo $row1['citizenship'];?>" placeholder="Citizenship" name="citizenship">
                                                                            
                                                                    </div>
                                                                </div>
                                                            </div>
				<div class="row">
                                                            
                                                               
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
													 <input type="text" class="form-control" value="<?php echo $row1['street'];?>" placeholder="Street" name="street">
													 <span class="help-block" id="error"></span>
																 </div>
																 
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <div class="form-group">
                                                                       <label>City</label>
                                                       <input type="text" class="form-control" value="<?php echo $row1['city'];?>" placeholder="City" name="city">
                                                                            
                                                                    </div>
                                                                </div>
																<div class="col-sm-3">
                                                                    <div class="form-group">
                                                                       <label>Zip</label>
                                               <input type="text" value="<?php echo $row1['zip'];?>" class="form-control" placeholder="Zip" name="zip">
                                                                            
                                                                    </div>
                                                                </div>
																<div class="col-sm-3">
                                                                    <div class="form-group">
                                                                       <label>State</label>
                                               <select name="state[]" id="e1" multiple="multiple" style="width: 100%;" >
               <?php foreach($state1 as $state1){
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
    <legend>Possible Volunteer Work</legend>	


 <div class="row">
                <?php
 foreach ($work as $ser) {
	 
?>
                <div class="col-sm-3">
                  <div class="form-group">
                    <div class="checkbox">
                      <?php if(in_array($ser, $work_type))
				   { ?>
                      <label>
                      <input type="checkbox" class="colored-primary" checked value="<?php echo $ser; ?>" name="worktype[]">
                      <span class="text"> <?php echo ucfirst($ser); ?></span> </label>
                      <?php } else { ?>
                      <label>
                      <input type="checkbox" class="colored-primary" value="<?php echo $ser; ?>" name="worktype[]">
                      <span class="text"> <?php echo ucfirst($ser); ?></span> </label>
                      <?php } ?>
                    </div>
                  </div>
                </div>
                <?php } ?>
				<div class="col-sm-3">
                                                                <div class="form-group">
                                                                     
													 <input type="text" class="form-control" value="<?php echo $row1['w_other'];?>" placeholder="Other" name="w_other">
													 <span class="help-block" id="error"></span>
																 </div>
																 
                                                                </div>
              </div>

	<div class="row">
	<div class="col-sm-4">
                                                                    <div class="form-group">
                                                                       <label>Possible Locations </label>
                                               
											   
											   <select name="location[]" id="e2" multiple="multiple" style="width: 100%;" >
               <?php foreach($loc as $loc){
			   if(in_array($loc,$location))
				   {
?>
                      <option value="<?php echo $loc; ?>" selected><?php echo ucfirst($loc); ?></option>
                      <?php } 
				   else { ?>
                      <option value="<?php echo $loc; ?>"><?php echo ucfirst($loc); ?></option>
			   <?php }} ?>
                
             
            </select> 
                                                                            
                                                                    </div>
                                                                </div>
			<div class="col-sm-4">
                                                                    <div class="form-group">
                                                                       <label>Hours per Week</label>
                                                       <input type="text" class="form-control" value="<?php echo $row1['hours_perweak'];?>" placeholder="Hours per Week" name="hours">
                                                                            
                                                                    </div>
                                                                </div>													
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
  yearRange: "-5:+0",
      
   
     });
</script>	
        <?php include('include/footer.php');  ?>
 
