<?php
include 'config.php';

$admin =new Admin();


//if (!isset($_SESSION['cid'])) {
//	header("location:customer/loginfront.php");
//}

//$s_variable =$_SESSION['cid'];

?>

<!--header starts -->
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">Daily Bazar</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>

			  <li class="nav-item"><a href="products.php" class="nav-link">Products</a></li>

			  <li class="nav-item"><a href="cart.php" class="nav-link">cart</a></li>

			  <li class="nav-item"><a href="customer\your_orders.php" class="nav-link">Order status</a></li>


			
	


<!-- login logout session -->
<?php if(isset($_SESSION['cid'])){
		$s_variable = $_SESSION['cid'];?>

	<li class="nav-item"><a href="customer/logout.php" class="nav-link" onclick="return confirm('Are you sure you want to delete?');">Customer Logout</a></li>
<?php } else {?>
	<li class="nav-item"><a href="customer/loginfront.php" class="nav-link">Customer Login</a></li>
	


	<li class="nav-item"><a href="shopowner/loginfront.php" class="nav-link">Shop Owner</a></li>
	<li class="nav-item"><a href="admin/Adminindex.php" class="nav-link">Admin</a></li>
<?php } ?>
						


	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- header ends -->