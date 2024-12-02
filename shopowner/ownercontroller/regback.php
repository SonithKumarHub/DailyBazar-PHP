<?php

include '../../config.php';

$admin = new Admin();


if(isset($_POST['register'])){

$ownername = $_POST['ownername'];
$username = $_POST['username'];
$password = $_POST['password'];
$shopname = $_POST['shopname'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$status ='pending';
$location_id=$_POST['location_id'];

$imagetargetfolder ='../shopownerupload/';  //give upload path
$imagename=$imagetargetfolder.basename($_FILES["image"]["name"]); 
move_uploaded_file($_FILES["image"]["tmp_name"],$imagename); 

$query=$admin->cud("INSERT INTO `shopowner` (`owner_name`,`username`,`password`,`shop_name`,`email`,`contact`,`imagedb`,`status`,`location_id`) VALUES('$ownername','$username','$password','$shopname','$email','$contact','$imagename','$status','$location_id')","saved");

}


echo "<script>alert('registration successful..wait for approval'); window.location.href='../../index.php';</script>"


?>

