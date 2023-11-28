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


include $partials.'header_top.php';

include $partials.'header_left.php';

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
            <li class="breadcrumb-item active" aria-current="page"> Edit User Profile</li>
          </ol>
        </nav>
      </div>
    </div>



<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-body">
<div class="row d-flex justify-content-lg-center mt-3">
<div class="col-lg-4 bg-gray-light m-2 rounded">
<div class="text-muted mt-3 text-center">Profile Picture :</div>
<hr>
<div class=" m-4 d-flex justify-content-center">
    <div class="rounded-circle img-fluid bg-light d-flex justify-content-center" style="width: 180px;"><img src="../dist/img/colivraison.png" alt="avatar" class="rounded-circle img-fluid" style="width: 180px;"></div>
</div>
</div>


<div class="col-lg-7 bg-gray-light m-2 rounded">
<div class="text-muted mt-3 text-center">Profile Details :</div>
<hr>
</div>
</div>
<div class="row d-flex justify-content-lg-center">
<div class="col-lg-11 bg-gray-light m-2 rounded">
<div class="text-muted mt-3 text-center">Profile Description :</div>
<hr>
</div>
</div>
<div class="row d-flex justify-content-lg-center">
<div class="col-lg-11 bg-gray-light m-2 rounded">
<div class="text-muted mt-3 text-center">Profile Social Media :</div>
<hr>
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