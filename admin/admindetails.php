<?php

include '../config.php';

$admin = new Admin();

$session_variable=$_SESSION['admin_id'];
$query=$admin->ret("SELECT * FROM `admin` WHERE `admin_id`=".$session_variable);
$row=$query->fetch(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>admin details</title>
</head>
<body>
    <h4>username:  <?php echo $row['username'] ?></h4> <!--user name is database column name-->

    <h4>password:  <?php echo $row['password'] ?></h4>
    
    
</body>
</html>

