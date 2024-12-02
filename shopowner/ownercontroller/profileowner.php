<?php 

include '../../config.php';

$admin = new Admin();
?>


<?php
//update------------------------------------------------------------------
if(isset($_POST['update'])){ 

    $owner_id = $_POST['owner_id']; //['lid'] is <input tag name=""

	$owner_name = $_POST['owner_name']; 

	$username = $_POST['username']; 

    $password = $_POST['password'];

    $shop_name = $_POST['shop_name'];

    $email = $_POST['email'];

    $contact = $_POST['contact'];

    $imagename =$_POST['img']; //old image

    echo $location_id =$_POST['location_id'];

    //new image
    if(is_uploaded_file($_FILES["image"]["tmp_name"])){
        $imagetargetfolder ='../shopownerupload/'; 
        $imagename=$imagetargetfolder.basename($_FILES["image"]["name"]); //['image'] HTML tag input imagedb name
        move_uploaded_file($_FILES["image"]["tmp_name"],$imagename); 
    }

$query=$admin->cud("UPDATE `shopowner` SET `owner_name`='$owner_name', `username`='$username', `password`='$password', `shop_name`='$shop_name', `email`='$email', `contact`='$contact' ,`imagedb`='$imagename',`location_id`='$location_id' WHERE shopowner.owner_id='$owner_id' ","updated successfully"); 

$query_product=$admin->cud("UPDATE `product` SET `location_id`='$location_id',`shop_name`='$shop_name' WHERE product.owner_pid='$owner_id' ","updated successfully"); 

echo "<script>alert('updated');window.location.href='../profilemanage.php';</script>";
}
?>

<?php
//delete------------------------------------------------------------------
if(isset($_GET['delid'])){  //del id is href variable

$lid =$_GET['delid']; 

$query=$admin->cud("DELETE FROM `shopowner` where `owner_id`=".$lid,"Deleted successfully");

$query_product=$admin->cud("DELETE FROM `product` where `owner_pid`=".$lid,"Deleted successfully");

echo "<script>alert('Account deleted successfully'); window.location.href='../../index.php';</script>";
}
?>