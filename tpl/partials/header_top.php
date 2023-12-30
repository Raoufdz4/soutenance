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
  </ul>


  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <?php
      $req = "SELECT * FROM user_has_roles WHERE id_user='$useremail' AND roles_name='admin'";
      $res = mysqli_query($cnx, $req);

if ($res && mysqli_num_rows($res) > 0) {
      echo '<li class="nav-item border-right">';
      echo '<a class="nav-link" href="admin.php" role="button"><i class="fa-solid fa-screwdriver-wrench"></i></a>';
      echo '</li>';
}
    ?>
  <!-- Messages Dropdown Menu -->
  <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
      <span class="mr-2">
        <?php 
          $req1 = "SELECT * FROM user WHERE email='$useremail'";
          $res1 = mysqli_query($cnx, $req1);

          if ($res1 && mysqli_num_rows($res1) > 0) {
            $row = mysqli_fetch_assoc($res1);

            $user_name=$row["full_name"];
            $user_email=$row["email"];

            echo $user_name;
          }
        ?>
      </span><i class="fas fa-user-alt"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
      <a href="profile.php" class="dropdown-item">
        <!-- Message Start -->
        <div class="media">
          <div class="media-body">
            <h3 class="dropdown-item-title">
              <?php echo $user_name; ?>
            </h3>
            <p class="text-sm text-muted"><i class="fa fa-envelope mr-1"></i>
              <?php echo $user_email; ?></p>
          </div>
        </div>
        <!-- Message End -->
      </a>
      <div class="dropdown-divider"></div>
      <a href="auth/dec.php" class="dropdown-item dropdown-footer">
        <i class="nav-icon fas fa-door-open"></i>
        <p>déconnecter</p>
      </a>
    </div>
  </li>
</ul>

</nav>
<!-- /.navbar -->