<?php 

include '../../config.php';

$admin = new Admin();


//create/insert------------------------------------------------------------------
if(isset($_POST['insert'])){ 
	$location_name = $_POST['location_name']; 

	$location_pincode = $_POST['location_pincode']; 

$query=$admin->cud("INSERT INTO `locations`(`location_name`,`location_pincode`) VALUES('$location_name','$location_pincode')","saved");

echo "<script>alert('inserted successfully');window.location.href='../locationsmain.php';</script>";
}          
?>

<?php
//update------------------------------------------------------------------
if(isset($_POST['update'])){ 

    $hidden_id = $_POST['location_id']; //['lid'] is <input tag name=""

	$location_name = $_POST['location_name']; 

	$location_pincode = $_POST['location_pincode']; 


$query=$admin->cud("UPDATE `locations` SET `location_name`='$location_name', `location_pincode`='$location_pincode' WHERE locations.location_id='$hidden_id' ","updated successfully"); 

echo "<script>alert('updated');window.location.href='../locationsmain.php';</script>";
}
?>

<?php
//delete------------------------------------------------------------------
if(isset($_GET['delid'])){  //del id is href variable

$lid =$_GET['delid']; 

$query=$admin->cud("DELETE FROM `locations` where `location_id`=".$lid,"Deleted successfully");

echo "<script>alert('deleted'); window.location.href='../locationsmain.php';</script>";
}
?>