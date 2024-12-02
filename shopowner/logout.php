<?php
session_start();
session_destroy();
header('Location:../index.php');


//note: for logout only one page is enough
?>

