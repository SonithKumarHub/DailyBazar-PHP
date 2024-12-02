<!DOCTYPE html>
<html lang="en">

<head>
    <title>checkout</title>
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

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="indexassets/elctro_theme/css/bootstrap.min.css" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="indexassets/elctro_theme/css/slick.css" />
    <link type="text/css" rel="stylesheet" href="indexassets/elctro_theme/css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="indexassets/elctro_theme/css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="indexassets/elctro_theme/css/style.css" />
    <!-- electro theme headtags ends -->



</head>

<body class="goto-here">

    <?php include '1header.php' ?>

    <!-- 🟡 MAIN CONTENT STARTS ----------------------------------------------------------------------- -->
    <?php
    //🟦customer session

    if (!isset($_SESSION['cid'])) {
        header("location:customer/loginfront.php");
    }

    $s_variable = $_SESSION['cid'];

    ?>



    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <h3 class="breadcrumb-header">Checkout</h3>
                    <ul class="breadcrumb-tree">
                        <li><a href="#">Home</a></li>
                        <li class="active">Checkout</li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /BREADCRUMB -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <?php $query = $admin->ret("SELECT * FROM `customer` where `cid`='$s_variable' ");
                $row = $query->fetch(PDO::FETCH_ASSOC); ?>

                <div class="col-md-7">
                    <!-- Billing Details -->
                    <div class="billing-details">
                        <div class="section-title">
                            <h3 class="title">Billing address</h3>
                        </div>
                        <form method="POST" action="shopowner\ownercontroller\orderback.php" autocomplete="off">
                            <!--🟢form starts -->
                            <div class="form-group">
                                <input class="input" type="text" name="first-name" placeholder="Full Name" required value="<?php echo $row['cname'] ?>">
                            </div>

                            <div class="form-group">
                                <input class="input" type="text" name="phone" placeholder="Phone number" required required value="<?php echo $row['contact'] ?>">
                            </div>

                            <div class="form-group">
                                <input class="input" type="text" name="city" placeholder="City" required pattern="[a-zA-Z'-'\s]*" title="No numbers or special characters are allowed">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="country" placeholder="Country" required pattern="[a-zA-Z'-'\s]*" title="No numbers or special characters are allowed">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="zip-code" placeholder="Pin Code" required pattern="[0-9]{6}" title="6 digits pincode">
                            </div>
                            <div class="form-group">
                                <div class="input-checkbox">
                                    <input type="checkbox" id="create-account">

                                    <div class="caption">
                                        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p> -->
                                        <input class="input" type="password" name="password" placeholder="Enter Your Password">
                                    </div>
                                </div>
                            </div>
                    </div>
                    <!-- /Billing Details -->
                </div>

                <!-- Order Details -->
                <div class="col-md-5 order-details">
                    <div class="section-title text-center">
                        <h3 class="title">Your Order</h3>
                    </div>
                    <div class="order-summary">
                        <div class="order-col">
                            <div><strong>PRODUCT</strong></div>
                            <div><strong>TOTAL</strong></div>
                        </div>
                        <div class="order-products">

                            <?php $query = $admin->ret("SELECT * from `cart` where `cid_f`=" . $s_variable);
                            while ($row = $query->fetch(PDO::FETCH_ASSOC)) { ?>

                                <div class="order-col">
                                    <div><?php echo $row['quantity'] ?>x <?php echo $row['name_f'] ?></div>
                                    <div><?php echo $row['price_f'] ?> RS</div>
                                </div>
                            <?php } ?>
                            <!--while loop ends -->

                        </div>
                        <div class="order-col">
                            <div>Shiping</div>
                            <div><strong>FREE</strong></div>
                        </div>

                        <!-- 🔴 calculating cart total-->
                        <?php $a = 0;
                        $query = $admin->ret("SELECT `total` FROM `cart` WHERE `cid_f`=" . $s_variable);
                        while ($rowt = $query->fetch(PDO::FETCH_ASSOC)) {
                            $a = $a + $rowt['total'];
                        } ?>


                        <div class="order-col">
                            <div><strong>TOTAL</strong></div>
                            <div><strong class="order-total"><?php echo $a; ?> RS</strong></div>
                        </div>
                    </div>
                    <div >
                        <div >
                            <input type="radio" name="payment" id="payment-1" required>
                            <label for="payment-1">
                                <span></span>
                                Cash on delivery
                            </label>
                            <div class="caption">
                                <p>Pay with cash upon delivery</p>
                            </div>
                        </div>
                        <div class="input-radio">
                            <input type="radio" name="payment" id="payment-2" required>
                            <label for="payment-2">
                                <span></span>
                                <b>Debit card/credit card</b>
                            </label>
                            <div class="caption">
                                <!-- 🔴 card paymen  body starts -->
                                <div class="container d-flex  main">
                                    <div class="card" style="background-color: #E6EBEE;">

                                        <div class="px-3 pt-3">
                                            <label for="card number" class="d-flex justify-content-between"><span class="labeltxt">CARD NUMBER</span><img src="https://img.icons8.com/color/48/000000/mastercard-logo.png" width="25" class="image" /></label>
                                            <input type="text" class="form-control inputtxt" id="card_no" name="card_number" placeholder="0000 0000 0000 0000" minlength="16" maxlength="16">
                                        </div>


                                        <div class="d-flex justify-content-between px-3 pt-4">
                                            <div><label for="date" class="exptxt"> Expiry </label><input type="text" name="expiry" class="form-control expiry" placeholder="MM / YY" id="card_expiry" name="card_expiry" minlength="5" maxlength="5"></div>
                                            <div><label for="cvv" class="cvvtxt">CVV / CVC</label><input type="text" name="number" class="form-control cvv" id="exp" minlength="3" maxlength="3"></div>
                                        </div>
                                        <div class="d-flex justify-content-between px-3 pt-4 pb-4">
                                        </div>
                                    </div>
                                </div>
                                <!-- 🔴 card paymen  body ends -->
                            </div>
                        </div>
                        <div class="input-radio">
                            <input type="radio" name="payment" id="payment-3" required>
                            <label for="payment-3">
                                <span></span>
                               <b> Google pay</b>
                            </label>
                            <div class="caption">
                                <img src="Sonithqrcode.jpg" style="width: 300px; height:350px">
                                <input autocomplete="off" style="border-color: #cccdcf;" name="transaction_id" placeholder="Enter transaction id" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="input-checkbox">
                        <input type="checkbox" id="terms">
                        <label for="terms">
                            <span></span>
                            I've read and accept the <a href="#">terms & conditions</a>
                        </label>
                    </div>
                    <!-- <a href="#" class="primary-btn order-submit">Place order</a> -->
                    <input type="submit" value="Place order" name="place_order" style="width: 420px;" name="" id="selfclick" class="primary-btn order-submit">
                </div>
                </form>
                <!--🟢form ends-->
                <!-- /Order Details -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- 🟡 MAIN CONTENT ENDS ----------------------------------------------------------------------- -->
    <?php include '7footer.php' ?>






    <!--javascript -->
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

    <!-- electro theme javascript starts -->
    <script src="indexassets/elctro_theme/js/jquery.min.js"></script>
    <script src="indexassets/elctro_theme/js/bootstrap.min.js"></script>
    <script src="indexassets/elctro_theme/js/slick.min.js"></script>
    <script src="indexassets/elctro_theme/js/nouislider.min.js"></script>
    <script src="indexassets/elctro_theme/js/jquery.zoom.min.js"></script>
    <script src="indexassets/elctro_theme/js/main.js"></script>
    <!-- electro theme javascript ends -->



    <!-- form validation -->
    <script>
        function myFunction() {
            let x = document.forms["myForm"]["fname"].value;
            if (x == "") {
                alert("Name must be filled out");
                return false;
            }
        }
    </script>

</body>

</html>