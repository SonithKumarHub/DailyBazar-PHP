<?php 

include '../../config.php';

$admin = new Admin();

//customer feedback
if(isset($_POST['feedsubmit'])){ 

  $cid = $_POST['cid'];

  $cname = $_POST['cname'];

  $message = $_POST['message']; 

$query=$admin->cud("INSERT INTO `feedback`(`cid`,`cname`,`message`) VALUES('$cid','$cname','$message')","saved");
echo "<script>alert('Thank you for your feedback');window.location.href='../../index.php';</script>";
}          
?>
