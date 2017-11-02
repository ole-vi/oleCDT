<?php
/*ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);*/
ob_start();
include('include/config.php');
include('include/header.php');

 $id=base64_decode($_REQUEST['id']);

$sql = "select * from pro_democracy where pro_id =:id";
$query = $conn->prepare($sql);
$query->bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$row = $query->fetch(PDO::FETCH_ASSOC);


if(isset($_POST['submit']))
{
echo '<script language="javascript">';
echo 'alert("Thanks fo Submit")';
echo '</script>';
header('location:index');
}

?>
	<!-- contact start --> 
	
	
		<section id="contact" class="" style="padding: 139px 0 161%;">
			<div class="container">

  <h2 class="text-center flo">Organization Member Signup</h2>
  <div class="full-form">
  <div class="bor-1">
  
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active margin-tp">
     
      <div class="form-menu bor">
   <form method="POST" action="" enctype="multipart/form-data" class="form-horizontal"  role="form">
                <h2 class="text-center marg"></h2>
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-9">
					<label for="firstName" class="col-sm-3 control-label"><?php echo $row['name']; ?></label>
                        
                       
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="Websites (Links)" class="col-sm-3 control-label"> Websites (Links)</label>
                    <div class="col-sm-9">
                        <label for="Websites (Links)" class="col-sm-3 control-label"> <?php echo $row['weblink']; ?></label>
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="country" class="col-sm-3 control-label">Year established</label>
                    <div class="col-sm-9">
                        <label for="country" class="col-sm-3 control-label"><?php echo $row['establish_year']; ?></label>
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="control-label col-sm-3">Tax exempt </label>
                   <div class="col-sm-9">
                        <label for="country" class="col-sm-3 control-label"><?php echo $row['tax_exempt']; ?></label>
                    </div>
                </div>
				<div class="form-group">
                    <label for="Websites (Links)" class="col-sm-3 control-label"> Legal status</label>
                    <div class="col-sm-9">
                         <label for="country" class="col-sm-3 control-label"><?php echo $row['legal_status']; ?></label>
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="country" class="col-sm-3 control-label">Locations</label>
                     <div class="col-sm-9">
                         <label for="country" class="col-sm-3 control-label"><?php echo $row['location']; ?></label>
                    </div>
                </div>
				 <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Mission</label>
                     <div class="col-sm-9">
                         <label for="country" class="col-sm-3 control-label"><?php echo $row['mission']; ?></label>
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Current priorities </label>
                     <div class="col-sm-9">
                         <label for="country" class="col-sm-3 control-label"><?php echo $row['curr_priorities']; ?></label>
                    </div>
                </div>
					
               
				<div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Current Actions</label>
                     <div class="col-sm-9">
                         <label for="country" class="col-sm-3 control-label"><?php echo $row['curr_action']; ?></label>
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Recent Achievements</label>
                    <div class="col-sm-9">
                         <label for="country" class="col-sm-3 control-label"><?php echo $row['achievements']; ?></label>
                    </div>
                </div>
				
				
				<div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Associated Organizations</label>
                     <div class="col-sm-9">
                         <label for="country" class="col-sm-3 control-label"><?php echo $row['associated_org']; ?></label>
                    </div>
                </div>
				<div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">More information</label>
                     <div class="col-sm-9">
                         <label for="country" class="col-sm-3 control-label"><?php echo $row['more_info']; ?></label>
                    </div>
                </div>
               
				
				<div class="form-group">
                    <label class="control-label col-sm-3">Seeking volunteers</label>
                     <div class="col-sm-9">
                         <label for="country" class="col-sm-3 control-label"><?php echo $row['seeking']; ?></label>
                    </div>
					
					
                </div>
				
				<div class="form-group">
                    <label class="control-label col-sm-3">Type of Work</label>
                    
                      <div class="col-sm-9">
                         <label for="country" class="col-sm-3 control-label"><?php echo $row['work_type']; ?></label>
                    </div>
                        
                </div>
			
                
				
				<div class="form-group">
                    <label class="control-label col-sm-3">Strategies </label>
                    <div class="col-sm-9">
                         <label for="country" class="col-sm-3 control-label"><?php echo $row['strategies']; ?></label>
                    </div>
                    
                </div>
			
				<div class="form-group">
                    <label class="control-label col-sm-3">State </label>
                    <div class="col-sm-9">
                         <label for="country" class="col-sm-3 control-label"><?php echo $row['state']; ?></label>
                    </div>
                    
                </div>
				
				
				<label class="control-label col-sm-3 pada">Main Office Information</label>
			  
                <div class="form-group col-sm-12">
                     <label class="control-label col-sm-3 pada">Name</label>
                   <div class="col-sm-9">
                         <label for="country" class="col-sm-3 control-label"><?php echo $row['c_name']; ?></label>
                    </div>
                </div>
				<div class="form-group col-sm-12">
                     <label class="control-label col-sm-3 pada">Address</label>
                   <div class="col-sm-9">
                         <label for="country" class="col-sm-3 control-label"><?php echo $row['address']; ?></label>
                    </div>
                </div>
				<div class="form-group col-sm-12">
                     <label class="control-label col-sm-3 pada">Phone No</label>
                   <div class="col-sm-9">
                         <label for="country" class="col-sm-3 control-label"><?php echo $row['phone']; ?></label>
                    </div>
                </div>
				
				<div class="form-group col-sm-12">
                     <label class="control-label col-sm-3 pada">Email</label>
                   <div class="col-sm-9">
                         <label for="country" class="col-sm-3 control-label"><?php echo $row['email']; ?></label>
                    </div>
                </div>
				<div class="form-group col-sm-12">
                     <label class="control-label col-sm-3 pada">Skype</label>
                   <div class="col-sm-9">
                         <label for="country" class="col-sm-3 control-label"><?php echo $row['skype']; ?></label>
                    </div>
                </div>
				<div class="form-group col-sm-12">
                     <label class="control-label col-sm-3 pada">Other</label>
                   <div class="col-sm-9">
                         <label for="country" class="col-sm-3 control-label"><?php echo $row['other']; ?></label>
                    </div>
                </div>

				<!-- /.form-group -->
				 <label class="control-label col-sm-3 pada">Organization Editor</label>
				 <div class="form-group col-sm-12">
                  <div class="form-group col-sm-12">
                     <label class="control-label col-sm-3 pada">Name</label>
                   <div class="col-sm-9">
                         <label for="country" class="col-sm-3 control-label"><?php echo $row['o_name']; ?></label>
                    </div>
                </div>
				<div class="form-group col-sm-12">
                     <label class="control-label col-sm-3 pada">Address</label>
                   <div class="col-sm-9">
                         <label for="country" class="col-sm-3 control-label"><?php echo $row['o_address']; ?></label>
                    </div>
                </div>
				<div class="form-group col-sm-12">
                     <label class="control-label col-sm-3 pada">Phone No</label>
                   <div class="col-sm-9">
                         <label for="country" class="col-sm-3 control-label"><?php echo $row['o_phone']; ?></label>
                    </div>
                </div>
				
				<div class="form-group col-sm-12">
                     <label class="control-label col-sm-3 pada">Email</label>
                   <div class="col-sm-9">
                         <label for="country" class="col-sm-3 control-label"><?php echo $row['o_email']; ?></label>
                    </div>
                </div>
				<div class="form-group col-sm-12">
                     <label class="control-label col-sm-3 pada">Skype</label>
                   <div class="col-sm-9">
                         <label for="country" class="col-sm-3 control-label"><?php echo $row['o_skype']; ?></label>
                    </div>
                </div>
				<div class="form-group col-sm-12">
                     <label class="control-label col-sm-3 pada">Other</label>
                   <div class="col-sm-9">
                         <label for="country" class="col-sm-3 control-label"><?php echo $row['o_other']; ?></label>
                    </div>
                </div>  
                    
                </div>
                
                <div class="form-group">
                    <div class="col-sm-2 ">
                        
                       <a href="<?php echo $site_url;?>update_organization/<?php echo base64_encode($id);?>" id="back" onClick="functionback()" class="btn btn-primary btn-block cwid-1">Back To Edit</a> 
                    </div>

				   <div class="col-sm-2  marg-5 ">
                        <button name="submit"  class="btn btn-primary btn-block cwid">Submit</button>
                        
                    </div>
					
					 
					<!--<div class="col-sm-4 ">
                        
                        <button name="submit" type="submit" class="btn btn-primary btn-block width-mar">Read Field Guide Policies</button>
                    </div>-->
                </div>
				
            </form>
    </div>
    </div>

    
  </div>
  </div>
  </div>
</div>

		</section>
	<!-- contact end -->

	<?php include('include/footer.php');?>


   
  
</body>



