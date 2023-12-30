<?php
//init includes :::: 

session_start();

if (!isset($_SESSION['email'])) {
  header('Location:auth/login.php');
  exit();
}

$useremail=$_SESSION['email'];

include '../init.php';

$dist = "../".$dist;

$partials  = "../".$partials;

$auth  = "../".$auth;

$pages = "../".$pages;

$plugins = "../".$plugins;

include '../config.php';

include '../icon.php';

include '../links/css.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

</head>

<body class="sidebar-mini layout-fixed">
<div class="wrapper">
        
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
  <li class="nav-item border-right">
      <a class="nav-link" href="admin.php" role="button"><i class="fa-solid fa-screwdriver-wrench"></i></a>
    </li>
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
   <!-- Main Sidebar Container -->
   <aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
   <a href="../index.php" class="brand-link">
     <img src="../dist/ServerData/img/colivraison.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8"> 
    <span class="brand-text font-weight-light"><b>Colivraison</b></span>
  </a> 

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex"> -->
      <!-- <div class="image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div> -->
      <!-- <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
      </div> -->
    <!-- </div> -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"> 
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
             <li class="nav-item">

              <?php
              
              if (basename($_SERVER['PHP_SELF'])=="produit.php") {
               echo ' <a href="produit.php" class="nav-link active">
              <i class="nav-icon fa-solid fa-users"></i>
              <p>
                Manage Users
              </p>
            </a>';
              }
            else {
              echo '<a href="produit.php" class="nav-link">
              <i class="nav-icon fa-solid fa-users"></i>
              <p>
                Manage Users
              </p>
            </a>';
            }
              ?>
          </li>
          <li class="nav-item">
              <?php 
              if (basename($_SERVER['PHP_SELF'])=="cases.php") {
               echo ' <a href="cases.php" class="nav-link active">
               <i class="nav-icon fas fa-box-open"></i>
              <p>
              Manage Product
              </p>
            </a>';
              }
            else {
              echo '<a href="cases.php" class="nav-link">
              <i class="nav-icon fas fa-box-open"></i>
              <p>
              Manage Product
              </p>
            </a>';
            }
              ?>
          </li>
              <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
            <i class="nav-icon fa-solid fa-folder-tree  "></i>
              <p>
              Manage Cases
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="widgets.html" class="nav-link">
            <i class="nav-icon fa-solid fa-cloud"></i>
              <p>
                API
              </p>
            </a>
          </li>
          
          <li class="nav-item">
          <?php 
              if (basename($_SERVER['PHP_SELF'])=="parametre.php") {
               echo ' <a href="parametre.php" class="nav-link active">
               <i class="nav-icon fa fa-gear"></i>
              <p>
              Paramètre
              </p>
            </a>';
              }
            else {
              echo '<a href="parametre.php" class="nav-link">
              <i class="nav-icon fa fa-gear"></i>
              <p>
              Paramètre
              </p>
            </a>';
            }
              ?>
          </li>
          
             
           
          <!-- <li class="nav-item menu-open">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Starter Pages
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="fa fa-circle nav-icon"></i>
                <p>Active Page</p>
              </a>
            </li>  -->
            <!-- <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Inactive Page</p>
              </a>
            </li>
          </ul>
        </li> -->
         <!-- <li class="nav-item">
          <a href="dec.php" class="nav-link">
            <i class="nav-icon fas fa-door-open"></i>
            <p>
              deconnecter
            </p>
          </a>
        </li>  -->
      <!-- </ul> -->
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

        <div class="content-wrapper" style="min-height: 2080.12px;"> 
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
      <div class="row">
      <div class="col-md-12 mb-5">
          </div>
          <div class="col-md-12 mb-4">
          </div>
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#">Demo</a></li>
            <li class="breadcrumb-item"><a href="#">Demo</a></li>
            <li class="breadcrumb-item active" aria-current="page">Demo</li>
          </ol>
        </nav>
      </div>
    </div>












    <!-- make ur content here -->






    <div class="row">
<div class="col-md-12 mb-5">
          </div>
          <div class="col-md-12 mb-4">
          </div>
</div>


      </div>
    </section>
        </div>







<?php


include $partials.'footer.php';

?>

</div>

<?php
include  '../links/js.php';
?>
</body>
</html>