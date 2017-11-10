<?php 
ob_start();
session_start();
include('include/config.php');
include('include/constants.php');
include('include/header.php');

//$id = base64_decode($_REQUEST['id']);
$id = $_SESSION['id'];
$sql = "select * from tbl_individual_member where id='".$id."' ";
$query = $conn->prepare($sql);
$query->bindParam(':id', $id, PDO::PARAM_STR);

$query->execute();
$count = $query->rowCount();
$count;
$row = $query->fetch(PDO::FETCH_ASSOC);

$state1 = array('Alaska','Alabama','Arizona','Arkansas','California','Colorado','Connecticut','Delaware','Florida','Georgia','Hawaii','Idaho','Illinois','Indiana','Iowa','Kansas','Kentucky','Louisiana','Maine','Maryland','Massachusetts','Michigan','Minnesota','Mississippi','Missouri','Montana','Nebraska','Nevada','New Hampshire','New Jersey','New Mexico','New York','North Carolina','North Dakota','Ohio','Oklahoma','Oregon','Pennsylvania','Rhode Island','South Carolina','South Dakota','Tennessee','Texas','Utah','Vermont','Virginia','Washington','West Virginia','Wisconsin','Wyoming');

if(isset($_POST['submit']))
{
  $dt_fname = $_REQUEST['fname'];
  $dt_mob = !empty($_REQUEST['mob']) ? $_REQUEST['mob'] : 0;
  $dt_off_phone = !empty($_REQUEST['off_phone']) ? $_REQUEST['off_phone'] : 0;
  $dt_o_phone = !empty($_REQUEST['o_phone']) ? $_REQUEST['o_phone'] : 0;
  $dt_skype = isset($_REQUEST['skype']) ? $_REQUEST['skype'] : '';
  $dt_facebook = isset($_REQUEST['facebook']) ? $_REQUEST['facebook'] : '';
  $dt_street = isset($_REQUEST['street']) ? $_REQUEST['street'] : '';
  $dt_city = isset($_REQUEST['city']) ? $_REQUEST['city'] : '';
  $dt_state = isset($_REQUEST['state']) ? implode('::', $_REQUEST['state']): '';
  $dt_zip = isset($_REQUEST['zip']) ? $_REQUEST['zip'] : '';
  $dt_dob = isset($_REQUEST['dob']) ? date('Y-m-d ', strtotime($_REQUEST['dob'])) : '';
  $dt_citizenship = isset($_REQUEST['citizenship']) ? $_REQUEST['citizenship'] : '';

  $dt_interest1 = isset($_REQUEST['interest1']) ? implode('::', $_REQUEST['interest1']): '';
  $dt_interest2 = isset($_REQUEST['interest2']) ? implode('::', $_REQUEST['interest2']): '';
  $dt_interest3 = isset($_REQUEST['interest3']) ? implode('::', $_REQUEST['interest3']): '';
  $dt_interest4 = isset($_REQUEST['interest4']) ? implode('::', $_REQUEST['interest4']): '';

  $dt_purpose = isset($_REQUEST['purpose']) ? implode('::', $_REQUEST['purpose']): '';

  $date = date("Y-m-d H:i:s");
  $status='Active';

  $imgFile = $_FILES['pic']['name'];
  $tmp_dir = $_FILES['pic']['tmp_name'];
  $imgSize = $_FILES['pic']['size'];

  if($imgFile!='') 
  {
    $upload_dir = 'profile/'; // upload directory
  
    $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
    
    // valid image extensions
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
    
    // rename uploading image
    $pic1 = rand(1000,1000000).".".$imgExt;
        
    // allow valid image file formats
    if(in_array($imgExt, $valid_extensions)){
      // Check file size '10KB'
      if($imgSize < 5000000) {
        move_uploaded_file($tmp_dir,$upload_dir.$pic1);
      }
      else{
        $msg = "Sorry, your file is too large.";
        //header("location:stream-details");
      }
    }

    // if no error occured, continue ....
    if(!isset($msg))
    {
      $stmt = "update `tbl_individual_member` SET pic=:pic where `id`=:id";
      $query = $conn->prepare($stmt);
      $query->bindParam(':pic',$pic1, PDO::PARAM_STR);
      $query->bindParam(':id',$id , PDO::PARAM_STR);
      $query->execute();
    }
  }

  $sql1 = "update `tbl_individual_member` set fname=:fname, mob=:mob, off_phone=:off_phone, o_phone=:o_phone, skype=:skype , facebook=:facebook , street=:street , city=:city , state=:state , zip=:zip , dob=:dob , citizenship=:citizenship, interest1=:interest1, interest2=:interest2, interest3=:interest3, interest4=:interest4, purpose=:purpose, last_update=:update_date where id=:id";
  $query1 = $conn->prepare($sql1);
  $query1->bindParam(':id', $id, PDO::PARAM_STR);
  $query1->bindParam(':fname', $dt_fname, PDO::PARAM_STR);
  $query1->bindParam(':mob', $dt_mob, PDO::PARAM_STR);
  $query1->bindParam(':off_phone', $dt_off_phone, PDO::PARAM_STR);
  $query1->bindParam(':o_phone', $dt_o_phone, PDO::PARAM_STR);
  $query1->bindParam(':skype', $dt_skype, PDO::PARAM_STR);
  $query1->bindParam(':facebook', $dt_facebook, PDO::PARAM_STR);
  $query1->bindParam(':street', $dt_street, PDO::PARAM_STR);
  $query1->bindParam(':city', $dt_city, PDO::PARAM_STR);
  $query1->bindParam(':state', $dt_state, PDO::PARAM_STR);
  $query1->bindParam(':zip', $dt_zip, PDO::PARAM_STR);
  $query1->bindParam(':dob', $dt_dob, PDO::PARAM_STR);
  $query1->bindParam(':citizenship', $dt_citizenship, PDO::PARAM_STR);
  $query1->bindParam(':interest1', $dt_interest1, PDO::PARAM_STR);
  $query1->bindParam(':interest2', $dt_interest2, PDO::PARAM_STR);
  $query1->bindParam(':interest3', $dt_interest3, PDO::PARAM_STR);
  $query1->bindParam(':interest4', $dt_interest4, PDO::PARAM_STR);
  $query1->bindParam(':purpose', $dt_purpose, PDO::PARAM_STR);
  $query1->bindParam(':update_date', $date, PDO::PARAM_STR);

  $run=$query1->execute();
  if($run)
  {
    $to=$o_email;
    $from = $mail_send_from;

    $subject ='Account Updation Sucessfully';

    $message='<table align="center" border="1" bordercolor="#caecf7" cellpadding="0" cellspacing="0" style="width: 804px;">
      <tbody>
        <tr align="center">
          <td class="area" height="19">
            <table border="0" cellpadding="0" cellspacing="0" style="height: 246px; width: 800px;">
              <tbody>
                <tr>
                  <td align="center" bgcolor="#caecf7" class="smallgreylink" height="32">
                    &nbsp;</td>
                  <td align="left" bgcolor="#caecf7" class="style1 smallgreylink" height="32" style="padding-right: 5px;" valign="middle" width="97%">
                    <strong>Organization Updation</strong></td>
                </tr>
                <tr>
                  <td align="center" class="smallgreylink" height="81" width="3%">
                    &nbsp;</td>
                  <td align="center" class="smallgreylink style1" height="81" style="padding-right: 5px;" valign="top">
                    <p align="left" class="style2">
                      Dear '.$name.'</p>
                    <p align="justify" class="style2">
                      Thank you for Updating in Pro-Democracy Organization</p>
                    <p align="justify" class="style2">
                      Your &nbsp;Employer Account has been successfully Updated.</p>
                  
                      <strong>Thank You</strong></p>
                    <p align="justify" class="style2">
                      <strong>fieldguide Team</strong></p>
                    <p align="justify" class="style2">
                      &nbsp;</p>
                  </td>
                </tr>
                <tr>
                  <td align="center" bgcolor="#caecf7" class="smallgreylink" height="20">
                    &nbsp;</td>
                  <td align="left" bgcolor="#caecf7" class="smallgreylink style1" height="32" valign="middle">
                    <br />
                    &nbsp;</td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>';

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From:'.$from."\r\n";

    $res = mail ( $to, $subject, $message, $headers );

    if ($res)
    {
      header('location:'.$site_url.'myaccount');
      echo '<script language="javascript">';
      echo 'alert("Updated Record Sucessfully")';
      echo '</script>';
    }
  }
  else
  {
    header('location:'.$site_url.'myaccount');

    echo '<script language="javascript">';
    echo 'alert("Record is not Updated")';
    echo '</script>';
  }
}

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
<script src="js/chosen.jquery.js" type="text/javascript"></script>
<script src="docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
<script>
$(document).ready(function () {
  var charReg = /^\s*[a-zA-Z,\s]+\s*$/;
  $('.keyup-char').keyup(function () {
    $('span.error-keyup-1').hide();
    var inputVal = $(this).val();

    if (!charReg.test(inputVal)) {
      $(this).parent().find(".warning").show();
    } else {
      $(this).parent().find(".warning").hide();
    }
  });
});
</script>
<script type="text/javascript">
$(document).ready(function()
{
  $("#mob").keypress(function (e) {
    //if the letter is not digit then display error and don't type anything
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
      //display error message
      $("#errmsg").html("Digits Only").show().fadeOut("slow");
      return false;
    }
  });
  $("#mob1").keypress(function (e) {
    //if the letter is not digit then display error and don't type anything
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
      //display error message
      $("#errmsg1").html("Digits Only").show().fadeOut("slow");
      return false;
    }
  });
  $("#mob2").keypress(function (e) {
    //if the letter is not digit then display error and don't type anything
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
      //display error message
      $("#errmsg2").html("Digits Only").show().fadeOut("slow");
      return false;
    }
  });
  $("#mob3").keypress(function (e) {
    //if the letter is not digit then display error and don't type anything
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
      //display error message
      $("#errmsg3").html("Digits Only").show().fadeOut("slow");
      return false;
    }
  });

  $("#mob").change(function()
  {
    var no = $("#mob").val();
    if(no.length!=10){
      //$("#errmsg").html("Ten Digits Only").show().fadeOut("slow"); 
      $("#errmsg").addClass("red11"); 
      msgbox.html("Ten Digits Only");
    }
  });
  $("#mail1").change(function()
  {
    var username = $("#mail1").val();
    var msgbox = $("#status1");

    $("#status1").html('<img src="img/loader.gif">&nbsp;Checking availability.');

    $.ajax({
      type: "POST",
      url: "check_ajax",
      data: "email="+ username,
      success: function(msg){
        $("#status1").html(function(event, request){
          if(msg == 'OK')
          {
            $("#mail1").removeClass("red11"); // remove red color
            $("#mail1").addClass("green11"); // add green color
            msgbox.html('<img src="img/yes.png"> <font color="Green"> Available </font>');
          }
          else
          {
            // if you don't want background color remove these following two lines
            $("#mail1").removeClass("green11"); // remove green color
            $("#mail1").addClass("red11"); // add red  color
            msgbox.html(msg);
          }
        });
      }
    });
  });
});
</script>
<script type="text/javascript">
$(document).ready(function()
{
  $("#repassword").change(function()
  {
    var pass1 = $("#password").val();
    var pass2 = $("#repassword").val();
    var msgbox = $("#status2");

    $("#status2").html('<img src="img/loader.gif">&nbsp;Checking availability.');

    $.ajax({
      type: "POST",
      url: "check_ajax",
      data: "pass1="+ pass1 +"&pass2="+ pass2,
      success: function(msg){
        $("#status2").html(function(event, request){
          if(msg == 'OK')
          {
            $("#repassword").removeClass("red11"); // remove red color
            $("#repassword").addClass("green11"); // add green color
            msgbox.html('<img src="img/yes.png"> <font color="Green"> Matched Password </font>');
          }
          else
          {
            // if you don't want background color remove these following two lines
            $("#repassword").removeClass("green11"); // remove green color
            $("#repassword").addClass("red11"); // add red  color
            msgbox.html(msg);
          }
        });
      }
    });
  });
});
</script>
<link rel="stylesheet" href="docsupport/style.css">
<link rel="stylesheet" href="docsupport/prism.css">
<link rel="stylesheet" href="chosen.css">
<style type="text/css" media="all">
/* fix rtl for demo */
.chosen-rtl .chosen-drop { left: -9000px; }
</style>
<style>

.fstElement { font-size: 1.2em; }
.fstToggleBtn { min-width: 16.5em; }

.submitBtn { display: none; }

.fstMultipleMode { display: block; }
.fstMultipleMode .fstControls { width: 100%; }

#status1
{
font-size:11px;
margin-left:10px;
}
#status2
{
font-size:11px;
margin-left:310px;
}
.green11
{
background-color:#CEFFCE;
}
.red11
{
background-color:#FFD9D9;
}
</style>
<style>
.warning {
  color:#000;
  padding:5px;
  width:100%;
  display:none;
}
</style>
<section id="contact" class="" style="padding: 139px 0 1500px;">
  <div class="container">
    <div class="row">

      <h2 class="text-center flo">Update Profile</h2>
        <div class="full-form" style=" margin-top: 57px;">
          <div class="bor-1">
            <div class="tab-content">
              <div id="home" class="tab-pane fade in active">
                <div class="form-menu bor">
                  <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" >

                    <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Name*</label>
                    <div class="col-sm-9">
                      <input id="firstName" required placeholder="Full Name" name="fname" class="form-control keyup-char" autofocus="" type="text" value="<?php echo $row['fname'];?>">
                      <span class="warning">characters only.</span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                      <?php echo $row['email']; ?>
                      <span id="status1"></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label"></label>
                    <div class="col-sm-9">
                      <label for="firstName" class=" control-label">User Name</label>
                      <?php echo $row['l_name']; ?>
                    </div>
                  </div>

                <div class="form-group">
                  <label for="firstName"  class="col-sm-3 control-label">Mobile phone</label>
                  <div class="col-sm-9">
                    <input id="mob" maxlength="10" placeholder="Mobile phone" class="form-control" autofocus="" name="mob" type="text" value="<?php echo $row['mob'];?>">
                      <span id="errmsg"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="firstName" class="col-sm-3 control-label">Office phone</label>
                  <div class="col-sm-9">
                    <input id="mob2"  placeholder="Office phone" maxlength="10" class="form-control" autofocus=""  name="off_phone" type="text" value="<?php echo $row['off_phone'];?>">
                    <span id="errmsg2"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="firstName" class="col-sm-3 control-label">Other phone</label>
                  <div class="col-sm-9">
                    <input id="mob3"  placeholder="Other phone" maxlength="10" class="form-control" autofocus="" name="o_phone" type="text" value="<?php echo $row['o_phone'];?>">
                    <span id="errmsg3"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="firstName" class="col-sm-3 control-label">Skype</label>
                  <div class="col-sm-9">
                    <input id="Skype"  name="skype" placeholder="Skype" class="form-control" autofocus="" type="text" value="<?php echo $row['skype'];?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="firstName" class="col-sm-3 control-label">Facebook</label>
                  <div class="col-sm-9">
                    <input id="Face-book"  name="facebook" placeholder="Face-book" class="form-control" autofocus="" type="text" value="<?php echo $row['facebook'];?>">
                  </div>
                </div>

                <div class="form-group col-sm-12">
                  <label class="control-label col-sm-3 pada">Address*</label>
                  <div class="col-sm-3">
                    <div class="inpu">
                      <input id="Street" placeholder="Street" required class="form-control" autofocus="" name="street" type="text" value="<?php echo $row['street'];?>">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="inpu">
                      <input id="City" name="city" required placeholder="City" class="form-control" autofocus="" type="text" value="<?php echo $row['city'];?>">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="inpu">
                      <input id="Zip" placeholder="Zip" required name="zip" class="form-control" autofocus="" type="text" value="<?php echo $row['zip'];?>">
                    </div>
                  </div>
                  <div class="col-sm-3">
                  </div>
                  <div class="col-sm-3">
                    <div class="mar">
                    

                      <select data-placeholder="Select State" class="chosen-select" name="state[]" multiple style="width:350px;" tabindex="4">
                        <?php
                        $state = explode('::', $row['state']);
                        foreach($state1 as $st){
                          if(in_array($state, $state1))
                          {
                        ?>
                            <option value="<?php echo $st; ?>" selected><?php echo ucfirst($st); ?></option>
                          <?php }
                          else { ?>
                            <option value="<?php echo $st; ?>"><?php echo ucfirst($st); ?></option>
                      <?php }} ?>
                      </select>
                    </div>
                  </div>
                  <script type="text/javascript">
                    var config = {
                      '.chosen-select'           : {},
                      '.chosen-select-deselect'  : {allow_single_deselect:true},
                      '.chosen-select-no-single' : {disable_search_threshold:10},
                      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
                      '.chosen-select-width'     : {width:"95%"}
                    }
                    for (var selector in config) {
                      $(selector).chosen(config[selector]);
                    }
                  </script>
                </div>

                <div class="form-group">
                  <label for="firstName"  class="col-sm-3 control-label"> Birth Date*</label>
                  <div class="col-sm-4">
                    <input id="dateofplay" name="dob" placeholder=" Birth Date" class="form-control" autofocus="" type="text" value="<?php echo $row['dob'];?>">
                  </div>
                  <div class="col-sm-5">
                    <input id="Citizenship" name="citizenship" placeholder="Citizenship" class="form-control" autofocus="" type="text" value="<?php echo $row['citizenship'];?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="firstName" class="col-sm-3 control-label">Photo</label>
                  <div class="col-sm-3">
                    <input id="pic" name="pic" class="custom-file-input" autofocus="" type="file">
                  </div>
                </div>

                <!-- Interest -->
                <div class="form-group">
                  <label class="control-label col-sm-3">Interest</label>
                  <div class="col-sm-9">
                    <div class="row">
                      <?php
                      foreach($pub_filter_lbl as $filter_type => $filter_lbl) {
                        foreach($filter_lbl as $lbl) {
                          $interests = explode('::', $row[$filter_type]);
                          echo '<div class="col-sm-4">
                            <label class="radio-inline">';
                          if(in_array($lbl, $interests)) {
                            echo '<input name="'.$filter_type.'[]" value="'.$lbl.'" type="checkbox" checked>';
                          } else {
                            echo '<input name="'.$filter_type.'[]" value="'.$lbl.'" type="checkbox">';
                          }
                          echo '<span class="mat">'.$lbl.'</span>
                        </label>
                        </div>';
                        }
                      } ?>
                    </div>
                  </div>
                </div>
                <!-- Purpose -->
                <div class="form-group">
                  <label class="control-label col-sm-3">Purpose</label>
                  <div class="col-sm-9">
                    <div class="row">
                      <?php $purposes = explode('::', $row['purpose']);
                      foreach($member_purpose as $purpose) {
                        echo '<div class="col-sm-4">
                          <label class="radio-inline">';
                        if(in_array($purpose, $purposes)) {
                            echo '<input name="purpose[]" value="'.$purpose.'" type="checkbox" checked>';
                          } else {
                            echo '<input name="purpose[]" value="'.$purpose.'" type="checkbox">';
                          }
                          echo '<span class="mat">'.$purpose.'</span>
                        </label>
                        </div>';
                      } ?>
                    </div>
                  </div>
                </div>

                <div class="form-group col-sm-12 margngh">
                  <div class="col-sm-2 ">
                    <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-block">
                  </div>
                </div>

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
<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/themes/cupertino/jquery-ui.css">

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
<script>
$( "#dateofplay" ).datepicker({
  altField: "#alternate1",
  altFormat: "DD, d MM, yy",
  showWeek: true,
  changeMonth: true,
  changeYear: true,
  yearRange: "-97:+0",
});
</script>
<!-- map end -->
<?php include('include/footer.php');?>
