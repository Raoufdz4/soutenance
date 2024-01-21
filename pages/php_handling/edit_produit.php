<?php
ob_start(); // Start output buffering
error_reporting(E_ALL);
ini_set('display_errors', 1);
//init includes :::: 

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

<?php

include 'function/f_edit_product.php';
if (isset($_GET['id'])) {
  $id = htmlspecialchars($_GET['id']);

if ($cnx->connect_error) {
    die("Connection failed: " . $cnx->connect_error);
}

if (isset($_POST["submit"])) {

      $path = 'product_image/';
      $headerlocation='../produit.php';

      $productName = $_POST["product_name"];
      $description = $_POST["descr"];
      $productid = $id;
      $productfile = $_FILES["image"];

     EditProduct($cnx,$productName,$description,$path,$headerlocation,$productid,$productfile) ;

}

$selectQuery = "SELECT product_name, descr, image_path FROM product WHERE id_produit = ?";
$stmt = $cnx->prepare($selectQuery);
$stmt->bind_param('i', $id);
$stmt->execute();
$stmt->bind_result($productName, $description, $imageData);
$stmt->fetch();
$stmt->close();

}
    ?>
    <div class="card card-default col-5">
        <div class="card-header text-bold ">
            <h3 class="card-title pl-2">edit</h3>
        </div>
        <div class="card-body">
      
            <form action="" method="post" enctype="multipart/form-data">
                <label for="name">Name:</label>
                <input type="text" class="form-control col-12" id="name" name="product_name" placeholder="name" value="<?php echo $productName; ?>" required><br>

                <div class="form-group">
                    <label for="message">Description :</label>
                    <textarea class="form-control col-12" id="text" name="descr" rows="3" required><?php echo $description; ?></textarea>
                </div>
<div class="row">           
  <div class="form-group col-9">
      <label for="image">Select an image:</label>
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="image" name="image" required>
        <label class="custom-file-label" for="image">Choose file</label>
      </div>
    </div>
<div class="col d-flex justify-content-center">
  <?php
  if (!empty($imageData)) {
    echo '<img src="' . htmlspecialchars($imageData) . '" alt="Product Image" 
          style="width: 80px; height: 80px;" class="rounded">';
  }
  ?>
  </div>
   </div>              
        <button type="submit" name="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
   

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
ob_end_flush()
?>

</div>

<?php
include  '../../links/js.php';
?>
</body>
</html>