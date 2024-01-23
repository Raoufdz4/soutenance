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
<div class="col-12 card">
<div class="card-body">
<div class="row bg-gray-light m-1 rounded d-flex justify-content-center mt-1 ml-1 mr-1">
  <div class="col-6 text-muted mt-3 mb-3 ml-1">Add new product :</div>
  <div class="col-5 d-flex align-items-center justify-content-end">
    <a href="../php_handling/addproduit.php" class="btn btn-primary text-light mr-2">add produit</a>
  </div>
</div>
</div>
</div>

</div>

    <div class="row-10 table-responsive-md">
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
$query = "SELECT * FROM product WHERE product_user_id='$useremail' LIMIT $start, $productsPerPage";
$result = mysqli_query($cnx,$query);

if (mysqli_num_rows($result) > 0) {
    // Display products
    while ($row = mysqli_fetch_assoc($result)) {
        echo '
        <tr>
            <td class="col-1">
                <div class="d-flex align-items-center">' . htmlspecialchars($row['id_produit']) . ' </div>
            </td>
            <td class="col-2">

            <img src="' . htmlspecialchars($row['product_imagepath']) . '" alt="Product Image" 
            style="width: 160px; height: 160px;" class="rounded">
      
            </td>
            <td class="col-3">' . htmlspecialchars($row['product_name']) . ' </td>
            <td class="col-4">' . htmlspecialchars($row['descr']) . '</td>
            <td class="col-2">
                <div class="row d-flex justify-content-center">
                <div class=" col-12 d-flex justify-content-center">
                    <a type="button" href="../php_handling/aboutproduit.php?id=' . $row['id_produit'] . '"
                        class="btn btn-info btn-block m-1 accent-light">About</a>
                        </div>
                <div class=" col-12 d-flex justify-content-center">
                    <a type="button" href="../php_handling/editproduit.php?id=' . $row['id_produit'] . '"
                        class="btn btn-primary btn-block m-1  accent-light">Edit</a>
                        </div> 
                        <div class=" col-12 d-flex justify-content-center">
                    <a href="../php_handling/deleteproduit.php?id=' . $row['id_produit'] . '"
                        type="button" class="btn btn-danger btn-block m-1  accent-light" 
                        onclick="return confirm(\'Are you sure you want to delete this product?\')">Delete</a>
                        </div>
                        
                </div>
            </td>
        </tr>';
    }
}

// Calculate the total number of pages
$query = "SELECT COUNT(*) as total FROM product WHERE product_user_id='$useremail'";
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
     
    
    <div class="col-12 bg-white border pt-2 d-flex justify-content-center">
      <div class="col-md-12">
        <div class="row d-flex justify-content-center">
        <div class="dataTables_info mt-2 ml-2" id="example2_info" role="status" aria-live="polite">
          <?php 
          $startProduct = ($page - 1) * $productsPerPage + 1;$endProduct = min($startProduct + $productsPerPage - 1, $totalProducts);
           echo "Showing ".$startProduct." to ".$endProduct." of ".$totalProducts." products."; 
          ?>
        </div>
        </div>
        <div class="row d-flex justify-content-center">
        <div class="dataTables_paginate paging_simple_numbers mt-1 table-responsive-col" id="example2_paginate">
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
                    $numPagesToShow = 2;    
                  if ($totalPages <= $numPagesToShow * 2 + 1) {
                    // If there are fewer pages than twice the shown number of pages
                    for ($i = 1; $i <= $totalPages; $i++) {
                        echo '<li class="paginate_button page-item '.($page == $i ? 'active' : '').'"><a href="produit.php?page='.$i.'" aria-controls="example2" tabindex="0" class="page-link">'.$i.'</a></li>';
                    }
                } else {
                    // Display first two pages
                    for ($i = 1; $i <= 2; $i++) {
                        echo '<li class="paginate_button page-item '.($page == $i ? 'active' : '').'"><a href="produit.php?page='.$i.'" aria-controls="example2" tabindex="0" class="page-link">'.$i.'</a></li>';
                    }
            
                    // Display ellipses before the current page
                    if ($page > 2 + $numPagesToShow) {
                        echo '<li class="paginate_button page-item disabled"><span class="page-link">...</span></li>';
                    }
            
                    // Display pages around the current page
                    $startPage = max(3, $page - 1);
        $endPage = min($totalPages - 2, $page + 1);

        for ($i = $startPage; $i <= $endPage; $i++) {
            echo '<li class="paginate_button page-item '.($page == $i ? 'active' : '').'"><a href="produit.php?page='.$i.'" aria-controls="example2" tabindex="0" class="page-link">'.$i.'</a></li>';
        }

            
                    // Display ellipses after the current page
                    if ($page < $totalPages - 2 - $numPagesToShow) {
                        echo '<li class="paginate_button page-item disabled"><span class="page-link">...</span></li>';
                    }
            
                    // Display last two pages
                    for ($i = $totalPages - 1; $i <= $totalPages; $i++) {
                        echo '<li class="paginate_button page-item '.($page == $i ? 'active' : '').'"><a href="produit.php?page='.$i.'" aria-controls="example2" tabindex="0" class="page-link">'.$i.'</a></li>';
                    }
                }
    
                    if ($page==$totalPages) {
                        echo '<li class="paginate_button page-item next disabled" id="example2_next"><a href="produit.php?page='.$nump.'"aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>';
                    }
                    elseif ($totalPages==0) {
                      echo '<li class="paginate_button page-item next disabled" id="example2_next"><a href="produit.php?page='.$nump.'"aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>';
                    }
                    else {
                        echo '<li class="paginate_button page-item next" id="example2_next"><a href="produit.php?page='.$nump.'"aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>';
                    }
                    ?> 

                </ul>
                <ul class="pagination d-flex justify-content-center">
                <li class="page-item">
        <input type="text" id="pageInput" class="form-control" placeholder="Go to page">
    </li>
    <li class="page-item">
        <button onclick="goToPage()" class="btn btn-primary">Go</button>
    </li>
                </ul>
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
<script>
    function goToPage() {
        var input = document.getElementById('pageInput');
        var pageNumber = parseInt(input.value);

        // Add validation if needed
        if (!isNaN(pageNumber) && pageNumber >= 1 && pageNumber <= <?php echo $totalPages; ?>) {
            window.location.href = 'produit.php?page=' + pageNumber;
        }
    }
</script>

<?php

include  '../../links/js.php';
?>
</body>
</html>