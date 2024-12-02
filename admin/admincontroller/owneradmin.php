<?php 

include '../../config.php';

$admin = new Admin();

//note: if(isset) is given to execute particular echo, if is not present always first echo executed

if(isset($_GET['myownerid']))
{
$oid = $_GET['myownerid']; //['mycid'] from managecutomer.php variable

$query=$admin->cud("UPDATE `shopowner` SET `status`='approved' WHERE shopowner.owner_id=".$oid,"approved");

echo "<script>alert('approved'); window.location.href='../manageowners.php';</script>";
}
?>

<?php 
//delete
if(isset($_GET['delownerid'])) 
{
  
  $id=$_GET['delownerid'];
  $stmt=$admin -> cud("DELETE FROM `shopowner` WHERE `owner_id`=".$id,"deleted");
  echo "<script>alert('deleted successfully'); window.location.href='../manageowners.php';</script>";
}
?>