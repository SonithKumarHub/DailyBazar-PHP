<?php 

include '../../config.php';

$admin = new Admin();


//create/insert------------------------------------------------------------------
if(isset($_POST['insert'])){ 

	$amount = $_POST['amount']; 

$query1=$admin->cud("INSERT INTO `owner_earning`(`amount`) VALUES('$amount')","saved");
}
echo "<script>alert('paid successfully');window.location.href='../payment_manage.php';</script>";         
?>
