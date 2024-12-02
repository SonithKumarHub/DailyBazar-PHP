<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Customer registration</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../admin/assets/vendors/feather/feather.css">
  <link rel="stylesheet" href="../admin/assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../admin/assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../admin/assets/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../admin/assets/images/favicon.png" />
</head>

<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">

            <h4 style="text-align:center; color:#4B49AC; font-family: Arial, sans-serif;"><b>Customer registration</b></h4>

              <form class="pt-3" action="customercontroller/regback.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                <div class="form-group">
                  <input type="text" name="cname" placeholder="customer name" pattern="[a-zA-Z'-'\s]*" title="No numbers or special characters are allowed" required class="form-control form-control-lg" id="exampleInputUsername1">
                </div>

                <div class="form-group">
                  <input type="text" name="username" placeholder="username" pattern="[a-z]+" title="only lower case letters are allowed without space" required class="form-control form-control-lg" id="exampleInputUsername1">
                </div>

                <div class="form-group">
                  <input type="password" name="password" placeholder="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$" title="At least 1 Uppercase, 1 Lowercase, 1 Number,1 Symbol(!@#$%^&*_=+-) Min 8 chars and Max 12 chars" required  class="form-control form-control-lg" id="exampleInputUsername1">
                </div>

                <div class="form-group">
                  <input type="text" name="address" pattern="[a-zA-Z'-'\s]*" title="No numbers or special charaters are allowed" placeholder="address" required  class="form-control form-control-lg" id="exampleInputUsername1">
                </div>

                <div class="form-group">
                  <input type="text" pattern="[7-9]{1}[0-9]{9}" title="Phone number should start with 7,8,9 and contain 10 digits" name="contact" placeholder="contact" required  class="form-control form-control-lg" id="exampleInputUsername1">
                </div>

                <div class="form-group">
                    <input type="file" name="image" class="form-control form-control-lg" required> <br>
                </div>


                <div class="mt-3">
                <input type="submit" name="register" value="Rigister" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="loginfront.php" class="text-primary">Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->


<!-- javascript -------------------------------------------------------->
  <!-- plugins:js -->
  <script src="../admin/assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../admin/assets/js/off-canvas.js"></script>
  <script src="../admin/assets/js/hoverable-collapse.js"></script>
  <script src="../admin/assets/js/template.js"></script>
  <script src="../admin/assets/js/settings.js"></script>
  <script src="../admin/assets/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
