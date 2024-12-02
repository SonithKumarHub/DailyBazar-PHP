<?php 

include '../../config.php';

$admin = new Admin();

if(isset($_GET['cancel_order'])){  //del id is href variable

$id =$_GET['cancel_order']; 

$status='order_cancelled';

$query=$admin->cud("UPDATE `orders` SET `order_status`='$status' WHERE `order_id`=".$id,"updated successfully"); 

echo "<script>alert('order cencelled successfully'); window.location.href='../orderview.php';</script>";
}
?>