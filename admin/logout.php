<?php
session_start();
session_destroy();
// header('Location:../index.php');
echo "<script>alert('logout is successfull');window.location.href='../index.php';</script>";
//note: for logout only one page is enough
?>

