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

$adminlink="../admin.php";

$homelink="../../index.php";

$caseslink="../cases.php";

$productlink="../produits.php";

$profilelink="../profile.php";

$pricemanagelink="../pricemanage.php";

$settingslink="../parametre.php";

$logoutlink="../auth/dec.php";

include '../../init.php';

$dist = "../../".$dist;

$partials  = "../../".$partials;

$auth  = "../../".$auth;

$pages = "../../".$pages;

$plugins = "../../".$plugins;

include '../../config.php';


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
if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);

    $path = 'product_image/';
    $headerlocation='produit.php';

    

if (isset($_FILES["image"])) {
    $productName = $_POST["product_name"];
    $description = $_POST["descr"];

    $uploadFolder = "../../dist/ServerData/img/".$path;
    $uploadPath = $uploadFolder . basename($_FILES["image"]["name"]);
    
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $uploadPath)) {
        // Image moved successfully, now insert into the database
        $escapedImagePath = $cnx->real_escape_string($uploadPath);
    
        // Insert into the database using prepared statements
        $stmt = $cnx->prepare("UPDATE product SET product_name = ?, descr = ?, image_path = ? WHERE id_produit = ?");
        $stmt->bind_param("sssi", $productName, $description, $escapedImagePath, $id);
        
        if ($stmt->execute()) {
            echo "Update successful!";
            header('location:' . $headerlocation . '');
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
        
        $stmt->close();
      } else {
        echo "Error moving the uploaded file.";
        exit(); // or die();
      }
    }

}
    $selectQuery = "SELECT product_name, descr, image_path FROM product WHERE id_produit = ?";
    $stmt = $cnx->prepare($selectQuery);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->bind_result($productName, $description, $imageData);
    $stmt->fetch();
    $stmt->close();

    
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
        <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
   




<!--

    <div class="card card-default col-5">
    <div class="card-header text-bold ">
    <h3 class="card-title pl-2">edit</h3> 
  </div>
    <div class="card-body">
    <form method="post" action="" enctype="multipart/form-data">
        <label for="product_name">Product Name:</label>
        <input type="text" name="product_name" value="<?php //echo $productName; ?>" required>

        <label for="descr">Description:</label>
        <textarea name="descr" required><?php //echo $description; ?></textarea>

        <label for="produit_image">New Image:</label>
        <input type="file" name="produit_image">

        <input type="submit" value="Update">
    </form>
    </div>

 </div>

-->






 
 







    






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