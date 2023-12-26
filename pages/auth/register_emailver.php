<?php

include "../../init.php";

$dist = "../../".$dist;

$partials  = "../../".$partials;

$auth  = "../../".$auth;

$pages = "../../".$pages;

$plugins = "../../".$plugins;

include '../../icon.php';

include "../../links/css.php";

?>
<style>
  body{
    background-image: url("../../dist/img/bgcolivraison.png");
  }
</style>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Co</b>livraison</a>
  </div>
  <div class="text-danger text-center pb-3">
  <?php

if (isset($_POST['error_r']) ){
  if ($_POST['error_r']='error1') {
    echo "Email already used.";
  }

} 


?>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>
      <form action="register_ver_check.php" method="post" id="registrationForm">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email_r" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Verify Email</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="mb-3">
        
      </div>

      <a href="login.php" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
<?php

include "../../links/js.php";

?>
</body>

