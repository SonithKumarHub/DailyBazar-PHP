<?php

include 'config.php';

$admin = new Admin();

if (isset($_SESSION['cid'])) {
    $s_variable = $_SESSION['cid'];
}


//updating customer location_id based on dropdown selection
if (isset($_GET['select_value'])) {

    $selected_category = $_GET['select_value']; //['lid'] is <input tag name=""

}
?>


<!-- --------------------------------------- RESOPONSE ----------------------------------- -->
<div class="container">
    <div class="row">
        <!--🟥id for ajax-->

        <!-- looping the product -->
        <?php $query = $admin->ret("SELECT * from `product` where `category_idp`='$selected_category' ");
        while ($prow = $query->fetch(PDO::FETCH_ASSOC)) { ?>
            <!-- product displaying -->
            <div class="col-md-6 col-lg-3">
                <!--🔵ftco-animate: this code was prevent ajax from displaying-->
                <div class="product">
                    <div style="height: 250px; overflow:hidden;">
                        <a href="#" class="img-prod"><img class="img-fluid" src="shopowner/shopownerupload/<?php echo $prow['imagedb'] ?>" alt="Colorlib Template">
                            <div class="overlay"></div>
                        </a>
                    </div>
                    <div class="text py-3 pb-4 px-3 text-center">
                        <h3><a href="#"><?php echo $prow['name'] ?></a></h3>
                        <p style="color: black; !important">shop name: <?php echo $prow['shop_name'] ?></p>
                        <div class="d-flex">
                            <div class="pricing">
                                <p class="price"><span class="price-sale"><?php echo $prow['price'] ?> RS</span></p>
                            </div>
                        </div>
                        <div class="bottom-area d-flex px-5">
                            <div class="m-auto d-flex">

                                <!-- cart button starts-->
                                <form method="POST" action="customer/customercontroller/cartback.php" enctype="multipart/form-data">

                                    <!--product inputs $p row-->
                                    <input type="hidden" name="pid" value="<?php echo $prow['pid'] ?>">
                                    <input type="hidden" name="image" value="<?php echo $prow['imagedb'] ?>">
                                    <input type="hidden" name="name" value="<?php echo $prow['name'] ?>">
                                    <input type="hidden" name="price" value="<?php echo $prow['price'] ?>">
                                    <input type="hidden" name="owner_pid" value="<?php echo $prow['owner_pid'] ?>">


                                    <!-- cutomer input $row -->
                                    <input type="hidden" name="cid" value="<?php echo $s_variable ?>">
                                    <!-- quantity input -->
                                    <div class="form-group">
                                        <input type="hidden" name="quantity" value="1">
                                    </div>

                                    <?php if (isset($_SESSION['cid'])) { ?>
                                        <button type="submit" name="insert" class="btn btn-primary">
                                            <span><i class="ion-ios-heart"></i></span>
                                        </button>
                                    <?php } else { ?>
                                        <a href="customer/loginfront.php" class="btn btn-primary">
                                            <span><i class="ion-ios-heart"></i></span></a>
                                    <?php } ?>



                                    <!-- detail view -->
                                    <a href="product_detailview.php?productid=<?php echo $prow['pid'] ?>" class="btn btn-primary">
                                        <span><i class="ion-ios-menu"></i></span></a>

                                </form>
                                <!--form button ends -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--- desplay the data in a table row -->

            <!-- product displaying -->
        <?php } ?>
        <!--while loop ends -->

    </div>
</div>