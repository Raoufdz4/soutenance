<?php
session_start();

if (!isset($_SESSION['email'])) {
  header('Location:../auth/login.php');
  exit();
}

$useremail=$_SESSION['email'];

$webimage="../../dist/ServerData/img/colivraison.png";

$adminlink="../admin/admin.php";

$homelink="../../index.php";

$caseslink="cases.php";

$productlink="produit.php";

$profilelink="profile.php";

$pricemanagelink="pricemanage.php";

$settingslink="parametre.php";

$logoutlink="../php_handling/auth/dec.php";

include '../../init.php';

$dist = "../../".$dist;

$partials  = "../../".$partials;

$auth  = "../../".$auth;

$pages = "../../".$pages;

$plugins = "../../".$plugins;

include '../../config.php';

include '../../icon.php';

include '../../links/css.php';


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
<div class="col-lg-12">
<div class="card">
<div class="card-body">
<div class="row d-flex justify-content-lg-center mt-1 ml-1 mr-1">


  <div class="col-12 bg-gray-light m-1 rounded">

<div class="text-muted mt-3 ml-2">Add case :</div>
<hr>
<form action="addcases_check.php" method="post">
    <div class="row mb-4">
      <div class="col-12 ml-3">
        <div class="row">
        <div class="col-12">
        <label for="case_name">Case name :</label>
        <input type="text" id="case_name" name="case_name" size="40" required>
        </div>    
        </div>
        <div class="row">
        <div class="col-12">
        <label for="price_adseuro">Ads euro :</label>
        <input type="number" id="price_adseuro" name="price_adseuro" required>
        </div>
        </div>
      <div class="row">
        <div class="col-12">
        <label for="cpc">CPC% :</label>
      <input type="number"  id="cpc" name="cpc" required>
        </div>
      </div>
      <div class="row">
      <div class="col-12">
        <label for="cpd">CPD% :</label>
        <input type="number" id="cpd" name="cpd" required>
        </div>
        </div>
        <div class="row d-flex justify-content-center">
      <div class="col-11 d-flex justify-content-end">
      <a class="btn btn-outline-primary file-input-label mr-3 pl-4 pr-4" href="../user/cases.php">Back</a>
      <input class="btn btn-primary file-input-label pl-4 pr-4" type="submit" value="Save">
        </div>
      </div>  
      
    </div>
  </div>  
  </form>
</div>
</div>
</div>
</div>
</div>







</div>

<?php
include  '../../links/js.php';
?>
</body>
</html>