<?php
include('include/config.php');

$output = '';
if(isset($_POST["search"]))
{
  $search =$_POST["search"];

/* $query = "
  SELECT * FROM  `pro_democracy`  
  WHERE `name` LIKE '%".$search."%'
  OR Address LIKE '%".$search."%' 
  OR City LIKE '%".$search."%' 
  OR PostalCode LIKE '%".$search."%' 
  OR Country LIKE '%".$search."%'
 ";*/



 if($search=='ALL')
 {
	  $sql = " SELECT * FROM  `pro_democracy`  ORDER BY name ASC ";
 }
 else{
	 $sql = " SELECT * FROM  `pro_democracy`  
  WHERE `name` LIKE '$search%' ORDER BY name ASC ";
}
}
/*else
{
 $query = "
  SELECT * FROM tbl_customer ORDER BY CustomerID
 ";
}*/

$query = $conn->prepare($sql);
$query->execute();
$count = $query->rowCount();

if($count > 0)
{
 
 while($row = $query->fetch(PDO::FETCH_ASSOC))
 {
 
$username=$row['name'];
 $id=$row['pro_id'];
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
			<div class="box-po">
			<div class="btn-group koi-po" data-toggle="buttons">
			<?php if(in_array('Get Money out of Politics',$var)) { ?>
			<label class="btn btn-success  mao-po" style="   height: 30px;
    padding: 3px 5px;
    width: 40px;">
				
			</label>
			<?php } else {?>
			

			<label class="btn btn-success  mao-po" style="   height: 30px;
    padding: 3px 5px;
    width: 40px; background-color:#fff !  important;">
				
			</label>			
		
			<?php } ?>			
				

						
		
			
		</div>
			</div>
			<div class="box-po">
			<div class="btn-group koi-po" data-toggle="buttons">
			

			
	<?php if(in_array('Guarantee Voting Rights',$var)) { ?>
						<label class="btn btn-success  mao-po" style="   height: 30px;
    padding: 3px 5px;
    width: 40px;"> 
				
			</label>
			<?php } else {?>
			

			<label class="btn btn-success  mao-po" style="   height: 30px;
    padding: 3px 5px;
    width: 40px; background-color:#fff !  important;">
				
			</label>			
		
			<?php } ?>			
				
			
		</div>
			</div>

			<div class="box-po">
			 <div class="btn-group koi-po-1" data-toggle="buttons">
			
			
			
				<?php if(in_array('Advocate and Educate',$var)) { ?>
			<label class="btn btn-success ban" style="   height: 30px;
    padding: 3px 5px;
    width: 40px;">
				
			</label>
			<?php } else {?>
			

			<label class="btn btn-success  mao-po" style="   height: 30px;
    padding: 3px 5px;
    width: 40px; background-color:#fff !  important;">
				
			</label>			
		
			<?php } ?>	

						
		
						
				

						
		
			
		</div>
			</div>
			<div class="box-po">
			 <div class="btn-group koi-po-1" data-toggle="buttons">
			
			
			
			
		<?php if(in_array('Dig into Data',$var)) { ?>
		<label class="btn btn-success ban" style="   height: 30px;
    padding: 3px 5px;
    width: 40px;">
				
			</label>
			<?php } else {?>
			

			<label class="btn btn-success  mao-po" style="   height: 30px;
    padding: 3px 5px;
    width: 40px; background-color:#fff !  important;">
				
			</label>			
		
			<?php } ?>	
						
		
						
				

						
		
			
		</div>
			</div>
			<div class="box-po">
			
			 <div class="btn-group koi-po-1" data-toggle="buttons">
			
			
			
			<?php if(in_array('Take Legal Action',$var)) { ?>
		<label class="btn btn-success ban" style="   height: 30px;
    padding: 3px 5px;
    width: 40px;">
				
			</label>
			<?php } else {?>
			

			<label class="btn btn-success  mao-po" style="   height: 30px;
    padding: 3px 5px;
    width: 40px; background-color:#fff !  important;">
				
			</label>			
		
			<?php } ?>

						
		
						
				

						
		
			
		</div>
			
			</div>
			<div class="box-po">
			<div class="btn-group koi-po-1" data-toggle="buttons">
			
			
			
			

			<?php if(in_array('Activate Citizens',$var)) { ?>
		<label class="btn btn-success ban" style="   height: 30px;
    padding: 3px 5px;
    width: 40px;">
				
			</label>
			<?php } else {?>
			

			<label class="btn btn-success  mao-po" style="   height: 30px;
    padding: 3px 5px;
    width: 40px; background-color:#fff !  important;">
				
			</label>			
		
			<?php } ?>			
		
						
				

						
		
			
		</div>
			</div>
			<div class="box-po">
			<div class="btn-group koi-po-1" data-toggle="buttons">
			
			
			
			
		<?php if(in_array('Fund the Movement',$var)) { ?>
		<label class="btn btn-success ban" style="   height: 30px;
    padding: 3px 5px;
    width: 40px;">
				
			</label>
			<?php } else {?>
			

			<label class="btn btn-success  mao-po" style="   height: 30px;
    padding: 3px 5px;
    width: 40px; background-color:#fff !  important;">
				
			</label>			
		
			<?php } ?>
						
		
						
				

						
		
			
		</div>
			</div>
			<div class="box-po">
			 <div class="btn-group koi-po-1" data-toggle="buttons">
			
			<?php if(in_array('Political Action Committee',$var)) { ?>
		<label class="btn btn-success ban" style="   height: 30px;
    padding: 3px 5px;
    width: 40px;">
				
			</label>
			<?php } else {?>
			

			<label class="btn btn-success  mao-po" style="   height: 30px;
    padding: 3px 5px;
    width: 40px; background-color:#fff !  important;">
				
			</label>			
		
			<?php } ?>
			

						
		
						
				

						
		
			
		</div>
			</div>
			<div class="box-po">
			 <div class="btn-group koi-po-2" data-toggle="buttons">
			
			
			
			<?php if(in_array('Fund the Movement',$var)) { ?>
		<label class="btn btn-success ban" style="   height: 30px;
    padding: 3px 5px;
    width: 40px;">
				
			</label>
			<?php } else {?>
			

			<label class="btn btn-success  mao-po" style="   height: 30px;
    padding: 3px 5px;
    width: 40px; background-color:#fff !  important;">
				
			</label>			
		
			<?php } ?>
						

						
		
						
				

						
		
			
		</div>
			</div>
			<div class="box-po">
			 <div class="btn-group koi-po-3" data-toggle="buttons">
			
			
			
			
		<?php if(in_array('Fund the Movement',$var)) { ?>
		<label class="btn btn-success ban" style="   height: 30px;
    padding: 3px 5px;
    width: 40px;">
				
			</label>
			<?php } else {?>
			

			<label class="btn btn-success  mao-po" style="   height: 30px;
    padding: 3px 5px;
    width: 40px; background-color:#fff !  important;">
				
			</label>			
		
			<?php } ?>
						
		
						
				

						
		
			
		</div>
			</div>
			
		
			
			
			
			
			
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