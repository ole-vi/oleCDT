<?php 
ob_start();
session_start();
include('include/config.php');
include('include/constants.php');
include('include/header.php');

/*$value1 = isset($_SESSION['list']) ? $_SESSION['list'] : array();
$final = isset($_SESSION['final']) ? $_SESSION['final'] : array();*/
$filter_params = array();
$found = array();
foreach($pub_filter_group as $filter_type => $group_no) {
 $checkboxes[$filter_type] = $filter_params[$filter_type] = array();
}
$_SESSION['list'] = $checkboxes;
//print_r($_POST); exit;
if(isset($_POST['submit']))
{
  foreach($pub_filter_group as $filter_type => $group_no) {
   $checkboxes[$filter_type] = $filter_params[$filter_type] = isset($_POST[$filter_type]) ? $_POST[$filter_type] : array();
  }
  $sql1 = "SELECT * from `tbl_publishers` ";
  $query1 = $conn->prepare($sql1);
  $query1->execute();
  while($rowdata = $query1->fetch(PDO::FETCH_ASSOC))
  {
    $match = true;
    foreach($filter_params as $filter_type => $filter) {
      if(!empty($filter)) {
        $filter_data[$filter_type] = explode('::', $rowdata[$filter_type]);
        if($filter[0] != '...') {
          $var = array_intersect($filter, $filter_data[$filter_type]);
          if($var != $filter) $match = false;
        }
      }
    }
    if($match) $found[] = $rowdata['pub_id'];
  }
  $found = array_unique($found);
}
else
{
  $sql1 = "SELECT `pub_id` from `tbl_publishers` order by `name` ";
  $query1 = $conn->prepare($sql1);
  $query1->execute();
  $found = $query1->fetchAll(PDO::FETCH_COLUMN);
}
?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
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

  /* $("#mob").change(function()
  {
    var no = $("#mob").val();
    if(no.length!=10){
      //$("#errmsg").html("Ten Digits Only").show().fadeOut("slow"); 
      $("#errmsg").addClass("red11"); 
      msgbox.html("Ten Digits Only");
    }
  });*/
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

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<style>
#status1
{
  font-size:11px;
  margin-left:10px;
}
.green11
{
  background-color:#CEFFCE;
}
.red11
{
  background-color:#FFD9D9;
}

input.big {
  height: 2.5em;
  width: 2.5em;
}
</style>

<div class="menu-bar-fixed" id="" >
  <div class="col-sm-12 cdt-head">
    <h2 class="cdt-head-text">Collection Development Toolkit</h2>
    <div class="sdfr pull-right">
      <a href="resources"><button class="button btn-white" type="button">Resources</button></a>
      <a href="collections"><button class="button btn-white" type="button" >Collections</button></a>
      <button class="button btn-active">Publishers</button>
      <a href="members"><button class="button btn-white" type="button">Members</button></a>
    </div>
  </div>
  <div class="col-sm-12 ">
    <div class="ads fgh">
      <ul>
        <li class="select5" rel="A"><a href="#"> A</a> </li>   <li class="select5" rel="B"><a href="#"> B </a></li>  <li class="select5" rel="C"><a href="#"> C </a></li>  <li class="select5" rel="D"><a href="#"> D </a></li>  <li class="select5" rel="E"><a href="#"> E</a> </li> <li class="select5" rel="F"><a href="#"> F</a> </li>  <li class="select5" rel="G"><a href="#"> G </a></li>  <li class="select5" rel="H"><a href="#"> H </a></li>  <li class="select5" rel="I"><a href="#"> I </li>  <li class="select5" rel="J"><a href="#"> J </a></li>  <li class="select5" rel="K"><a href="#"> K </a></li>  <li class="select5" rel="L"><a href="#"> L </a></li>  <li class="select5" rel="M"><a href="#"> M </a></li>  <li class="select5" rel="N"><a href="#"> N </a></li>  <li class="select5" rel="O"><a href="#"> O </a></li>  <li class="select5" rel="P"><a href="#"> P </a></li>  <li class="select5" rel="Q"><a href="#"> Q </a></li>  <li class="select5" rel="R"><a href="#"> R </a></li>  <li class="select5" rel="S"><a href="#"> S </a></li>  <li class="select5" rel="T"><a href="#"> T </a></li>  <li class="select5" rel="U"><a href="#"> U </a></li> <li class="select5" rel="V"><a href="#"> V </a></li> <li class="select5" rel="W"><a href="#"> W </a></li> <li class="select5" rel="X"><a href="#"> X </a></li>  <li class="select5" rel="Y"><a href="#"> Y</a> </li> <li class="select5" rel="Z"><a href="#"> Z </a></li>
      </ul>
    </div>
  </div>

  <section id="contact" class=" background-uplod-2" style="padding: 112px 0 5%; margin-top:40px ! important;">
    <form method="post" action="">
      <div class="container">
        <div class="row">
        <div class="col-sm-12">
          <div class="col-sm-3">
            <h1 class="lok-lo">Publishers Directory (<?php echo count($found); ?>)</h1>
          </div>

          <div class="col-sm-9">
            <div class="lo-imh">
              <div style="overflow:hidden">
              <?php foreach($pub_filter_lbl as $filter_type => $filter_lbl) {
                foreach($filter_lbl as $lbl) {
                  echo '<div class="slant-filter"><h3 class="slant-group-'.$pub_filter_group[$filter_type].'">'.$lbl.'</h3></div>';
                }
              } ?>
              </div>
              <div class="io-poli" style="margin-top:-45px;">
                <form method="post">
                  <?php foreach($pub_filter_lbl as $filter_type => $filter_lbl) {
                    foreach($filter_lbl as $k => $lbl) { ?>
                      <div class="box-po">
                        <div class="btn-group <?php echo 'koi-po-'.$pub_filter_group[$filter_type];?>">
                          <label class="btn btn-success  mao-po" style="padding: 11px 12px !important; border:none;">
                            <input style="margin:0px; " type="checkbox" name="<?php echo $filter_type.'[]'; ?>" value="<?php echo $pub_filter[$filter_type][$k]; ?>"
                              <?php if(in_array($pub_filter[$filter_type][$k], $filter_params[$filter_type])) { ?> checked="checked"
                              style='background-color:#333; color:#FFF;' <?php } ?> >
                          </label>
                        </div>
                      </div>
                  <?php }
                  } ?>

                  <div class=" lo-po-12 " >
                    <?php if(isset($_SESSION['id']) && empty($_SESSION['publisher'])) { ?>
                    <a href="add_publisher">
                      <button type="button" class="button button2 btn-transparent"><i aria-hidden="true" style="margin-left: 0px;float: left;margin-top: 5px;" class="fa fa-plus"></i>&nbsp;Add
                      </button>
                    </a>
                    <?php } ?>
                    <button type="submit" name ="submit" class="button button2 btn-transparent"><i class="fa fa-arrow-left" aria-hidden="true" style='margin-left: 0px;float: left;margin-top: 4px;'></i>&nbsp;Filter
                    </button>
                    <button class="button button2 btn-transparent"><i class="fa fa-refresh" aria-hidden="true" style='margin-left: 0px;float: left;margin-top: 4px;'></i>&nbsp;Reset</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </section>
</div>

<section  class=" full-mart-div" style="padding: 5px 0 5%">
  <div class="container">
    <div class="row">

      <div class="maty-op" id="masterdiv">
        <?php
        foreach($found as $id)
        {
          $sql = "SELECT * from `tbl_publishers` where `pub_id`='".$id."' ";
          $query = $conn->prepare($sql);
          //$query->bindParam(':email', $email, PDO::PARAM_STR);
          $query->execute();
          $row = $query->fetchAll(PDO::FETCH_ASSOC);

          foreach ($row as $row) { ?>
            <a href="detailpage?id=<?php echo base64_encode($row['pub_id']);?>">
              <div class="col-sm-12 no-background" >
                <div class="col-sm-3 na-color">
                  <div class="texippo">
                    <p><?php echo $row['name'];?></p>
                  </div>
                </div>
                <div class="col-sm-9">
                  <?php foreach($pub_filter_lbl as $filter_type => $filter_lbl) {
                    foreach($filter_lbl as $k => $lbl) { ?>
                      <div class="box-po">
                        <div class="btn-group <?php echo 'koi-po-'.$pub_filter_group[$filter_type] ?>" data-toggle="buttons">
                          <?php if($pub_filter[$filter_type][$k] == '...' || in_array($lbl, explode('::', $row[$filter_type]))) { ?>
                            <label class="btn btn-success  mao-po" style="padding: 3px 11px !important;
                            margin-left: 15px;
                            margin-right: 15px;">&nbsp;
                            </label>
                          <?php } else { ?>
                            <label class="btn btn-success  mao-po" style="padding: 3px 11px !important;
                            margin-left: 15px;
                            margin-right: 15px;
                            background-color: #fff !important;">&nbsp;
                            </label>
                          <?php } ?>
                        </div>
                      </div>
                    <?php }
                  } ?>
                </div>
              </div>
            </a>

        <?php } }?>
        <?php if(isset($_POST['submit'])) {?>
          <a href="<?php echo $site_url;?>searching" class="lastupdate1">Return to Directory</a>
        <?php } ?>
      </div>
      <div id="result1" class="maty-op"></div>

    </div>
  </div>
</section>
<!-- contact end -->

<!-- map start --> 
<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/themes/cupertino/jquery-ui.css">

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
<script>
$(document).ready(function(){
  $('.select5').on('click',function(){
    var search = $(this).attr("rel");
    //alert(search);
    {
      $.ajax({
        type: "POST",
        url: "search_alphp",
        data: "search=" + search,
        success:function(html){
          $('#masterdiv').remove();
          //$('#masterdiv div').html('');
          $('#result1').html(html);
         }
      });
    }
  })
});
</script>
<!-- map end -->

<?php include('include/footer.php');?>
