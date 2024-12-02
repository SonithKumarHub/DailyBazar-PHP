<?php 

include '../../config.php';

$admin = new Admin();


//create/insert------------------------------------------------------------------
if(isset($_POST['create_category'])){ 

	$category_name = $_POST['category_name']; 

$query=$admin->cud("INSERT INTO `category`(`category_name`) VALUES('$category_name')","saved");

echo "<script>alert('inserted successfully');window.location.href='../category_manage.php';</script>";
}          
?>

<?php
//update------------------------------------------------------------------
if(isset($_POST['update_category'])){ 

    $category_id = $_POST['category_id']; //['lid'] is <input tag name=""

	$category_name = $_POST['category_name']; 


$query=$admin->cud("UPDATE `category` SET `category_name`='$category_name' WHERE category.category_id='$category_id' ","updated successfully"); 

echo "<script>alert('updated');window.location.href='../category_manage.php';</script>";
}
?>

<?php
//delete------------------------------------------------------------------
if(isset($_GET['delete_category'])){  //del id is href variable

$category_id =$_GET['delete_category']; 

$query=$admin->cud("DELETE FROM `category` where `category_id`=".$category_id,"Deleted successfully");

echo "<script>alert('deleted'); window.location.href='../category_manage.php';</script>";
}
?>