  <!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light fixed-top">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="../index.php" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Contact</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Help
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
        <a class="dropdown-item" href="#">FAQ</a>
        <a class="dropdown-item" href="#">Support</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Contact</a>
      </div>
    </li>
  </ul>

  

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
      <span class="mr-2">
        <?php 
              $req1= "SELECT * FROM user WHERE email='$useremail'";
              $res1= mysqli_query($cnx,$req1);
              if ($res1) {
              // Check if any rows were returned
              if (mysqli_num_rows($res1)>0) {
              $row= mysqli_fetch_assoc($res1);
              echo $row["full_name"] ;
  } 
}  ?>
        </span><i class="fas fa-user-alt"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <a href="profile.php" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
            <!-- <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle"> -->
            <div class="media-body">
              <h3 class="dropdown-item-title">
              <?php 
              $req1= "SELECT * FROM user WHERE email='$useremail'";
              $res1= mysqli_query($cnx,$req1);
              if ($res1) {
              // Check if any rows were returned
              if (mysqli_num_rows($res1)>0) {
              $row= mysqli_fetch_assoc($res1);
              echo $row["full_name"] ;
  } 
}  ?>
              </h3>
              <p class="text-sm text-muted"><i class="fa fa-envelope mr-1"></i>
              <?php 
              $req1= "SELECT * FROM user WHERE email='$useremail'";
              $res1= mysqli_query($cnx,$req1);
              if ($res1) {
              // Check if any rows were returned
              if (mysqli_num_rows($res1)>0) {
              $row= mysqli_fetch_assoc($res1);
              echo $row["email"] ;
  } 
}  ?></p>
            </div>
          </div>
          <!-- Message End -->
        </a>
        </a>
        <div class="dropdown-divider"></div>
        <a href="auth/dec.php" class="dropdown-item dropdown-footer"><i class="nav-icon fas fa-door-open"></i>
            <p>
              déconnecter
            </p></a>
      </div>
    </li>
    <!-- <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
          class="fas fa-th-large"></i></a>
    </li> -->
  </ul>
</nav>
<!-- /.navbar -->