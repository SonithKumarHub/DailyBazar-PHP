<!-- PHP code starts------------------------------------------------------------------------------------------------>
<?php

include '../config.php';

$admin = new Admin();

if (!isset($_SESSION['owner_id'])) {
  header("location:loginfront.php");
  //$_SESSION is from admin loginback.php page
  //checks admin login d or not, otherwise it will redirect to login page
}

$session_variable = $_SESSION['owner_id']; //shows may be particular user data

?>

<?php
//getting php data 
$prodid = $_GET['upid']; //this id is from locationsmain href
$query = $admin->ret("SELECT * FROM `product` where `pid`=" . $prodid);
$row = $query->fetch(PDO::FETCH_ASSOC);
?>

<!-- PHP code ends------------------------------------------------------------------------------------------------>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Update product</title>
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
  <div class="container-scroller">
    <!-- 1. container scroller starts -->

    <?php include 'header.php' ?>
    <!--  # navbar / header -->

    <div class="container-fluid page-body-wrapper">
      <!--2. body wrapper starts-->
      <?php include 'sidebar.php' ?>
      <!--  #  sidebar   # -->

      <div class="main-panel">
        <!--3. main panel starts-->
        <div class="content-wrapper">
          <!-- 4. content wrapper starts-->

          <!---------------MAIN CONTENT STARTS------------------->
          <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Update product</h4>

                <form class="forms-sample" method="POST" action="ownercontroller/productowner.php" enctype="multipart/form-data">

                  <!-- passing id as hidden -->
                  <div class="form-group row">
                    <div class="col-sm-9">
                      <input type="hidden" name="pid" value="<?php echo $row['pid'] ?>" class="form-control" id="exampleInputUsername2" placeholder="location name">
                      <input type="hidden" name="location_id" value="<?php echo  $row['location_id'] ?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">product Name</label>
                    <div class="col-sm-9">
                      <input type="text" name="name" value="<?php echo $row['name'] ?>" class="form-control" id="exampleInputUsername2" placeholder="Product name">
                    </div>
                  </div>
                  
                  

                  <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">price</label>
                    <div class="col-sm-9">
                      <input type="text" name="price" value="<?php echo $row['price'] ?>" class="form-control" id="exampleInputEmail2" placeholder="price">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">description</label>
                    <div class="col-sm-9">
                      <input type="text" name="description" value="<?php echo $row['description'] ?>" class="form-control" id="exampleInputEmail2" placeholder="description">
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">File upload</label>
                    <div class="col-sm-9">
                      <input type="file" name="image">
                    </div>
                  </div>

                  <!-- sending old image -->
                  <input type="hidden" name="img" value="<?php echo $row['imagedb'] ?>">


                  <button type="submit" name="update" class="btn btn-primary mr-2">Submit</button>
                  <a class="btn btn-light" href="productmanage.php">Cancel</a>
                </form>
              </div>
            </div>
          </div>


          <!-----------------MAIN CONTENT ENDS------------------->

        </div>
        <!--content wrapper ends-->
        <?php include 'footer.php' ?>
        <!-- #   footer # -->

      </div>
      <!--main panel ends-->
    </div>
    <!--body wrapper ends-->
  </div>
  <!--container scroller ends-->

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