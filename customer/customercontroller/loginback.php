<?php

include '../../config.php';

$admin = new Admin();


if(isset($_POST['login'])){

	$username = $_POST['username'];

	$password = $_POST['password'];

	$query=$admin->ret("SELECT * FROM `customer` WHERE `username`='$username' AND `password`='$password' ");


//couting row
	$num=$query->rowCount();

	if($num>0){
		$row=$query->fetch(PDO::FETCH_ASSOC);

		$id =$row['cid'];
		$_SESSION['cid']=$id; //used to uniquely identify user session. use this in user pages

		echo "<script>alert('login successful'); window.location.href='../../products.php';</script>";

	}


	else
	{
		echo "<script>alert('unsuccessful..try again..! or wait for approval'); window.location.href='../../index.php';</script>";
	}
	
}

?>
