<?php
include('include/config.php');

$output = '';
if(isset($_POST["search"]))
{
  $search = mysqli_real_escape_string($connect, $_POST["search"]);
  /* $query = "
    SELECT * FROM  `pro_democracy`  
    WHERE `name` LIKE '%".$search."%'
    OR Address LIKE '%".$search."%' 
    OR City LIKE '%".$search."%' 
    OR PostalCode LIKE '%".$search."%' 
    OR Country LIKE '%".$search."%'
  ";*/
  $sql = " SELECT * FROM  `pro_democracy`  
    WHERE `name` LIKE '%$search%' ";
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
    $output .= $row["name"];
  }
  echo $output;
}
else
{
  echo 'Data Not Found';
}
?>