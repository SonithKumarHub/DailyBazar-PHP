<?php

include 'config.php';

$admin = new Admin();

if (!isset($_SESSION['cid'])) {
	header("location:customer/loginfront.php");
}
$s_variable = $_SESSION['cid'];


//echo "ajax working";
?>


<?php
//decrement query
if (isset($_GET['qvariable_d'])) {

	$old_quantity = $_GET['qvariable_d'];
	$cartid_v = $_GET['cartid_v'];

	$new_quantity = (int)$old_quantity - 1;
	$price_f = $_GET['price_f'];

	$total= (int)$price_f * $new_quantity;

	$query = $admin->cud("UPDATE `cart` SET `quantity`='$new_quantity',`price_f`=$price_f, `total`=$total WHERE cart.cart_id=" . $cartid_v, "updated successfully");
}
?>

<?php
//increment query
if (isset($_GET['qvariable_inc'])) {

	$old_quantity = $_GET['qvariable_inc'];
	$cartid_v = $_GET['cartid_v'];

	$new_quantity = (int)$old_quantity + 1;
	$price_f = $_GET['price_f'];

	$total= (int)$price_f * $new_quantity;

	$query = $admin->cud("UPDATE `cart` SET `quantity`='$new_quantity',`price_f`=$price_f, `total`=$total WHERE cart.cart_id=" . $cartid_v, "updated successfully");
}
?>

<div class="container" id="mycart_id">
				<div class="row">
					<div class="col-md-12 ">
						<div class="cart-list">
							<!--🟥div of id-->
							<table class="table" >
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
													<a onclick="decrement(<?php echo $row['cart_id']; ?>,<?= $row['quantity']?>,<?php echo $row['price_f']; ?>)" class="btn btn-primary py-15 px-15">-</a>
												<?php } ?>
												<!-- quantity -->
												<span><?php echo $row['quantity'] ?></span>
												<!-- increment -->
												<a onclick="increment(<?php echo $row['cart_id'];?>, <?php echo $row['quantity']; ?>,<?php echo $row['price_f']; ?>)" class="btn btn-primary py-15 px-15">+</a>
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
							<p><a href="checkout.php" class="btn btn-primary py-3 px-4">check out</a></p>
    					</p>
    				</div>


			</div>