<!DOCTYPE html>
<html lang="en">

<head>
  <title>products</title>
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

  <?php include '1header.php' ?>


<!--🟨 MAIN CONTENT STARTS ------------------------------------------------------------------------->
  
  <!-- --------------🟢when user is logged in---------------------------------------------------- -->
  <?php

  //include 'config.php';

  $admin = new Admin();

  if (isset($_SESSION['cid'])) {

    $s_variable = $_SESSION['cid'];

    #used to input form
    $query = $admin->ret("SELECT * from `customer`  where `cid`=" . $s_variable);
    $crow = $query->fetch(PDO::FETCH_ASSOC);
  }
  ?>


    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <span class="subheading">Featured Products</span>
            <h2 class="mb-4">Product available in your location</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>
      </div>


<center>
      <div style="width: 1200px;">
        <!-- drop down pincode -->
        <h4>Select Category</h4>

        <select onchange="selectoption(this.value)" class="form-control">
          <option selected disabled value="">select category</option>
          <!-- 🟥 while loop -->
          <?php $query = $admin->ret("SELECT * FROM `category` ");
          while ($row = $query->fetch(PDO::FETCH_ASSOC)) { ?>
            <option value="<?php echo $row['category_id'] ?>"><?php echo $row['category_name']; ?></option>
          <?php } ?>
        </select>
      </div>
      </center>

      <br><br>




      <div class="container" id="product_loop">
        <div class="row">
          <!--🟥id for ajax-->

          <!-- looping the product -->
          <?php $query = $admin->ret("SELECT * from `product` ");
          while ($prow = $query->fetch(PDO::FETCH_ASSOC)) { ?>
            <!-- product displaying -->
            <div class="col-md-6 col-lg-3 ftco-animate">
              <div class="product">
                <div style="height: 250px; overflow:hidden;">
                <a href="product_detailview.php?productid=<?php echo $prow['pid'] ?>" class="img-prod"><img class="img-fluid" src="shopowner/shopownerupload/<?php echo $prow['imagedb'] ?>" alt="Colorlib Template">
                  <div class="overlay"></div>
                </a>
                </div>
                <div class="text py-3 pb-4 px-3 text-center">
                  <h3><a href="#"><?php echo $prow['name'] ?></a></h3>
                  <p style="color: black; !important">shop name: <?php echo $prow['shop_name'] ?></p>
                  <div class="d-flex">
                    <div class="pricing">
                      <p class="price"><span class="price-sale"><?php echo $prow['price'] ?> RS/Kg</span></p>

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
                        <input type="hidden" name="cid" value="<?php echo $crow['cid'] ?>">
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
    </section>



  <!-- MAIN CONTENT ENDS-- -->

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


  <!-- product change on pincode selection function and content -->
  <script>
    function selectoption(select_value) {

      var xhttp = new XMLHttpRequest();

      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("product_loop").innerHTML = this.responseText;
        }
      };
      xhttp.open("GET", "product_ajax.php?select_value=" + select_value, true);
      xhttp.send();
    }
  </script>


<!-- user login page -->
<script>
    function loginpage() {

    window.location.href="customer/loginfront.php";
    }
  </script>


</body>

</html>