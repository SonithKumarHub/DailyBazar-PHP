<?php 

include '../../config.php';

$admin = new Admin();


//create/insert------------------------------------------------------------------
if(isset($_GET['customerid'])){ 

	 $id= $_GET['customerid'];

	

	$query=$admin->ret("SELECT * from `orders` where `cid_f`=".$id);
	while($row=$query->fetch(PDO::FETCH_ASSOC)){

	$cid_f = $row['cid_f']; 

	$orderid_f =$row['order_id']; 

	$totalprice = $row['total_f'];

	$status ='pending';

$query1=$admin->cud("INSERT INTO `payment`(`cid_f`,`orderid_f`,`totalprice`,`date`,`status`) VALUES('$cid_f','$orderid_f','$totalprice',now(),'$status')","saved");
}
echo "<script>alert('inserted successfully');window.location.href='../../cart.php';</script>";
}          
?>



