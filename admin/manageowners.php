<?php

include '../config.php';

$admin = new Admin();

?>

<!-- outline   copied from adminindex.php -->
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Manage owners</title>
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


        <!-----------------MAIN CONTENT STARTS------------------------->
        <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Shop Owner Details</h4>
                  <!--<p class="card-description">
                    Add class <code>.table-hover</code>
                  </p>-->
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Image</th>
                          <th>Owner Name</th>
                          <th>username</th>
                          <th>shop name</th>
                          <th>location name</th>
                          <th>email</th>
                          <th>contact</th>
                        </tr>
                      </thead>
                      <tbody>

                      <!--table data starts -->
                <?php  $query=$admin->ret("SELECT * FROM `shopowner` INNER JOIN `locations` ON shopowner.location_id = locations.location_id ");
                    while($row=$query->fetch(PDO::FETCH_ASSOC) ) { ?>
                        <tr>
                        <td><img src="../shopowner/shopownerupload/<?php echo $row['imagedb'] ?>" height="800px" width="800px"></td>
                          <td><?php echo $row['owner_name']?></td>
                          <td><?php echo $row['username']?></td>
                          <td><?php echo $row['shop_name']?></td>
                          <td><?php echo $row['location_name']?>-<?php echo $row['location_pincode']?></td>
                          <td><?php echo $row['email']?></td>
                          <td><?php echo $row['contact']?></td>
                

                          <!-- approve conditions -->
                          <?php if($row['status']=='approved') { ?>
                          <td><button type="button" class="btn btn-success btn-rounded btn-fw">Approved</button></td>
                          
                          <?php } else { ?>
                          <td><a type="button" class="btn btn-info btn-rounded btn-fw" href="admincontroller/owneradmin.php?myownerid=<?php echo $row['owner_id'] ?>">Approve</a></td>
                          <?php } ?>
                          <!-- end of approve condition -->

                          <td><a type="button" class="btn btn-danger btn-rounded btn-fw" href="admincontroller/owneradmin.php?delownerid=<?php echo $row['owner_id'] ?>">Delete</a></td>
                        </tr>
                    <?php } ?>
                    <!--table data ends-->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>



          <!-----------------MAIN CONTENT ENDS--------------------------->
          
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
