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
</head>

<body class="goto-here">

  <?php include '1header.php' ?>
  <?php include '2homeimage.php' ?>
  <?php include '3icons.php' ?>
  <?php include '4vegtablephotos.php' ?>

  <?php if (isset($_SESSION['cid'])) {
    $s_variable = $_SESSION['cid']; ?>

<?php $query = $admin->ret("SELECT * FROM `customer` where `cid`=" . $s_variable);
                $rowc = $query->fetch(PDO::FETCH_ASSOC); ?>

    <section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
      <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
          <div class="col-md-6">
            <h2 style="font-size: 22px;" class="mb-0"><?php echo $rowc['cname'] ?> Your Feedback is valuable</h2>
            <span>It helps us to improve our products</span>
          </div>
          <div class="col-md-6 d-flex align-items-center">
            <form autocomplete="off" action="customer\customercontroller\feedback_customer.php" method="POST" class="subscribe-form">
              <div class="form-group d-flex">


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
  <?php } ?>
  <!-- if condition ends-->

  <?php include '7footer.php' ?>



  <!-- MAIN CONTENT STARTS ---->

  <!-- MAIN CONTENT ENDS-- -->


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
</body>

</html>