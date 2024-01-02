<?php
//init includes :::: 

session_start();

if (!isset($_SESSION['email'])) {
  header('Location:auth/login.php');
  exit();
}

$useremail=$_SESSION['email'];

$webimage="../dist/ServerData/img/colivraison.png";

$adminlink="admin.php";

$homelink="../index.php";

$caseslink="cases.php";

$productlink="produit.php";

$profilelink="profile.php";

$pricemanagelink="pricemanage.php";

$settingslink="parametre.php";

$logoutlink="auth/dec.php";

include '../init.php';

$dist = "../".$dist;

$partials  = "../".$partials;

$auth  = "../".$auth;

$pages = "../".$pages;

$plugins = "../".$plugins;

include '../config.php';

include '../icon.php';

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
          <li class="breadcrumb-item active" aria-current="page">Gestion des prix</li>
          </ol>
        </nav>
      </div>
    </div>


    <div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-body">
<div class="row d-flex justify-content-lg-center mt-1 ml-1 mr-1">
<div class="col-12 bg-gray-light m-1 rounded">

<div class="text-muted mt-3 ml-2  ">Select Case :</div>
<hr>
  <div class="row">
    <div class="col-12 ml-2">
    <label class="ml-2" for="country">Available cases :</label>
    </div>
    </div>
    <div class="row mb-4">
      <div class="col-11 ml-3">
      <select class="form-control bfh-countries" name="cases" id="cases" >
                    <option>The best Expectations</option>
                    <option>The usual Expectations</option>
                    <option>The worst Expectations</option>
                    </select>
      </div>  
    </div>
    
  </div>  

  <div class="col-12 bg-gray-light m-1 rounded">

<div class="text-muted mt-3 ml-2  ">Calcule :</div>
<hr>
    <div class="row mb-4">
      <div class="col-11 ml-3">
      <label for="">Product price:</label>
      <input type="text">
        <label for="">Ads euro</label>
      <input type="text">
      <label for="">Ads da</label>
      <input type="text">
      <label for="">CPR%</label>
      <input type="text">
      <label for="">DR%</label>
      <input type="text">
      </div>  
      
    </div>
    <div class="row mb-4">
        <div class="col-10">

        </div>
        <div class="col-2 d-flex justify-content-center">
            <button class="btn btn-primary file-input-label pl-4 pr-4">Calculate</button>
        </div>
    </div>
  </div>  
</div>
</div>
</div>
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