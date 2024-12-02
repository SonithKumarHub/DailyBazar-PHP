<!-- PHP code starts------------------------------------------------------------------------------------------------>
<?php

include '../config.php';

$admin = new Admin();

if (!isset($_SESSION['owner_id'])) {
       header("location:loginfront.php");
       //$_SESSION is from admin loginback.php page
       //checks admin login d or not, otherwise it will redirect to login page
}

$s_variable =$_SESSION['owner_id']; //shows may be particular user data

?>

<?php
//getting php data 
// $query=$admin->ret("SELECT * FROM `shopowner`  where `owner_id`=".$s_variable);
// $row=$query->fetch(PDO::FETCH_ASSOC);
$query=$admin->ret("SELECT * FROM `locations` INNER JOIN `shopowner` ON  locations.location_id=shopowner.location_id  where `owner_id`='$s_variable' ");
$row=$query->fetch(PDO::FETCH_ASSOC);

?>

<!-- PHP code ends------------------------------------------------------------------------------------------------>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Manage profile</title>
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
          <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Your account details</h4>

                  <form class="forms-sample" method="POST" action="ownercontroller/profileowner.php" enctype="multipart/form-data">
                  
                  <!-- passing id as hidden -->
                  <div class="form-group row">
                      <div class="col-sm-9">
                        <input type="hidden" name="owner_id" value="<?php echo $row['owner_id']?>" class="form-control" id="exampleInputUsername2" placeholder="location name">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">owner name</label>
                      <div class="col-sm-9">
                        <input type="text" readonly name="owner_name" value="<?php echo $row['owner_name'] ?>" class="form-control" id="exampleInputEmail2" placeholder="description">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Selected location</label>
                      <div class="col-sm-9">
                        <input type="text" readonly name="location_name" value="<?php echo $row['location_pincode'] ?>- <?php echo $row['location_name'] ?>" class="form-control" id="exampleInputEmail2" placeholder="description">
                      </div>
                    </div>
                  
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">user name</label>
                      <div class="col-sm-9">
                        <input type="text" readonly name="username" value="<?php echo $row['username'] ?>" class="form-control" id="exampleInputEmail2" placeholder="description">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">password</label>
                      <div class="col-sm-9">
                        <input type="password" readonly name="password" value="<?php echo $row['password'] ?>" class="form-control" id="exampleInputEmail2" placeholder="description">
                      </div>
                    </div>



                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Shop name</label>
                      <div class="col-sm-9">
                        <input type="text" readonly name="shop_name" value="<?php echo $row['shop_name'] ?>" class="form-control" id="exampleInputEmail2" placeholder="description">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="email" readonly name="email" value="<?php echo $row['email'] ?>" class="form-control" id="exampleInputEmail2" placeholder="description">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">contact</label>
                      <div class="col-sm-9">
                        <input type="text" readonly name="contact" value="<?php echo $row['contact'] ?>" class="form-control" id="exampleInputEmail2" placeholder="description">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">File upload</label>
                      <div class="col-sm-9">
                      <img src="shopownerupload/<?php echo $row['imagedb'] ?>" height="100px" width="100px">

                      </div>
                    </div>
 
                    <!-- <button type="submit" name="update" class="btn btn-primary mr-2">Save</button> -->
                    <a type="button" class="btn btn-info btn-rounded btn-fw" href="profileupdate.php?upid=<?php echo $row['owner_id'] ?>">Update</a>
                    <a type="button" class="btn btn-danger btn-rounded btn-fw" href="ownercontroller/profileowner.php?delid=<?php echo $row['owner_id'] ?>" onclick="return confirm('Are you sure you want to delete?');">Delete account</a>
                  </form>
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
