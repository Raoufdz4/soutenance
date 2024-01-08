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
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
     
      justify-content: flex-start;
      align-items: center;
      height:100px;
    }

    .card {
      width: 300px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      padding: 20px;
      text-align: center;
      cursor: pointer;
      transition: transform 0.3s ease-in-out;
    }

    .card:hover {
      transform: scale(1.05);
    }

    .card-title {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .card-description {
      font-size: 14px;
      color: #555;
      margin-bottom: 20px;
    }
  </style>
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
    // Your existing PHP code goes here

    // ... (if you have additional PHP code)

    // Create connection
   
    // Check connection
    if ($cnx->connect_error) {
      die("Connection failed: " . $cnx->connect_error);
    }

    // Number of products to display per page
    $productsPerPage = 7;

    // Get the current page number from the query string
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
    } else {
      $page = 1;
    }

    // Calculate the starting point for the query
    $start = ($page - 1) * $productsPerPage;

    // Query to fetch products for the current page
    $query = "SELECT * FROM product LIMIT $start, $productsPerPage";
    $result = $cnx->query($query);

    ?>

<div class="container">
    <?php
    // Display products
    $counter = 0;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $counter++;

            // Start a new row for every fourth product
            if (($counter - 1) % 4 == 0) {
                echo '<div class="row card-row">';
            }

            echo '<div class="col-md-3  d-flex justify-content-around">
                    <div class="card product-card" onclick="redirectToProductPage()">
                        <div class="card-title">' . $row['product_name'] . '</div>
                        <img src="' . htmlspecialchars($row['image_path']) . '" alt="Product Image" 
                            style="width: 100%; height: 150px;" class="card-img-top">
                        <div class="card-body">
                            <p class="card-text">' . $row['descr'] . '</p>
                        </div>
                        <div class="card-footer">
                            <a href="edit_produit.php?id=' . $row['id_produit'] . '" class="btn btn-primary">Edit</a>
                            <a href="delete_produit.php?id=' . $row['id_produit'] . '" class="btn btn-danger" 
                            onclick="return confirm(\'Are you sure you want to delete this product?\')">Delete</a>
                        </div>
                    </div>
                </div>';

            // End the row for every fourth product
            if ($counter % 4 == 0) {
                echo '</div>';
            }
        }
    }

    // Display "Add Product" card after the last product
    if ($counter > 0) {
        echo '<div class="col-md-3 mb-4">
                <a href="add_produit.php" style="text-decoration: none; color: inherit;">
                  <div class="card product-card">
                    <div class="card-title">Add Product</div>
                    <div class="card-description">Click to add a new product to the database.</div>
                  </div>
                </a>
              </div>';
    }
    ?>
    </div>

      <nav aria-label="Page navigation example" class="pagination">
        <ul class="pagination justify-content-center">
          <?php
            // Calculate the total number of pages
            $query = "SELECT COUNT(*) as total FROM product";
            $result = $cnx->query($query);
            $row = $result->fetch_assoc();
            $totalProducts = $row['total'];
            $totalPages = ceil($totalProducts / $productsPerPage);

            // Display pagination links
            for ($i = 1; $i <= $totalPages; $i++) {
              echo '<li class="page-item ' . ($page == $i ? 'active' : '') . '">
                      <a class="page-link" href="?page=' . $i . '">' . $i . '</a>
                    </li>';
            }
          ?>
        </ul>
      </nav>
    </div>

    <?php
      // Close the database connection
      $cnx->close();
    ?>






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