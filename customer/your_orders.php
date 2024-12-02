<!-- PHP code starts------------------------------------------------------------------------------------------------>
<?php

include '../config.php';

$admin = new Admin();

if (!isset($_SESSION['cid'])) {
       header("location:loginfront.php");
       //$_SESSION is from admin loginback.php page
       //checks admin login d or not, otherwise it will redirect to login page
}

$s_variable =$_SESSION['cid']; //shows may be particular user data

?>

<?php $query = $admin->ret("SELECT * FROM `customer` where `cid`=" . $s_variable);
                $rowc = $query->fetch(PDO::FETCH_ASSOC); ?>

<!-- PHP code ends------------------------------------------------------------------------------------------------>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Order status</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../admin/assets/vendors/feather/feather.css">
  <link rel="stylesheet" href="../admin/assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../admin/assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../admin/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../admin/assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="../admin/assets/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../admin/assets/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../admin/assets/images/favicon.png" />
</head>
<body>

<!-- body starts ------------------------------------------------------------------------------------->
  <div class="container-scroller"> <!-- 1. container scroller starts -->
      
  <?php include 'header.php' ?>
  <!--  # navbar / header -->

    <div class="container-fluid page-body-wrapper"> <!--2. body wrapper starts-->
    <?php //include 'sidebar.php' ?>
    <!--  #  sidebar   # -->

      <div class="main-panel"> <!--3. main panel starts-->
        <div class="content-wrapper"> <!-- 4. content wrapper starts-->

          <!---------------MAIN CONTENT STARTS------------------->
 <!--table starts-->
 <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">"<?php echo $rowc['cname'] ?>" your order details</h4>

                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Order ID</th>
                          <th>product Name</th>
                          <th>Quantity</th>
                          <th>total</th>
                          <th>Shop Name</th>
                          <th>order status</th>
                          <th>Cancel order</th>
                        </tr>
                      </thead>
                      <tbody>

                      <!--table data starts -->
                <?php  $query=$admin->ret("SELECT * FROM `orders`  INNER JOIN `shopowner` ON orders.owner_id = shopowner.owner_id where `cid_f`=".$s_variable);
                    while($row=$query->fetch(PDO::FETCH_ASSOC) ) { ?>
                        <tr>
                          <td><?php echo $row['order_id']?></td>
                         
                          <td><?php echo $row['name_f']?></td>
                          <td><?php echo $row['quantity']?></td>
                          <td><?php echo $row['total_f']?></td>
                          <td><?php echo $row['shop_name']?></td>

                           <!-- approve conditions -->
                           <?php if($row['order_status']=='pending') { ?>
                          <td><label class="badge badge-warning">Order in progress</label></td>
                          <td><label class="badge badge-danger"><a style="color: white;" href="../shopowner/ownercontroller/order_controller.php?delete_order_id=<?php echo $row['order_id'] ?>">Cancel</a></label></td>
                        
                          <?php } elseif ($row['order_status']=='shipped')  { ?>
                          <td><label class="badge badge-success"><?php echo $row['order_status']?></label></td>
                          <?php } else { ?>
                            <td><label class="badge badge-danger">order cancelled by shopowner</label></td>
                            <?php } ?>

                           
                          <!-- end of approve condition -->
                        
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
          
        </div><!--content wrapper ends-->
        <?php //include 'footer.php' ?>
        <!-- #   footer # -->

      </div> <!--main panel ends-->
    </div> <!--body wrapper ends-->
  </div> <!--container scroller ends-->

<!-- javascript ------------------------------------------------------------------->
  <!-- plugins:js -->
  <script src="../admin/assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../admin/assets/vendors/chart.js/Chart.min.js"></script>
  <script src="../admin/assets/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="../admin/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="../admin/assets/js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../admin/assets/js/off-canvas.js"></script>
  <script src="../admin/assets/js/hoverable-collapse.js"></script>
  <script src="../admin/assets/js/template.js"></script>
  <script src="../admin/assets/js/settings.js"></script>
  <script src="../admin/assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../admin/assets/js/dashboard.js"></script>
  <script src="../admin/assets/js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
