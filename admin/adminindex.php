<!-- PHP code starts------------------------------------------------------------------------------------------------>
<?php

include '../config.php';

$admin = new Admin();

if (!isset($_SESSION['admin_id'])) {
       header("location:loginfront.php");
       //$_SESSION is from admin loginback.php page
       //checks admin login d or not, otherwise it will redirect to login page
}

$session_variable =$_SESSION['admin_id']; //shows may be particular user data

?>

<!-- PHP code ends------------------------------------------------------------------------------------------------>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Index</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/feather/feather.css">
  <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="assets/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="assets/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>
<body>

<!-- body starts ------------------------------------------------------------------------------------->
  <div class="container-scroller"> <!-- 1. container scroller starts -->
      
  <?php include 'header.php' ?>
  <!--  # navbar / header -->

    <div class="container-fluid page-body-wrapper"> <!--2. body wrapper starts-->
    <?php include 'sidebar.php' ?>
    <!--  #  sidebar   # -->

      <div class="main-panel"> <!--3. main panel starts-->
        <div class="content-wrapper"> <!-- 4. content wrapper starts-->

          <!---------------MAIN CONTENT STARTS------------------->
        

        <!--customer counting php starts-->
        <?php
          $query=$admin->ret("SELECT count(*) FROM `customer`");
          $row1=$query->fetch(PDO::FETCH_ASSOC);
          $c=implode($row1);
          ?>
        <!-- customer counting ends -->

        <!--shop owner counting php starts-->
        <?php
          $query=$admin->ret("SELECT count(*) FROM `shopowner`");
          $row1=$query->fetch(PDO::FETCH_ASSOC);
          $s=implode($row1);
          ?>
        <!-- customer counting ends -->

        <!--locations counting php starts-->
        <?php
          $query=$admin->ret("SELECT count(*) FROM `locations`");
          $row1=$query->fetch(PDO::FETCH_ASSOC);
          $l=implode($row1);
          ?>
        <!-- customer counting ends -->

        <!--feedback counting php starts-->
        <?php
          $query=$admin->ret("SELECT count(*) FROM `feedback`");
          $row1=$query->fetch(PDO::FETCH_ASSOC);
          $f=implode($row1);
          ?>
        <!-- customer counting ends -->

          


          <div class="col-md-12 grid-margin transparent">
        <div class="row">
          <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-tale">
              <div class="card-body">
                <p class="mb-4">Number of customers</p>
                <p class="fs-30 mb-2"><?php echo $c ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-dark-blue">
              <div class="card-body">
                <p class="mb-4">Number of shop owners</p>
                <p class="fs-30 mb-2"><?php echo $s ?></p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
            <div class="card card-light-blue">
              <div class="card-body">
                <p class="mb-4">Number of Locations</p>
                <p class="fs-30 mb-2"><?php echo $l ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 stretch-card transparent">
            <div class="card card-light-danger">
              <div class="card-body">
                <p class="mb-4">Number of Feedbacks</p>
                <p class="fs-30 mb-2"><?php echo $f ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>


          <!-----------------MAIN CONTENT ENDS------------------->
          
        </div><!--content wrapper ends-->
        <?php include 'footer.php' ?>
        <!-- #   footer # -->

      </div> <!--main panel ends-->
    </div> <!--body wrapper ends-->
  </div> <!--container scroller ends-->

<!-- javascript ------------------------------------------------------------------->
  <!-- plugins:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="assets/vendors/chart.js/Chart.min.js"></script>
  <script src="assets/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="assets/js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/template.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="assets/js/dashboard.js"></script>
  <script src="assets/js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
