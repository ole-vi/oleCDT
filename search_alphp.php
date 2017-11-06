<?php
include('include/config.php');

$output = '';
$sql = '';
$search = 'ALL';
if(isset($_POST["search"]))
{
  $search =$_POST["search"];
}
if($search=='ALL')
{
  $sql = " SELECT * FROM  `tbl_publishers`  ORDER BY name ASC ";
}
else{
  $sql = " SELECT * FROM  `tbl_publishers`  
  WHERE `name` LIKE '$search%' ORDER BY name ASC ";
}

$query = $conn->prepare($sql);
$query->execute();
$count = $query->rowCount();

if($count > 0)
{
  while($row = $query->fetch(PDO::FETCH_ASSOC))
  {
 
    $username=$row['name'];
    $id=$row['pub_id'];
    $b_username='<strong>'.$search.'</strong>';
    //$b_email='<strong>'.$q.'</strong>';
    $final_username = str_ireplace($search, $b_username, $username);
    //$final_email = str_ireplace($q, $b_email, $email);
    ?>
    <a href="<?php echo $site_url;?>detailpage/<?php echo base64_encode($id);?>">

      <div class="col-sm-12 no-background">
        <div class="col-sm-5 na-color">
          <div class="texippo">
            <p><?php echo $row['name'];?></p>
          </div>
        </div>
        <?php $var=array();
        $var= explode(',', $row['strategies']);
        ?>
        <div class="col-sm-7">
          <?php foreach($pub_filter_lbl as $filter_type => $filter_lbl) {
            foreach($filter_lbl as $k => $lbl) { ?>
              <div class="box-po">
                <div class="btn-group <?php echo 'koi-po-'.$pub_filter_group[$filter_type] ?>" data-toggle="buttons">
                  <?php if(in_array($lbl, explode('::', $row[$filter_type]))) { ?>
                    <label class="btn btn-success  mao-po" style="height: 30px;
                    padding: 3px 5px;
                    width: 40px;">
                    </label>
                  <?php } else { ?>
                    <label class="btn btn-success  mao-po" style="height: 30px;
                    padding: 3px 5px;
                    width: 40px; background-color:#fff !important;">
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
  <a href="<?php echo $site_url;?>searching" class="lastupdate1">Return to Directory</a>
<?php }
else
{
  echo 'Data Not Found';
  ?>
  <a href="<?php echo $site_url;?>searching" class="lastupdate1">Return to Directory</a>
<?php
}
?>
