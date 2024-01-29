<?php
//init includes :::: 

session_start();

if (!isset($_SESSION['email'])) {
  header('Location:auth/login.php');
  exit();
}

$useremail=$_SESSION['email'];

$webimage="../../dist/ServerData/img/colivraison.png";

$adminlink="../admin/admin.php";

$homelink="../../index.php";

$caseslink="../user/cases.php";

$productlink="../user/produit.php";

$profilelink="../user/profile.php";

$pricemanagelink="../user/pricemanage.php";

$settingslink="../user/parametre.php";

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

if (isset($_GET['id'])) {
    
    $aproductid = htmlspecialchars($_GET['id']);
  
  }
  $req="SELECT * FROM product WHERE id_produit='$aproductid' AND product_user_id='$useremail'";
  $res=mysqli_query($cnx,$req);
  if ($res) {
    $row=mysqli_fetch_assoc($res);
    $targetFile=$row['product_imagepath'];
    $productname=$row['product_name'];
    $productdescr=$row['descr'];
  }
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
            <li class="breadcrumb-item"><a href="#">Demo</a></li>
            <li class="breadcrumb-item"><a href="#">Demo</a></li>
            <li class="breadcrumb-item active" aria-current="page">Demo</li>
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
<div class="text-muted mt-3 text-center">Product Picture :</div>
<hr>
<div class="row m-4 d-flex justify-content-center">
<div class="rounded-circle img-fluid bg-light d-flex justify-content-center" style="width: 180px;">
    <img src="<?php echo $targetFile; ?>" alt="avatar" class="img-fluid" id="image_preview" style="width: 180px;height:180px;">
  </div>
</div>
</div>
<div class="col-lg-7 bg-gray-light m-2 rounded">
<div class="text-muted mt-3 text-center">Product Details :</div>
<hr>
<div class="card-body">
             <div class="text-muted">Product name:</div>
             <div class="ml-2 mt-1"><?php echo $productname ?></div>
             <hr>
             <div class="text-muted mt-3">Product description:</div>
             <div class="ml-2 mt-1"><?php echo $productdescr ?></div>
             
  </div>
</div>
</div>
<div class="row d-flex justify-content-lg-center">
<div class="col-lg-11 bg-gray-light m-2 rounded">
<div class="text-muted mt-3 text-center">Product Price Management :</div>
<hr>

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
include  '../../links/js.php';
?>
</body>
</html>