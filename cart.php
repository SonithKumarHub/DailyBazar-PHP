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

<?php $query = $admin->ret("SELECT * FROM `customer` where `cid`=" . $s_variable);
                $rowc = $query->fetch(PDO::FETCH_ASSOC); ?>



	<div class="hero-wrap hero-bread" style="background-image: url('indexassets/images/bg_1.jpg');">
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center">
				<div class="col-md-9 ftco-animate text-center">
					<p class="breadcrumbs"><span class="mr-2"><a href="index.html"></a></span> <span></span></p>
					<h1 class="mb-0 bread"><?php echo $rowc['cname'] ?> your Cart</h1>
				</div>
			</div>
		</div>
	</div>


	<section class="ftco-section ftco-cart">
		<div class="container" id="mycart_id">
			<div class="row">
				<div class="col-md-12 ftco-animate">
					<div class="cart-list">
						<!--🟥div of id-->
						<table class="table">
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
												<a onclick="decrement(<?php echo $row['cart_id']; ?>,<?= $row['quantity'] ?>,<?php echo $row['price_f']; ?>)" class="btn btn-primary py-15 px-15">-</a>
											<?php } ?>
											<!-- quantity -->
											<span><?php echo $row['quantity'] ?></span>
											<!-- increment -->
											<a onclick="increment(<?php echo $row['cart_id']; ?>, <?php echo $row['quantity']; ?>,<?php echo $row['price_f']; ?>)" class="btn btn-primary py-15 px-15">+</a>
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


				<!--extra-->



				<!-- experiment -->
				<div class="cart-total mb-3">

					<!--calculating cart total -->
					<?php $a = 0;
					$query = $admin->ret("SELECT `total` FROM `cart` WHERE `cid_f`=" . $s_variable);
					while ($rowt = $query->fetch(PDO::FETCH_ASSOC)) {
						$a = $a + $rowt['total'];
					} ?>


					<hr>
					<p class="d-flex total-price">
						<span>Total</span>
						<span><?php echo $a; ?> RS</span>

						<?php $query = $admin->ret("SELECT * from `cart` where `cid_f`=" . $s_variable);
						$row = $query->fetch(PDO::FETCH_ASSOC);

						if ($query->rowCount() > 0) { ?>

					<div class="cart-buttons">
					<p><a href="checkout.php" class="btn btn-primary py-3 px-4">check out</a></p>
					</div>
				<?php } else { ?>
					<h5 style="color:red;">cart is empty</h5>
				<?php } ?>

				<!-- <p><a href="checkout.php" class="btn btn-primary py-3 px-4">check out</a></p> -->

				</p>
				</div>


			</div>
	</section>

	</div>
	<!--id div ends-->
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
	<!--total ends-->


	<!-- 🟡 footer  -->
	<?php include '7footer.php' ?>





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


	<!--ajax decrement -->
	<script>
		function decrement(cart_id, qty, price_f) { //getting from onclick function

			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					//table id
					document.getElementById("mycart_id").innerHTML = this.responseText;
				}
			};
			xmlhttp.open("GET", "quantity_ajax.php  ? qvariable_d=" + qty + '& cartid_v=' + cart_id + '& price_f=' + price_f, true);
			xmlhttp.send();
		}
	</script>

	<!--ajax increment -->
	<script>
		function increment(cart_id, qty, price_f) { //getting from onclick function
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					//table id
					document.getElementById("mycart_id").innerHTML = this.responseText;
				}
			};
			xmlhttp.open("GET", "quantity_ajax.php ? qvariable_inc=" + qty + '& cartid_v=' + cart_id + '& price_f=' + price_f, true);
			xmlhttp.send();
		}
	</script>


</body>

</html>