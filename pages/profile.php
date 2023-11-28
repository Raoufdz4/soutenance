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

<?php

include $partials.'header_top.php';

include $partials.'header_left.php';

?>


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
            <li class="breadcrumb-item"><a href="#">Index</a></li>
            <li class="breadcrumb-item"><a href="#">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="../dist/img/colivraison.png" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3"><?php 
              $req1= "SELECT * FROM user WHERE email='$useremail'";
              $res1= mysqli_query($cnx,$req1);
              if ($res1) {
              // Check if any rows were returned
              if (mysqli_num_rows($res1)>0) {
              $row= mysqli_fetch_assoc($res1);
              echo $row["full_name"] ;
  } 
}  ?></h5>
            <p class="text-muted mb-1">Role : <?php 
              $req1= "SELECT * FROM user_has_roles WHERE id_user='$useremail'";
              $res1= mysqli_query($cnx,$req1);
              if ($res1) {
              // Check if any rows were returned
              if (mysqli_num_rows($res1)>0) {
              $row= mysqli_fetch_assoc($res1);
                echo $row["roles_name"] ;
              
  } 
}  ?></p>
            <p class="text-muted mb-4"><?php 
              $req1= "SELECT * FROM user WHERE email='$useremail'";
              $res1= mysqli_query($cnx,$req1);
              if ($res1) {
              // Check if any rows were returned
              if (mysqli_num_rows($res1)>0) {
              $row= mysqli_fetch_assoc($res1);
              if ($row["user_description"]==null) {
                echo 'No Description' ;
              }
              else {
                echo $row["user_description"] ;
              }
              
  } 
}  ?></p>
            <div class="d-flex justify-content-center mb-2">
              <a type="button" href="editprofile.php" class="btn btn-outline-primary ms-1">Edit</a>
            </div>
          </div>
        </div>
        <div class="card mb-4 mb-lg-0">
          <div class="card-body p-0">
            <ul class="list-group list-group-flush rounded-3">
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fas fa-globe fa-lg text-warning"></i>
                <p class="mb-0"><?php 
              $req1= "SELECT * FROM user_social WHERE id_user='$useremail'";
              $res1= mysqli_query($cnx,$req1);
              if ($res1) {
              // Check if any rows were returned
              if (mysqli_num_rows($res1)>0) {
              $row= mysqli_fetch_assoc($res1);
              if ($row["user_web"]==null) {
                echo 'vide.' ;
              }
              else {
                echo $row["user_web"] ;
              }
              
  } 
}  ?></p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                <p class="mb-0"><?php 
              $req1= "SELECT * FROM user_social WHERE id_user='$useremail'";
              $res1= mysqli_query($cnx,$req1);
              if ($res1) {
              // Check if any rows were returned
              if (mysqli_num_rows($res1)>0) {
              $row= mysqli_fetch_assoc($res1);
              if ($row["user_git"]==null) {
                echo 'vide.' ;
              }
              else {
                echo $row["user_git"] ;
              }
              
  } 
}  ?></p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                <p class="mb-0"><?php 
              $req1= "SELECT * FROM user_social WHERE id_user='$useremail'";
              $res1= mysqli_query($cnx,$req1);
              if ($res1) {
              // Check if any rows were returned
              if (mysqli_num_rows($res1)>0) {
              $row= mysqli_fetch_assoc($res1);
              if ($row["user_twitter"]==null) {
                echo 'vide.' ;
              }
              else {
                echo $row["user_twitter"] ;
              }
              
  } 
}  ?></p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                <p class="mb-0"><?php 
              $req1= "SELECT * FROM user_social WHERE id_user='$useremail'";
              $res1= mysqli_query($cnx,$req1);
              if ($res1) {
              // Check if any rows were returned
              if (mysqli_num_rows($res1)>0) {
              $row= mysqli_fetch_assoc($res1);
              if ($row["user_insta"]==null) {
                echo 'vide.' ;
              }
              else {
                echo $row["user_insta"] ;
              }
              
  } 
}  ?></p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                <p class="mb-0"><?php 
              $req1= "SELECT * FROM user_social WHERE id_user='$useremail'";
              $res1= mysqli_query($cnx,$req1);
              if ($res1) {
              // Check if any rows were returned
              if (mysqli_num_rows($res1)>0) {
              $row= mysqli_fetch_assoc($res1);
              if ($row["user_facebook"]==null) {
                echo 'vide.' ;
              }
              else {
                echo $row["user_facebook"] ;
              }
              
  } 
}  ?></p>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">
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
                </p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php 
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
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php 
              $req1= "SELECT * FROM user WHERE email='$useremail'";
              $res1= mysqli_query($cnx,$req1);
              if ($res1) {
              // Check if any rows were returned
              if (mysqli_num_rows($res1)>0) {
              $row= mysqli_fetch_assoc($res1);
              if ($row["phone"]==null) {
                echo 'vide.' ;
              }
              else {
                echo $row["phone"] ;
              }
              
  } 
}  ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Country</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php 
              $req1= "SELECT * FROM user WHERE email='$useremail'";
              $res1= mysqli_query($cnx,$req1);
              if ($res1) {
              // Check if any rows were returned
              if (mysqli_num_rows($res1)>0) {
              $row= mysqli_fetch_assoc($res1);
              if ($row["country"]==null) {
                echo 'vide.' ;
              }
              else {
                echo $row["country"] ;
              }
              
  } 
}  ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">State</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php 
              $req1= "SELECT * FROM user WHERE email='$useremail'";
              $res1= mysqli_query($cnx,$req1);
              if ($res1) {
              // Check if any rows were returned
              if (mysqli_num_rows($res1)>0) {
              $row= mysqli_fetch_assoc($res1);
              if ($row["state"]==null) {
                echo 'vide.' ;
              }
              else {
                echo $row["state"] ;
              }
              
  } 
}  ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php 
              $req1= "SELECT * FROM user WHERE email='$useremail'";
              $res1= mysqli_query($cnx,$req1);
              if ($res1) {
              // Check if any rows were returned
              if (mysqli_num_rows($res1)>0) {
              $row= mysqli_fetch_assoc($res1);
              if ($row["adresse"]==null) {
                echo 'vide.' ;
              }
              else {
                echo $row["adresse"] ;
              }
              
  } 
}  ?></p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card mb-4 mb-md-0">
              <div class="card-body">
                <p class="mb-3"><span class="text-primary font-italic me-1">Details</span>
                </p>
                <p class="mb-1" style="font-size: .77rem;">Total Earning :</p>
                <p class="text-muted mb-0"> 1000 $</p>
                <hr>
                <p class="mt-1 mb-1" style="font-size: .77rem;">Total Product :</p>
                <p class="text-muted mb-0"> 540 Product</p>
                <hr>
                <p class="mt-1 mb-1" style="font-size: .77rem;">Best Selling Product:</p>
                <p class="text-muted mb-0"> Product 1</p>
                <hr>
                <p class="mt-1 mb-1" style="font-size: .77rem;">Recent Activity : </p>
                <p class="text-muted mb-0"> Activity n 34</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
<div class="col-md-12 mb-5">
          </div>
          <div class="col-md-12 mb-4">
          </div>
</div>


      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
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