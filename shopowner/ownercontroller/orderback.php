<?php 

include '../../config.php';

$admin = new Admin();

if (!isset($_SESSION['cid'])) {
	header("location:../login_front.php");
}

$s_variable =$_SESSION['cid'];



//when customer pressing checkout
if(isset($_POST['place_order'])){  

	// $id =$_GET['customerid']; 
	
	$query=$admin->ret("SELECT * FROM `cart` WHERE `cid_f`='$s_variable' ");
	//echo $query->rowCount();
	while($row=$query->fetch(PDO::FETCH_ASSOC))
		{
		$cartid_f=$row['cart_id'];
		$name_f=$row['name_f'];
		$cid_f= $row['cid_f'];
		$total_f= $row['total'];
		
		$quantity =$row['quantity'];

		$product_ido =$row['pid_f'];

		$status ='pending';

		$owner_id=$row['owner_id'];


		$query1=$admin->cud("INSERT INTO `orders`(`cartid_f`,`cid_f`,`name_f`,`total_f`,`quantity`,`date`,`order_status`,`owner_id`,`product_ido`) VALUES('$cartid_f','$cid_f','$name_f','$total_f','$quantity',CURDATE(),'$status','$owner_id','$product_ido')","saved");

		$query2=$admin->cud("DELETE FROM `cart` where `cart_id`='$cartid_f' ","Deleted successfully");
		//IMPORTANT : here give query1, don't give same name as query

	}
	
		echo "<script>alert('inserted to order'); window.location.href='../../customer/your_orders.php';</script>";
		
	}
       
?>


<?php
//ship proudct------------------------------------------------------------------
if(isset($_GET['order_id'])){ 
    
    $id = $_GET['order_id'];

    $status ='shipped';

$query=$admin->cud("UPDATE `orders` SET `order_status`='$status'  WHERE orders.order_id='$id' ","updated successfully"); 

echo "<script>alert('updated');window.location.href='../orderview.php';</script>";
}
?>

<?php 
//----------delete cart items
if(isset($_GET['cartid'])) 
{
$id=$_GET['cartid'];

$query=$admin -> cud("DELETE FROM `cart` WHERE `cart_id`=".$id,"deleted");
echo "<script>alert('deleted successfully'); window.location.href='../../cart.php';</script>";
}
?>



