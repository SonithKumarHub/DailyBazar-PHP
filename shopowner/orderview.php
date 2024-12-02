<!-- PHP code starts------------------------------------------------------------------------------------------------>
<?php

include '../config.php';

$admin = new Admin();

if (!isset($_SESSION['owner_id'])) {
  header("location:loginfront.php");
}

$s_variable =$_SESSION['owner_id']; 

?>

?>

<!-- PHP code ends------------------------------------------------------------------------------------------------>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>order details</title>
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
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Order Details</h4>
                  <!--<p class="card-description">
                    Add class <code>.table-hover</code>
                  </p>-->
                  <div class="table-responsive">
                    <table class="table table-hover js-number">
                      <thead>
                        <tr>
                          <th>Product name</th>
                          <th>Customer Name</th>
                          <th>Total price</th>
                          <th>Quantity</th>
                          
                        </tr>
                      </thead>
                      <tbody>

                      <!--table data starts -->
                <?php  $query=$admin->ret("SELECT * FROM `orders` INNER JOIN `customer` ON orders.cid_f=customer.cid where `owner_id`=$s_variable ");
                    while($row=$query->fetch(PDO::FETCH_ASSOC) ) { ?>
                        <tr>
                          <td><?php echo $row['name_f']?></td>
                          <td><?php echo $row['cname']?></td>
                          <td><?php echo $row['total_f']?></td>
                          <td><?php echo $row['quantity']?></td>

                

                          <!-- approve conditions -->
                          <?php if($row['order_status']=='pending') { ?>
                            
                            <td><a href="ownercontroller/ship_order.php?order_id=<?php echo $row['order_id'] ?>" type="button" class="btn btn-info btn-rounded btn-fw" href="">Ship product</a></td>
                            <td><a type="button" class="btn btn-warning btn-rounded btn-fw" href="ownercontroller\orderview_back.php?cancel_order=<?php echo $row['order_id'] ?>">Cancel order</a></td>
                            <?php } elseif($row['order_status']=='shipped') { ?>
                              
                              <td><button type="button" class="btn btn-success btn-rounded btn-fw">shipping completed</button></td>
                            
                              <?php } else { ?>
                                <td><button type="button" class="btn btn-danger btn-rounded btn-fw">order cancelled</button></td>
                              <?php } ?>
                          <!-- end of approve condition -->

                          <!-- <td><a type="button" class="btn btn-warning btn-rounded btn-fw" href="ownercontroller\orderview_back.php?cancel_order=<?php echo $row['order_id'] ?>">Cancel order</a></td> -->
                        </tr>
                    <?php } ?> <!--while loop ends-->
                    <!--table data ends-->
                      </tbody>
                    </table>
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


  <!-- srial number -->
  <script src="assets/js/number.js"></script> 
</body>

</html>
