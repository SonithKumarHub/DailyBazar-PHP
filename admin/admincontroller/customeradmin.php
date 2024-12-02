<?php 

include '../../config.php';

$admin = new Admin();

if(isset($_GET['mycid']))
{
$cid = $_GET['mycid']; //['mycid'] from managecutomer.php variable

$query=$admin->cud("UPDATE `customer` SET `status`='approved' WHERE customer.cid=".$cid,"approved");

echo "<script>alert('approved'); window.location.href='../managecustomer.php';</script>";
}
?>

<?php 
//delete
if(isset($_GET['delcid'])) 
{
$id=$_GET['delcid'];
$query=$admin -> cud("DELETE FROM `customer` WHERE `cid`=".$id,"deleted");
echo "<script>alert('deleted successfully'); window.location.href='../managecustomer.php';</script>";
}
?>