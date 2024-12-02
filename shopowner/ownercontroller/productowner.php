<?php

include '../../config.php';

$admin = new Admin();


//create/insert------------------------------------------------------------------
if (isset($_POST['insert'])) {

    $owner_id = $_POST['owner_id'];

    $location_id = $_POST['location_id'];

    $shop_name = $_POST['shop_name'];

    $name = $_POST['name'];

    $price = $_POST['price']; 

    $description = $_POST['description'];


    $category_idp = $_POST['category_idp'];

    //image
    $imagetargetfolder = '../shopownerupload/';
    $imagename = $imagetargetfolder . basename($_FILES["image"]["name"]); //['image'] is image nave in input tag
    move_uploaded_file($_FILES["image"]["tmp_name"], $imagename);

    $query = $admin->cud("INSERT INTO `product`(`name`,`price`,`description`,`imagedb`,`owner_pid`,`location_id`,`shop_name`,`category_idp`) VALUES('$name','$price','$description','$imagename','$owner_id','$location_id','$shop_name','$category_idp')", "saved");

    echo "<script>alert('inserted successfully');window.location.href='../productmanage.php';</script>";
}
?>

<?php
//update------------------------------------------------------------------
if (isset($_POST['update'])) {

    $pid = $_POST['pid'];

    $name = $_POST['name'];

    $price = $_POST['price'];

    $description = $_POST['description'];

    $imagename = $_POST['img']; //old image

    //new image
    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
        $imagetargetfolder = '../shopownerupload/';
        $imagename = $imagetargetfolder . basename($_FILES["image"]["name"]); //['image'] HTML tag input imagedb name
        move_uploaded_file($_FILES["image"]["tmp_name"], $imagename);
    }

    $query = $admin->cud("UPDATE `product` SET `name`='$name', `price`='$price', `description`='$description',`imagedb`='$imagename' WHERE product.pid='$pid' ", "updated successfully");

    echo "<script>alert('updated');window.location.href='../productmanage.php';</script>";
}
?>

<?php
//delete------------------------------------------------------------------
if (isset($_GET['delid'])) {  //del id is href variable

    $id = $_GET['delid'];

    $query = $admin->cud("DELETE FROM `product` where `pid`=" . $id, "Deleted successfully");

    echo "<script>alert('product deleted successfully'); window.location.href='../productmanage.php';</script>";
}
?>