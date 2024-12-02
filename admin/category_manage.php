<!-- PHP code starts------------------------------------------------------------------------------------------------>
<?php

include '../config.php';

$admin = new Admin();

if (!isset($_SESSION['admin_id'])) {
  header("location:../loginfront.php");
}

$session_variable = $_SESSION['admin_id']; //shows may be particular user data

?>

<!-- PHP code ends------------------------------------------------------------------------------------------------>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Manage Category</title>
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


          <!--table starts-->
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Category Manage</h4>
                <p class="card-description">
                  <a type="button" class="btn btn-success btn-rounded btn-fw" href="category_create.php">Add new Category</a>
                </p>
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Category</th>
                      </tr>
                    </thead>
                    <tbody>

                      <!--table data starts -->
                      <?php $query = $admin->ret("SELECT * FROM `category` ");
                      while ($row = $query->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                          <td><?php echo $row['category_name'] ?></td>

                          <td><a type="button" class="btn btn-info btn-rounded btn-fw" href="category_update.php?category_update=<?php echo $row['category_id'] ?>">Update</a></td>
                          <td><a type="button" class="btn btn-danger btn-rounded btn-fw" href="admincontroller/category_controller.php?delete_category=<?php echo $row['category_id'] ?>">Delete</a></td>
                        </tr>
                      <?php } ?>
                      <!--table data ends-->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <!--table ends -->





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