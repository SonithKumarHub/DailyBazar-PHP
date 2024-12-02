<?php 

include '../../config.php';

$admin = new Admin();

if (!isset($_SESSION['cid'])) {
	header("location:../login_front.php");
}

$s_variable =$_SESSION['cid'];



//when customer pressing checkout
if(isset($_POST['place_order'])){  
	
	$query=$admin->ret("SELECT * FROM `cart` WHERE `cid_f`='$s_variable' ");
	while($row=$query->fetch(PDO::FETCH_ASSOC))
		{
		$cartid_f=$row['cart_id'];
		$name_f=$row['name_f'];
		$cid_f= $row['cid_f'];
		$total_f= $row['total'];
		
		$quantity =$row['quantity'];

		$status ='pending';

		$owner_id=$row['owner_id'];


		$query1=$admin->cud("INSERT INTO `orders` (`cartid_f`,`cid_f`,`name_f`,`total_f`,`quantity`,`date`,`status`,`owner_id`) VALUES('$cartid_f','$cid_f','$name_f','$total_f','$quantity',CURDATE(),'$status','$owner_id')","saved");
		//IMPORTANT : here give query1, don't give same name as query

	}
		//$query=$admin->cud("DELETE FROM `cart` where `cart_id`=".$id,"Deleted successfully");
		echo "<script>alert('your order is successfull'); window.location.href='../../customer/your_orders.php';</script>";
		
	}

?>

<?php
//delete------------------------------------------------------------------
if(isset($_GET['delete_order_id'])){  //del id is href variable

$order_id =$_GET['delete_order_id']; 

$query=$admin->cud("DELETE FROM `orders` where `order_id`='$order_id' ","Deleted successfully");

echo "<script>alert('cancelled your order'); window.location.href='../../customer/your_orders.php';</script>";
}
?>