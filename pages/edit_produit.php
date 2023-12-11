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

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $newProductName = $_POST['product_name'];
        $newDescription = $_POST['descr'];
        $newImageData = '';

        if ($_FILES['produit_image']['size'] > 0) {
            
            $newImageData = file_get_contents($_FILES['produit_image']['tmp_name']);
        }

        
        $updateQuery = "UPDATE product SET product_name = ?, descr = ?, produit_image = ? WHERE id_produit = ?";
        $stmt = $cnx->prepare($updateQuery);
        $stmt->bind_param('sssi', $newProductName, $newDescription, $newImageData, $id);

        if ($stmt->execute()) {
            echo 'Record updated successfully';
        } else {
            echo 'Error updating record: ' . $stmt->error;
        }

        $stmt->close();
    }

    
    $selectQuery = "SELECT product_name, descr, produit_image FROM product WHERE id_produit = ?";
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

                <label for="produit_image">Select an image:</label>
                <input type="file" name="produit_image" required><br><br>

                
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
    <?php
} else {
   
    header("Location: error_page.php");
    exit();
}


$cnx->close();
?>




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

?>

</div>

<?php
include  '../links/js.php';
?>
</body>
</html>