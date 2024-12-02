<!DOCTYPE html>
<html lang="en">

<head>
	<title>Vegefoods - Free Bootstrap 4 Template by Colorlib</title>
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
</head>

<body class="goto-here">

	<!-- include files -->
	<?php include '1header.php' ?>

	<?php


	$admin = new Admin();

	if (!isset($_SESSION['cid'])) {
		header("location:customer/loginfront.php");
	}

	$s_variable = $_SESSION['cid'];

	?>



	<div class="hero-wrap hero-bread" style="background-image: url('indexassets/images/bg_1.jpg');">
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center">
				<div class="col-md-9 ftco-animate text-center">
					<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
					<h1 class="mb-0 bread">My Cart</h1>
				</div>
			</div>
		</div>
	</div>


		<section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
					<div class="col-md-12 ftco-animate">
						<div class="cart-list">
							<table id="cart_id" class="table">
								<thead class="thead-primary">
									<tr class="text-center">
										<th>image</th>
										<th>Product name</th>
										<th>Price</th>
										<th>Quantity</th>
										<th>Total</th>
									</tr>
								</thead>
								<tbody>

									<?php // checking customer session 
									$query = $admin->ret("SELECT * from `cart` where `cid_f`=" . $s_variable);
									while ($row = $query->fetch(PDO::FETCH_ASSOC)) { ?>

										<tr class="text-center">



											<td><img src="shopowner/shopownerupload/<?php echo $row['imagedb_f'] ?>" width="50" height="50"></td>

											<td class="product-name">
												<h3><?php echo $row['name_f'] ?></h3>
											</td>

											<td class="price"><?php echo $row['price_f'] ?></td>

									
											<td> <?php if ($row['quantity'] > 1) { ?>
													<!-- decrement -->
													<a href="customer/customercontroller/cartback.php?decrement_cartid=<?php echo $row['cart_id'] ?> & cid=<?php echo $s_variable ?>" class="btn btn-primary py-15 px-15">-</a>
												<?php } ?>
												<!-- quantity -->
												<?php echo $row['quantity'] ?>
												<!-- increment -->
												<a href="customer/customercontroller/cartback.php?increment_cartid=<?php echo $row['cart_id'] ?> & cid=<?php echo $s_variable ?>" class="btn btn-primary py-15 px-15">+</a>
											</td>


											<td class="total"><?php echo $row['total'] ?></td>

											<td><a class="btn btn-danger py-3 px-4" href="customer\customercontroller\cartback.php?removecart=<?php echo $row['cart_id'] ?>">Delete</a></td>



										</tr><!-- END TR-->
									<?php } ?>
									<!--while loop ends -->


								</tbody>
							</table>
						</div>
					</div>
				</div>


				<!--extra-->



				<!-- total starts--------------------------------------------------------------->
				<div class="row justify-content-end">
					<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
						<div class="cart-total mb-3">
							<h3>Cart Totals</h3>

							<!--calculating cart total -->
							<?php $a = 0;
							$query = $admin->ret("SELECT `total` FROM `cart` WHERE `cid_f`=" . $s_variable);
							while ($rowt = $query->fetch(PDO::FETCH_ASSOC)) {
								$a = $a + $rowt['total'];
							} ?>

							<hr>
							<p class="d-flex total-price">
								<span>cart Total</span>
								<span><?php echo $a; ?> RS</span>
							</p>


						</div>

						<p><a href="cart_checkout_front.php" class="btn btn-primary py-3 px-4">check out</a></p>

					</div>
				</div>
			</div>
		</section>
		<!--total ends-->


	<!--other contents :news letter and about ------------------------------------>

	<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
		<div class="container py-4">
			<div class="row d-flex justify-content-center py-5">
				<div class="col-md-6">
					<h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
					<span>Get e-mail updates about our latest shops and special offers</span>
				</div>
				<div class="col-md-6 d-flex align-items-center">
					<form action="customer\customercontroller\feedback_customer.php" method="POST" class="subscribe-form">
						<div class="form-group d-flex">
							<?php $query = $admin->ret("SELECT * FROM `customer` where `cid`=" . $s_variable);
							$rowc = $query->fetch(PDO::FETCH_ASSOC); ?>
							<input type="hidden" name="cid" value="<?php echo $s_variable ?>">
							<input type="hidden" name="cname" value="<?php echo $rowc['cname'] ?>">
							<input type="text" name="message" class="form-control" placeholder="write you feedback">
							<input type="submit" name="feedsubmit" value="Send" class="submit px-3">
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<footer class="ftco-footer ftco-section">
		<div class="container">
			<div class="row">
				<div class="mouse">
					<a href="#" class="mouse-icon">
						<div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
					</a>
				</div>
			</div>
			<div class="row mb-5">
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Vegefoods</h2>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
						<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
							<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4 ml-md-5">
						<h2 class="ftco-heading-2">Menu</h2>
						<ul class="list-unstyled">
							<li><a href="#" class="py-2 d-block">Shop</a></li>
							<li><a href="#" class="py-2 d-block">About</a></li>
							<li><a href="#" class="py-2 d-block">Journal</a></li>
							<li><a href="#" class="py-2 d-block">Contact Us</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-4">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Help</h2>
						<div class="d-flex">
							<ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
								<li><a href="#" class="py-2 d-block">Shipping Information</a></li>
								<li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
								<li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
								<li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
							</ul>
							<ul class="list-unstyled">
								<li><a href="#" class="py-2 d-block">FAQs</a></li>
								<li><a href="#" class="py-2 d-block">Contact</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Have a Questions?</h2>
						<div class="block-23 mb-3">
							<ul>
								<li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
								<li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
								<li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">

					<p>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>
							document.write(new Date().getFullYear());
						</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</p>
				</div>
			</div>
		</div>
	</footer>



	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
		</svg></div>


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

</body>

</html>

