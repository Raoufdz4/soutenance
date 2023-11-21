<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with minimal features &amp; hover style</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                  <thead>
                  <tr><th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Id</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Product</th></tr>
                  </thead>
                  <tbody>
                  <?php
// Number of products to display per page
$productsPerPage = 2;

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

if ($result->num_rows > 0) {
    // Display products
    while ($row = $result->fetch_assoc()) {
echo '
<tr class="odd">
<td class="dtr-control sorting_1" tabindex="0">'. $row['id_produit'] .'</td>
<td>'. $row['name'] .'</td>
</tr>';
        // echo "Description: " . $row['description'] . "<br>";
    }
}

// Calculate the total number of pages
$query = "SELECT COUNT(*) as total FROM product";
$result = $cnx->query($query);
$row = $result->fetch_assoc();
$totalProducts = $row['total'];
$totalPages = ceil($totalProducts / $productsPerPage);


// Close the database connection
$cnx->close();


?>
                
                </tbody>
                  <tfoot>
                  <tr></tr>
                  </tfoot>

                </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example2_info" role="status" aria-live="polite"><?php $startProduct = ($page - 1) * $productsPerPage + 1;$endProduct = min($startProduct + $productsPerPage - 1, $totalProducts); echo "Showing ".$startProduct." to ".$endProduct." of ".$totalProducts." products."; ?></div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example2_paginate"><ul class="pagination">
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
                </ul></div></div></div></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>