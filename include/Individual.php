<?php 
ob_start();
session_start();
include('include/config.php');
include('include/header.php');
?>
    
<section id="contact" class="" style="padding: 139px 0 161%;">
	<div class="container">
	  <div class="row">

      <h2 class="text-center flo">Individual Member Signup</h2>
      <div class="full-form" style=" margin-top: 57px;">
        <div class="bor-1">
  
          <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
     
              <div class="form-menu bor">
                <form class="form-horizontal" role="form">
                
                  <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-9">
                      <input id="firstName" placeholder="Full Name" name="fname" class="form-control" autofocus="" type="text">
                    </div>
                  </div>
				
				          <div class="form-group">
                    <label class="control-label col-sm-3">Location of Work</label>
                    <div class="col-sm-6 margt">
                      <div class="row">
						
                        <div class="col-sm-4">
                          <label class="radio-inline">
                            <input name="location" value="Office" type="radio"><span class="mat">Office</span>
                          </label>
                        </div>
                        <div class="col-sm-4">
                          <label class="radio-inline">
                            <input name="location" value="Online" type="radio"><span class="mat">Online</span>
                          </label>
                        </div>
                        <div class="col-sm-4">
                          <label class="radio-inline pad">
                            <input name="location" value="Field " type="radio"><span class="mat">Field </span>
                          </label>
                        </div> 
                      </div>
                    </div>
                  </div>
				          <div class="form-group">
                    <label class="control-label col-sm-3">Type of Work</label>
                    <div class="col-sm-6">
                      <div class="row">
                        <div class="col-sm-4">
                          <label class="radio-inline">
                            <input id="administrativeCheckbox" value="Administrative" name="administrative" type="checkbox"><span class="mat">Administrative</span>
                          </label>
                        </div>
                        <div class="col-sm-4">
                          <label class="radio-inline">
                            <input id="accountingCheckbox" value="Accounting" type="checkbox" name="accounting"><span class="mat">Accounting</span>
                          </label>
                        </div>
                        <div class="col-sm-4">
                          <label class="radio-inline pad">
                            <input id="canvasing door-to-doorCheckbox" value="Canvasing door-to-door" type="checkbox" name="canvasing"><span class="mat">Canvasing door-to-door</span>
                          </label>
                        </div> 
							          <div class="col-sm-4">
                          <label class="radio-inline">
                            <input id="legalCheckbox" value="legal" name="legal" type="checkbox"><span class="mat">Legal</span>
                          </label>
                        </div>
							          <div class="col-sm-4">
                          <label class="radio-inline">
                            <input id="LegislationCheckbox" value="Legislation" name="legislation" type="checkbox"> <span class="mat">Legislation</span>
                          </label>
                        </div>
							          <div class="col-sm-4">
                          <label class="radio-inline">
                            <input id="MediaCheckbox" value="Media" type="checkbox" name="media"><span class="mat">Media</span>
                          </label>
                        </div>
							          <div class="col-sm-4">
                          <label class="radio-inline">							
                            <input id="Phone BankCheckbox" name="phone_bank" value="other" type="checkbox"><span class="mat">Phone Bank</span>
                          </label>
                        </div>
							
							          <div class="col-sm-4">
                          <label class="radio-inline">
                            <input id="Web ManagementCheckbox" value="Web Management" name="web_management" type="checkbox"><span class="mat">Web Management</span>
                          </label>
                        </div>
							
							          <div class="col-sm-4">
                          <label class="radio-inline">
								            <input id="writingCheckbox" value="Writing" value="writing" type="checkbox"><span class="mat">Writing</span>
                          </label>
                        </div>
							          <div class="col-sm-4">
                          <label class="radio-inline">
                            <input id="writingCheckbox" value="Fund Raising" name="fund_raising" type="checkbox"><span class="mat">Fund Raising</span>
                          </label>
                        </div>
							          <div class="col-sm-4">
                          <label class="radio-inline">
								            <input id="Other" placeholder="Other" class="form-control hrt" name="other" autofocus="" type="text">
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
				          <div class="form-group">
                    <label for="Education" class="col-sm-3 control-label">Education</label>
                    <div class="col-sm-9">
                      <input id="Education" name="education" placeholder="Education" class="form-control" autofocus="" type="text">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Work History</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" name="work_history" placeholder="Work History"></textarea>
                    </div>
                  </div>
				          <div class="form-group">
                    <label for="country" class="col-sm-3 control-label">Hours per week</label>
                    <div class="col-sm-9">
                      <select name="hours" id="country" class="form-control">
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                      </select>
                    </div>
                  </div>
				
				
				          <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                      <input id="Email" name="email" placeholder="Email" class="form-control" autofocus="" type="text">
                    </div>
                  </div>
				
				          <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Mobile phone</label>
                    <div class="col-sm-9">
                      <input id="Mobile phone" placeholder="Mobile phone" class="form-control" autofocus="" name="mob" type="number">
                    </div>
                  </div>
				          <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Home phone</label>
                    <div class="col-sm-9">
                      <input id="Home phone" placeholder="Home phone" class="form-control" autofocus="" name="phone" type="text">
                    </div>
                  </div>
				          <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Skype</label>
                    <div class="col-sm-9">
                      <input id="Skype" name="skype" placeholder="Skype" class="form-control" autofocus="" type="text">
                    </div>
                  </div>
				
				
				          <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Facebook</label>
                    <div class="col-sm-9">
                      <input id="Face-book" name="facebook" placeholder="Face-book" class="form-control" autofocus="" type="text">
                    </div>
                  </div>
				
				
			            <div class="form-group col-sm-12">
                    <label class="control-label col-sm-3 pada">Address</label>
                    <div class="col-sm-3">
                      <div class="inpu">
                        <input id="Street" placeholder="Street" class="form-control" autofocus="" name="street" type="text">
                      </div>   
                    </div>
					
					          <div class="col-sm-3">
                      <div class="inpu">
                        <input id="City" name="city" placeholder="City" class="form-control" autofocus="" type="text">
                      </div>  
                    </div>
					          <div class="col-sm-3">
                      <div class="inpu">                  
					              <select id="country" name="state" class="form-control">
                          <option>State</option>
                          <option>Texas</option>
                          <option>Florida</option>
                          <option>Hawaii</option>
                          <option>Massachusetts</option>
                          <option>Texas</option>
                          <option>Pennsylvania</option>
                        </select>
                      </div>  
                    </div>
					          <div class="col-sm-3"> 
                    </div>
					          <div class="col-sm-3">
                      <div class="mar">
                        <input id="Zip" placeholder="Zip" name="zip" class="form-control" autofocus="" type="text">
                      </div>
                    </div>
                  </div>
				

				          <div class="form-group">
                    <label for="firstName"  class="col-sm-3 control-label"> Birth Date</label>
                    <div class="col-sm-9">
                      <input id="Birth Date" name="dob" placeholder=" Birth Date" class="form-control" autofocus="" type="text"> 
                    </div>
                  </div>
				
				          <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Citizenship</label>
                    <div class="col-sm-9">
                      <input id="Citizenship" name="citizenship" placeholder="Citizenship" class="form-control" autofocus="" type="text">
                    </div>
                  </div>
                
				 
				          <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label"></label>
                    <div class="col-sm-9">
					            <label for="firstName" class=" control-label">Name</label>
                      <input id="Citizenship" name="lname" placeholder="Name" class="form-control" autofocus="" type="text">
                    </div>
                  </div>
				
				          <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label"></label>
                    <div class="col-sm-9">
					            <label for="firstName" class=" control-label">Password</label>
                      <input id="Citizenship" name="password" placeholder="Password" class="form-control" autofocus="" type="text">
                    </div>
                  </div>
				
				          <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label"></label>
                    <div class="col-sm-9">
					            <label for="firstName" class=" control-label">Re Enter Password</label>
                      <input id="Citizenship" name="repassword" placeholder="Re Enter Password" class="form-control" autofocus="" type="text">
                    </div>
                  </div>
				
				          <div class="form-group col-sm-12 margngh">
                    <div class="col-sm-2 ">
                      <input type="submit" value="Submit" class="btn btn-primary btn-block">
                    </div>
					          <div class="col-sm-2 ">
                      <button type="submit" class="btn btn-primary btn-block">Reset</button>
                    </div>
                  </div>
				          <!-- /.form-group -->
                  <!-- /.form-group -->
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- contact end -->

<!-- map start --> 		
<!-- map end -->
	
<?php include('include/footer.php');?>

  
