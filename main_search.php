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
 $sql = " SELECT `name`,`pro_id` FROM  `pro_democracy`  
  WHERE `name` LIKE '$search%' order by name asc";
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
<div class="show" align="left">
<span class="name"><?php echo $final_username; ?></span>&nbsp;<br/><br/>
</div></a>
<?php

 }
 
}
else
{
 echo 'Data Not Found';
}

?>