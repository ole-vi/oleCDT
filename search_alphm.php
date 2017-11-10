<?php
include('include/config.php');
include('include/constants.php');

$output = '';
$sql = '';
$search = 'ALL';
if(isset($_POST["search"]))
{
  $search =$_POST["search"];
}
if($search=='ALL')
{
  $sql = " SELECT * FROM  `tbl_individual_member`  ORDER BY fname ASC ";
}
else{
  $sql = " SELECT * FROM  `tbl_individual_member` 
  WHERE `fname` LIKE '$search%' ORDER BY fname ASC ";
}

$query = $conn->prepare($sql);
$query->execute();
$count = $query->rowCount();

if($count > 0)
{
  while($row = $query->fetch(PDO::FETCH_ASSOC))
  {
 
    $username=$row['fname'];
    $id=$row['id'];
    $b_username='<strong>'.$search.'</strong>';
    //$b_email='<strong>'.$q.'</strong>';
    $final_username = str_ireplace($search, $b_username, $username);
    //$final_email = str_ireplace($q, $b_email, $email);
    ?>
    <a href="<?php echo $site_url;?>bio?id=<?php echo base64_encode($id);?>">

      <div class="col-sm-12 no-background">
        <div class="col-sm-3 na-color">
          <div class="texippo">
            <p><?php echo $row['fname'];?></p>
          </div>
        </div>
        <div class="col-sm-9">
          <?php foreach($pub_filter_lbl as $filter_type => $filter_lbl) {
            foreach($filter_lbl as $k => $lbl) { ?>
              <div class="box-po">
                <div class="btn-group <?php echo 'koi-po-'.$pub_filter_group[$filter_type] ?>" data-toggle="buttons">
                  <?php if(in_array($lbl, explode('::', $row[$filter_type]))) { ?>
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
  <?php } ?>
  <a href="<?php echo $site_url;?>members" class="lastupdate1">Return to Directory</a>
<?php }
else
{
  echo 'Data Not Found';
  ?>
  <a href="<?php echo $site_url;?>members" class="lastupdate1">Return to Directory</a>
<?php
}
?>
