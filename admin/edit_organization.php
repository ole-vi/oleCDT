<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
ob_start();
session_start();
include('include/header.php'); 
require_once("class/class.admin.php");
//$login = new ADMIN();
include('include/sidebar.php');

$id=base64_decode($_REQUEST['id']);

$stmt = $admin->runQuery("select * from `pro_democracy` where `pro_id`=:id");
$stmt->execute(array(':id' => $id));
$row=$stmt->fetch(PDO::FETCH_ASSOC);

$seek = explode(',',($row['seeking']));
$work_type = explode(',',($row['work_type']));
$location = explode(',',($row['location']));

$str = explode(',',($row['strategies']));
$state1 = array('Alaska','Alabama','Arizona','Arkansas','California','Colorado','Connecticut','Delaware','Florida','Georgia','Hawaii','Idaho','Illinois','Indiana','Iowa','Kansas','Kentucky','Louisiana','Maine','Maryland','Massachusetts','Michigan','Minnesota','Mississippi','Missouri','Montana','Nebraska','Nevada','New Hampshire','New Jersey','New Mexico','New York','North Carolina','North Dakota','Ohio','Oklahoma','Oregon','Pennsylvania','Rhode Island','South Carolina','South Dakota','Tennessee','Texas','Utah','Vermont','Virginia','Washington','West Virginia','Wisconsin','Wyoming');
$state = explode(',',($row['state']));



$seek1= array('Office','Online','Convasing',);

$work = array('Administrative','Accounting','Canvasing door-to-door','Legal','Legislation','Media','Phone Bank','Web Management','Writing','Fund Raising');
$loc = array('Office','Online','Field');
$strat= array('Get Money out of Politics','Advocate and Educate','Dig into Data','Take Legal Action','Activate Citizens','Fund the Movement','Political Action Committee');


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


       
		   
            
               if($admin->editorg($id,$name,$web,$year,$tax,$lstatus,$location,$mission,$priorities,$action,$achievements,$org,$m_info,$email,$phone,$skype,$e_name,$e_address,$e_phone,$e_email,$e_skype,$e_other,$seeking,$strategie,$state1,$w_type,$w_other,$imgFile,$tmp_dir,$imgSize))
                {
                    
                    $_SESSION['org1'] = "Record Updated Successfully";
                    header("location:org_details");
                  

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
                        <li class="active">Edit Organization</li>
                    </ul>
                </div>
                <!-- /Page Breadcrumb -->
                <!-- Page Header -->
                <div class="page-header position-relative page-header-fixed">
                    <div class="header-title">
                        <h1>
                            Edit Organization

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
                                                    <span class="widget-caption">Edit Organization</span>
                                                </div>
                                                <div class="widget-body">
                                                    <div id="registration-form">
                                                        <form id="register-form" role="form" action="" method="post" enctype="multipart/form-data">            
                                                            <div class="row">
                                                             <div class="col-sm-4">
                                                                <div class="form-group">
                                                                 <label>Name</label>
                                                          <input type="text" class="form-control" value="<?php echo $row['name'];?>" placeholder="Name" name="name">
                                                           <span class="help-block" id="error"></span>																 
																 </div>
																
                                                                </div>
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
                                               <input type="text" value="<?php echo $row['skype'];?>" class="form-control" placeholder="Skype" name="skype">
                                                                            
                                                                    </div>
                                                                </div>
																
                                                            </div>							
                                                             
                                                                
                                                            <div class="row">
                                                             
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                       <label>Phone No</label>
                                                       <input type="text" class="form-control" value="<?php echo $row['phone'];?>" placeholder="Phone No" name="phone">
                                                                 <span class="help-block" id="error"></span>           
                                                                    </div>
                                                                </div>
																
																
																<div class="col-sm-4">
                                                                    <div class="form-group">
                                                                       <label>websites</label>
                                                       <input type="text" class="form-control" value="<?php echo $row['weblink'];?>" placeholder="Link" name="link">
                                                                            
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
                                                            </div>
													
															<div class="row">
                                                             
                                                                
																<div class="col-sm-4">
                                                                    <div class="form-group">
                                                                       <label>Legal Status</label>
                                               <input type="text" class="form-control" placeholder="Legal Status" value="<?php echo $row['legal_status'];?>" name="status">
                                                                            
                                                                    </div>
                                                                </div>
																<div class="col-sm-4">
                                                                    <div class="form-group">
                                                                       <label>Location of Work </label>
                                               
											   
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
                                                                     <label>Other Location</label>  
                                               <input type="text" value="<?php echo $row['name'];?>" class="form-control" placeholder="Other Location" name="l_other">
                                                                            
                                                                    </div>
                                                                </div>
                                                                
																 
                                                            </div>
				<div class="row">
                                                            
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                       <label>Established Year</label>
                                                       <select name="year" style="width: 100%;" >
                <option value="<?php echo $row['establish_year']; ?>"><?php echo $row['establish_year']; ?></option>
                      <?php
                                                      $year=date('Y');
													  
													  
                                                     for($i=$year; $i>=2000; $i--)
													 {
														 
															?>
                      <option value="<?php echo $i; ?>"  ><?php echo $i; ?></option>
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
													 <span class="help-block" value="<?php echo $row['mission'];?>" id="error"></span>
																 </div>
																 
                                                                </div>
																<div class="col-sm-4">
                                                                    <div class="form-group">
                                                                       <label>Seeking volunteers </label>
                                               
											   
											   <select name="seeking[]" id="e3" multiple="multiple" style="width: 100%;" >
                <?php foreach($seek1 as $seek1){
			   if(in_array($seek1,$seek))
				   {
?>
                      <option value="<?php echo $seek1; ?>" selected><?php echo ucfirst($seek1); ?></option>
                      <?php } 
				   else { ?>
                      <option value="<?php echo $seek1; ?>"><?php echo ucfirst($seek1); ?></option>
			   <?php }} ?>
                
             
            </select> 
                                                                            
                                                                    </div>
                                                                </div>
															<!--	<div class="col-sm-4">
                                                                <div class="form-group">
                                                                 <label>Current Action</label>    
													 <input id="" type="text" class="form-control" placeholder="Current Action" value="<?php echo $row['curr_action'];?>" name="action">
													 <span class="help-block" id="error"></span>
																 </div>
																 
                                                                </div>-->
                                                            </div>
															
															<div class="row">
															<div class="col-sm-4">
                                                                <div class="form-group">
                                                                 <label>Current priorities </label>    
													 <input id="" type="text" class="form-control" placeholder="Current Priorities" value="<?php echo $row['curr_priorities'];?>" name="prioritie[]">
													 <span class="help-block" id="error"></span>
																 </div>
																 
                                                                </div>
																
																<div class="col-sm-4">
                                                                <div class="form-group">
                                                                 <label>Recent Achievements</label>    
													 <input id="" type="text" class="form-control" value="<?php echo $row['achievements'];?>" placeholder="Recent Achievements" name="achievements[]">
													 <span class="help-block" id="error"></span>
																 </div>
																 
                                                                </div>
																
																<div class="col-sm-4">
                                                                <div class="form-group">
                                                                 <label>Associated Organizations</label>    
													 <input id="" type="text" class="form-control" value="<?php echo $row['associated_org'];?>" placeholder="Associated Organizations" name="org[]">
													 <span class="help-block" id="error"></span>
																 </div>
																 
                                                                </div>
															</div>
															
															<div class="row">
                                                             
                                                               
																
																<div class="col-sm-4">
                                                                    <div class="form-group">
                                                                       <label>More Info</label>
                                                       <input type="text" class="form-control" value="<?php echo $row['more_info'];?>" placeholder="More Info" name="m_info[]">
                                                                            
                                                                    </div>
                                                                </div>
																
																<div class="col-sm-4">
                                                                    <div class="form-group">
                                                                       <label>Logo</label>
                                                       <input type="file" class="form-control" value="<?php echo $row['name'];?>" name="pic">
                                                                            
                                                                    </div>
                                                                </div>
                                                            </div>
															
															 
															
															
															<fieldset>
                                                            <legend>Organization Editor</legend>
															
                                                             		   <div class="row">
                                                             <div class="col-sm-4">
                                                                <div class="form-group">
                                                                 <label>Name</label>
                                                          <input type="text" class="form-control" placeholder="Name" value="<?php echo $row['o_name'];?>" name="e_name">
                                                           <span class="help-block" id="error"></span>																 
																 </div>
																
                                                                </div>
                                                                <div class="col-sm-4">
                                                               <div class="form-group">
                                                              <label>Address</label>		
                                                <input type="text" class="form-control" placeholder="Address" value="<?php echo $row['o_address'];?>" name="e_address">
                                                                     <span class="help-block" id="error"></span>    
                                                                    </div>
                                                                    
                                                                </div>
																 <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                       <label>Phone No</label>
                                                       <input type="text" class="form-control" value="<?php echo $row['o_phone'];?>" placeholder="Phone No" name="e_phone">
                                                                 <span class="help-block" id="error"></span>           
                                                                    </div>
                                                                </div>
																
                                                            </div>							
                                                             
                                                                
                                                            <div class="row">
                                                              <div class="col-sm-4">
                                                               <div class="form-group">
                                                              <label>Email</label>		
                                                <input type="text" value="<?php echo $row['o_email'];?>" class="form-control" placeholder="E-mail Id" name="e_email">
                                                                     <span class="help-block" id="error"></span>    
                                                                    </div>
                                                                    
                                                                </div>
                                                               
																<div class="col-sm-4">
                                                                    <div class="form-group">
                                                                       <label>Skype</label>
                                               <input type="text" value="<?php echo $row['o_skype'];?>" class="form-control" placeholder="Skype" name="e_skype">
                                                                            
                                                                    </div>
                                                                </div>
																
																
																 <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                       <label>other</label>
                                                       <input type="text" class="form-control" value="<?php echo $row['o_other'];?>" placeholder="Other No" name="e_other">
                                                                 <span class="help-block" id="error"></span>           
                                                                    </div>
                                                                </div>
                                                            </div>
																
                                                           
															</fieldset>
	<fieldset>
    <legend>Strategies </legend>	
<div class="row">

          <?php
 foreach ($strat as $strat) {
	 
?>
                <div class="col-sm-3">
                  <div class="form-group">
                    <div class="checkbox">
                      <?php if(in_array($strat, $str))
				   { ?>
                      <label>
                      <input type="checkbox" class="colored-primary" checked value="<?php echo $strat; ?>" name="strategies[]">
                      <span class="text"> <?php echo ucfirst($strat); ?></span> </label>
                      <?php } else { ?>
                      <label>
                      <input type="checkbox" class="colored-primary" value="<?php echo $strat; ?>" name="strategies[]">
                      <span class="text"> <?php echo ucfirst($strat); ?></span> </label>
                      <?php } ?>
                    </div>
                  </div>
                </div>
                <?php } ?>
<div class="col-sm-3">
                                                                    <div class="form-group">
                                                                       
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
    <legend>Type of Work</legend>	
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
                                                                     
													 <input type="text" class="form-control" value="<?php echo $row['w_other'];?>" placeholder="Other" name="w_other">
													 <span class="help-block" id="error"></span>
																 </div>
																 
                                                                </div>
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

	
        <?php include('include/footer.php');  ?>
 
