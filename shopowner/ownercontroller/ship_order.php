<?php 

include '../../config.php';

$admin = new Admin();

if (!isset($_SESSION['owner_id'])) {
	header("location:../login_front.php");
}

$s_variable =$_SESSION['owner_id'];


?>

<?php
//ship proudct------------------------------------------------------------------
if(isset($_GET['order_id'])){ 
    
    $id = $_GET['order_id'];

    $status ='shipped';

$query=$admin->cud("UPDATE `orders` SET `order_status`='$status'  WHERE orders.order_id='$id' ","updated successfully"); 

echo "<script>alert('order is shipped');window.location.href='../orderview.php';</script>";
}
?>