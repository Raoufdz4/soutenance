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
            <li class="breadcrumb-item active" aria-current="page">Produits</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
    <table class="table align-middle mb-0 bg-white border">
  <thead class="bg-light">
    <tr>
      <th class="col-1">Id</th>
      <th class="col-2">Image</th>
      <th class="col-3">Name</th>
      <th class="col-4">Description</th>
      <th class="col-2">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php
// Number of products to display per page
$productsPerPage = 5;

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
$result = mysqli_query($cnx,$query);

if (mysqli_num_rows($result)>0) {
    // Display products
    while ($row = mysqli_fetch_assoc($result)) {
echo '
<tr>
    <td class="col-1">
        <div class="d-flex align-items-center">'. $row['id_produit'] .' </div>
      </td>
      <td class="col-2">
        <img
              src="../dist/img/no_photo.png"
              alt=""
              style="width: 80px; height: 80px"
              class="rounded"
              />
      </td>
      <td class="col-3">'. $row['product_name'] .' </td>
      <td class="col-4">'. $row['descr'] .'</td>
      <td class="col-2">
      <div class="row d-flex justify-content-center">
      
      <button type="button" class="btn btn-primary col-12 col-lg-6 accent-light">
      <a href="edit_produit.php?id='. $row['id_produit'] .'"> Edit</a>
      </button>

      <button type="button" class="btn btn-danger col-12 col-lg-6 accent-light">
      <a href="delete_produit.php?id='. $row['id_produit'] .'"> Delete</a> 
      </button>

      <div class="collapsed  col-md-1"></div>

      </div>
    </td>
</tr>';
    }
}

// Calculate the total number of pages
$query = "SELECT COUNT(*) as total FROM product";
$result = mysqli_query($cnx,$query);
$row = mysqli_fetch_assoc($result);
$totalProducts = $row['total'];
$totalPages = ceil($totalProducts / $productsPerPage);


// Close the database connection
mysqli_close($cnx);


?>

  </tbody>
</table>
</div>
    </div>
    <div class="row bg-white border pt-2 d-flex justify-content-between ">      
      <div class="col-md-3 col-sm-3 d-none d-sm-block d-flex justify-content-center">
        <div class="dataTables_info mt-2 ml-2  " id="example2_info" role="status" aria-live="polite">
          <?php $startProduct = ($page - 1) * $productsPerPage + 1;$endProduct = min($startProduct + $productsPerPage - 1, $totalProducts); echo "Showing ".$startProduct." to ".$endProduct." of ".$totalProducts." products."; ?>
      </div>
    </div>
    <div class="col-8 col-md-6 col-sm-5 d-flex justify-content-center">
      <div class="dataTables_paginate paging_simple_numbers mt-1" id="example2_paginate">
        <ul class="pagination">
                    <?php
                    $nump=$page; $add=1; $nump=$nump + $add; 
                    $numm=$page; $numm=$numm - $add; 

                    if ($page==1) {
                        echo '<li class="paginate_button page-item previous disabled" id="example2_previous"><a href="produit.php?page='.$numm.'" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>';
                    }
                    else {
                        echo '<li class="paginate_button page-item previous" id="example2_previous"><a href="produit.php?page='.$numm.'" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>';
                    }
                    ?>
                <?php
                    for ($i = 1; $i <= $totalPages; $i++) {
                        if ($page==$i) {
                            echo '<li class="paginate_button page-item active"><a href="produit.php?page='.$i.'" aria-controls="example2" data-dt-idx="'.$i.'" tabindex="0" class="page-link">'.$i.'</a></li>';
                        }
                        else {
                            echo '<li class="paginate_button page-item"><a href="produit.php?page='.$i.'" aria-controls="example2" data-dt-idx="'.$i.'" tabindex="0" class="page-link">'.$i.'</a></li>';
                        }
                    }
                    
                    
                    if ($page==$totalPages) {
                        echo '<li class="paginate_button page-item next disabled" id="example2_next"><a href="produit.php?page='.$nump.'"aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>';
                    }
                    else {
                        echo '<li class="paginate_button page-item next" id="example2_next"><a href="produit.php?page='.$nump.'"aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>';
                    }
                    ?> 

                </ul></div></div> 
                   
                  <div class="col-4 col-md-3 col-sm-4 d-flex justify-content-center ">  <button type="button" class="btn btn-primary mt-1" style="height: 40px ;"><a href="add_produit.php"class="text-light">add produit</a></button></div>
                  </div>
                </div>
                <div class="row">
<div class="col-md-12 mb-5">
          </div>
          <div class="col-md-12 mb-4">
          </div>
</div>
        <!-- /.row -->
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