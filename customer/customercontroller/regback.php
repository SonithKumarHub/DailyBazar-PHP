<?php

include '../../config.php';

$admin = new Admin();


if(isset($_POST['register'])){

$cname = $_POST['cname'];
$username = $_POST['username'];
$password = $_POST['password'];
$address = $_POST['address'];
$contact = $_POST['contact'];

//image
$imagetargetfolder ='../customerupload/'; 
$imagename=$imagetargetfolder.basename($_FILES["image"]["name"]); 
move_uploaded_file($_FILES["image"]["tmp_name"],$imagename); 


$query=$admin->cud("INSERT INTO `customer` (`cname`,`username`,`password`,`address`,`contact`,`imagedb`) VALUES('$cname','$username','$password','$address','$contact','$imagename')","saved");

}


echo "<script>alert('registration successful'); window.location.href='../loginfront.php';</script>"


?>
