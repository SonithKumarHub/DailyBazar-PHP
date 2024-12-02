
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>index page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="indexassets/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="indexassets/css/animate.css">
    
    <link rel="stylesheet" href="indexassets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="indexassets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="indexassets/css/magnific-popup.css">

    <link rel="stylesheet" href="indexassets/css/aos.css">

    <link rel="stylesheet" href="indexassets/css/ionicons.min.css">

    <link rel="stylesheet" href="indexassets/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="indexassets/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="indexassets/css/flaticon.css">
    <link rel="stylesheet" href="indexassets/css/icomoon.css">
    <link rel="stylesheet" href="indexassets/css/style.css">

    <!-- electro theme headtags starts -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Electro - HTML Ecommerce Template</title>

 		<!-- Google font -->
 		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

 		<!-- Bootstrap -->
 		<link type="text/css" rel="stylesheet" href="indexassets/elctro_theme/css/bootstrap.min.css"/>

 		<!-- Slick -->
 		<link type="text/css" rel="stylesheet" href="indexassets/elctro_theme/css/slick.css"/>
 		<link type="text/css" rel="stylesheet" href="indexassets/elctro_theme/css/slick-theme.css"/>

 		<!-- nouislider -->
 		<link type="text/css" rel="stylesheet" href="indexassets/elctro_theme/css/nouislider.min.css"/>

 		<!-- Font Awesome Icon -->
 		<link rel="stylesheet" href="css/font-awesome.min.css">

 		<!-- Custom stlylesheet -->
 		<link type="text/css" rel="stylesheet" href="indexassets/elctro_theme/css/style.css"/>
        <!-- electro theme headtags ends -->

  </head>
  <body class="goto-here">

  <?php include '1header.php' ?>

  <!-- MAIN CONTENT STARTS ---->

  <?php
$admin =new Admin();

?>

<?php if(isset($_GET['productid'])){ //🟥if condition
	$id=$_GET['productid'];
  $query=$admin->ret("SELECT * from `product` where `pid`='$id' ");
$prow=$query->fetch(PDO::FETCH_ASSOC);
?>

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
							<div class="product-preview">
                                <!-- main product image -->
                                <img src="shopowner\shopownerupload/<?php echo $prow['imagedb'] ?>" alt="image">
							</div>
						</div>
					</div> 
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name"><?php echo $prow['name'] ?></h2>
							<div>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
								</div>

							</div>
							<div>
								<h3 class="product-price"><?php echo $prow['price'] ?> RS</h3>
								<span class="product-available">In Stock</span>
							</div>
							<p><?php echo $prow['description'] ?></p>

						</div>
					</div>
					<!-- /Product details -->

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

<?php } ?> <!--🔴end of if condition-->

<!-- ----------------------------------------------------------------------------------------------------- -->

<?php if(isset($_GET['product_order'])){ //🟥if condition

$id=$_GET['product_order'];
$query=$admin->ret("SELECT * from `product` where `pid`=".$id);
$prow=$query->fetch(PDO::FETCH_ASSOC);

//pending_order table
$query=$admin->ret("SELECT * from `pending_order` where `product_id`=$id AND `customer_id`=$s_variable ");
$penrow=$query->fetch(PDO::FETCH_ASSOC);

?>

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
							<div class="product-preview">
                                <!-- main product image -->
                                <img src="shopowner\shopownerupload/<?php echo $prow['imagedb'] ?>" alt="image">
							</div>
						</div>
					</div> 
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name"><?php echo $prow['name'] ?></h2>
							<div>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
								</div>

							</div>
							<div>
								<h3 class="product-price"><?php echo $prow['price'] ?> RS</h3>
								<span class="product-available">In Stock</span>
							</div>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>



							<div class="add-to-cart">
								<div class="qty-label">
									Quantity
									<!-- <div class="input-number"> -->
                                    <a href="" class="add-to-cart-btn">-</a>
										<label><?php echo $penrow['quantity'] ?></label>
                                        <a href="" class="add-to-cart-btn">+</a>
								</div>
								<a href="" class="add-to-cart-btn"> Buy Now</a>
							</div>

							<ul class="product-btns">
								<li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
								<li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li>
							</ul>

							<ul class="product-links">
								<li>Category:</li>
								<li><a href="#">Headphones</a></li>
								<li><a href="#">Accessories</a></li>
							</ul>

							<ul class="product-links">
								<li>Share:</li>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-envelope"></i></a></li>
							</ul>

						</div>
					</div>
					<!-- /Product details -->

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

<?php } ?> <!--🔴end of if condition-->

<!-- MAIN CONTENT ENDS-- -->
  <?php include '7footer.php' ?>

  




<!--javascript -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="indexassets/js/jquery.min.js"></script>
  <script src="indexassets/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="indexassets/js/popper.min.js"></script>
  <script src="indexassets/js/bootstrap.min.js"></script>
  <script src="indexassets/js/jquery.easing.1.3.js"></script>
  <script src="indexassets/js/jquery.waypoints.min.js"></script>
  <script src="indexassets/js/jquery.stellar.min.js"></script>
  <script src="indexassets/js/owl.carousel.min.js"></script>
  <script src="indexassets/js/jquery.magnific-popup.min.js"></script>
  <script src="indexassets/js/aos.js"></script>
  <script src="indexassets/js/jquery.animateNumber.min.js"></script>
  <script src="indexassets/js/bootstrap-datepicker.js"></script>
  <script src="indexassets/js/scrollax.min.js"></script>
  <script src="indexassets/https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="indexassets/js/google-map.js"></script>
  <script src="indexassets/js/main.js"></script>

  <!-- electro theme javascript starts -->
  <script src="indexassets/elctro_theme/js/jquery.min.js"></script>
		<script src="indexassets/elctro_theme/js/bootstrap.min.js"></script>
		<script src="indexassets/elctro_theme/js/slick.min.js"></script>
		<script src="indexassets/elctro_theme/js/nouislider.min.js"></script>
		<script src="indexassets/elctro_theme/js/jquery.zoom.min.js"></script>
		<script src="indexassets/elctro_theme/js/main.js"></script>
  <!-- electro theme javascript ends -->
  </body>
</html>