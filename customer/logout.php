<?php
session_start();
session_destroy();
//header('Location:./');
echo "<script>alert('you are logged out'); window.location.href='../index.php';</script>";

//note: for logout only one page is enough
?>



