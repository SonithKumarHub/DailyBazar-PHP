<?php 
include 'config.php';

$admin =new Admin();

if (!isset($_SESSION['cid'])) {
	header("location:customer/loginfront.php");
}

$s_variable =$_SESSION['cid'];
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Credit Card Checkout Form</title>
  <link rel='stylesheet' href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'><link rel="stylesheet" href="indexassets/creditcard/style.css">

</head>
<body>
<!-- partial:index.partial.html -->

<div class='card-checkout'>
  <div class='heading'>
    <h3>payment details</h3>
    <label>credit card information</label>
    <i class='icon ion-card'></i>
  </div>

  <div class='content'>
    <label>name on the card</label>
    <div class='input-group'>
      <input class='form-control' type='text'>
    </div>

    <label>card number</label>
    <div class='input-group'>
      <input class='form-control' type="text" max="16" min="16" placeholder="****************">
    </div>

    <label>expiration date</label>
    <div class='input-group'>
      <input class='form-control' type="text" placeholder="MM/YY">
    </div>
    
    <label>ccv/cvv</label>
    <div class='input-group'>
      <input class='form-control' type="text" placeholder="***">
    </div>
    
    <br>


<?php 
$query=$admin->ret("SELECT * FROM `orders` where `cid_f`=".$s_variable);
$roworder=$query->fetch(PDO::FETCH_ASSOC);
?>

<a href="admin\admincontroller\payment_back.php?upid=<?php echo $roworder['order_id'] ?>" class='button -primary'>Pay now</a>

  </div>
</div>
<!-- partial -->

<!-- payment code -->

</body>
</html>


