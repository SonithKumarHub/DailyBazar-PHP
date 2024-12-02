<?php 

include '../../config.php';

$admin = new Admin();


//----------showing order table
if(isset($_POST['view_report'])){ 

	$start_date = $_POST['start_date']; 

	$end_date = $_POST['end_date']; 

$query=$admin->ret("SELECT * FROM `orders` WHERE `date` BETWEEN $start_date AND $end_date");
while($row=$query->fetch(PDO::FETCH_ASSOC)){

// Table
}
}          
?>