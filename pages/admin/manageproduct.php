<?php
// init includes

session_start();

if (!isset($_SESSION['email'])) {
    header('Location:auth/login.php');
    exit();
}

$useremail = $_SESSION['email'];

$webimage = "../../dist/ServerData/img/colivraison.png";

$adminlink = "../admin/admin.php";

$homelink = "../../index.php";

$manageuserslink = "manageusers.php";

$managecaseslink = "managecases.php";

$manageproduitlink = "manageproduct.php"; // Updated link

$profilelink = "profile.php";

$pricemanagelink = "pricemanage.php";

$settingslink = "parametre.php";

$logoutlink = "../php_handling/auth/dec.php";

include '../../init.php';

$dist = "../../" . $dist;

$partials  = "../../" . $partials;

$auth  = "../../" . $auth;

$pages = "../../" . $pages;

$plugins = "../../" . $plugins;

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
        include $partials . 'admin_headertop.php';
        include $partials . 'admin_headerleft.php';
        ?>

        <div class="content-wrapper" style="min-height: 2080.12px;">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 mb-5"></div>
                        <div class="col-md-12 mb-4"></div>
                        <div class="col">
                            <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="#">Index</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Produits</li>
                                </ol>
                            </nav>


                            <form action="manageproduct.php" method="post">
    <label for="dropdown">Select an option:</label>
    <select name="dropdown" id="dropdown">
        <option value="all">All</option>
        <?php
       // Fetch all emails from the database table
            $sql = "SELECT id, email FROM user";
            $result = $cnx->query($sql);
        
        // Create options using a loop
        while ($row = $result->fetch_assoc()) {
            $email = $row["email"];
            echo "<option value='" . $email . "'>" . $email . "</option>";
        }
        ?>
    </select>

    <!-- Other form elements or buttons can be added here -->
    <input type="submit" value="Submit">
</form>



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
$productsPerPage = 2;

// Get the current page number from the query string
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

// Calculate the starting point for the query
$start = ($page - 1) * $productsPerPage;

// Initialize $totalProducts
$totalProducts = 0;

// Calculate the total number of products
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the selected value from the dropdown
    $selectedOption = $_POST["dropdown"];

    // Adjust the SQL query and total count based on the selected option
    if ($selectedOption == "all") {
        // Fetch all products
        $query = "SELECT * FROM product LIMIT $start, $productsPerPage";
        $queryTotalProducts = "SELECT COUNT(*) as total FROM product";
    } else {
        // Fetch products for the selected user
        $query = "SELECT * FROM product WHERE product_user_id = '$selectedOption' LIMIT $start, $productsPerPage";
        $queryTotalProducts = "SELECT COUNT(*) as total FROM product WHERE product_user_id = '$selectedOption'";
    }
} else {
    // If the form is not submitted, fetch all products
    $query = "SELECT * FROM product LIMIT $start, $productsPerPage";
    $queryTotalProducts = "SELECT COUNT(*) as total FROM product";
}

// Execute the query to fetch products
$result = mysqli_query($cnx, $query);

// Check for errors in the query
if (!$result) {
    die("Query failed: " . $cnx->error);
}

if (mysqli_num_rows($result) > 0) {
    // Display products
    while ($row = mysqli_fetch_assoc($result)) {
        // Display product details as needed
        // ...

        echo '<tr>
            <td class="col-1">
                <div class="d-flex align-items-center">' . htmlspecialchars($row['id_produit']) . ' </div>
            </td>
            <td class="col-2">
                <img src="' . htmlspecialchars($row['product_imagepath']) . '" alt="Product Image" style="width: 160px; height: 160px;" class="rounded">
            </td>
            <td class="col-3">' . htmlspecialchars($row['product_name']) . ' </td>
            <td class="col-4">' . htmlspecialchars($row['descr']) . '</td>
            <td class="col-2">
                <div class="row d-flex justify-content-center">
                    <!-- Actions as needed -->
                </div>
            </td>
        </tr>';
    }
}

//Execute the query to get the total number of products for the selected user or all users
$resultTotalProducts = mysqli_query($cnx, $queryTotalProducts);

if ($resultTotalProducts) {
    $rowTotalProducts = mysqli_fetch_assoc($resultTotalProducts);
    $totalProducts = $rowTotalProducts['total'];
    mysqli_free_result($resultTotalProducts);
} else {
    die("Query for total products failed: " . $cnx->error);
}

echo "Total products: " . $totalProducts; // Debugging line, remove in production

// Calculate the total number of pages for the selected user or all users
$totalPages = ceil($totalProducts / $productsPerPage);

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
                                $startProduct = ($page - 1) * $productsPerPage + 1;
                                $endProduct = min($startProduct + $productsPerPage - 1, $totalProducts);
                                echo "Showing " . $startProduct . " to " . $endProduct . " of " . $totalProducts . " products";
                                ?>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="dataTables_paginate paging_simple_numbers mt-1 table-responsive-col" id="example2_paginate">
                                <ul class="pagination">
                                    <?php
                                    $nump = $page;
                                    $add = 1;
                                    $nump = $nump + $add;
                                    $numm = $page;
                                    $numm = $numm - $add;

                                    if ($page == 1) {
                                        echo '<li class="paginate_button page-item previous disabled" id="example2_previous"><a href="manageproduct.php?page=' . $numm . '" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>';
                                    } else {
                                        echo '<li class="paginate_button page-item previous" id="example2_previous"><a href="manageproduct.php?page=' . $numm . '" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>';
                                    }
                                    ?>
                                    <?php
                                    $numPagesToShow = 2;
                                    if ($totalPages <= $numPagesToShow * 2 + 1) {
                                        // If there are fewer pages than twice the shown number of pages
                                        for ($i = 1; $i <= $totalPages; $i++) {
                                            echo '<li class="paginate_button page-item ' . ($page == $i ? 'active' : '') . '"><a href="manageproduct.php?page=' . $i . '" aria-controls="example2" tabindex="0" class="page-link">' . $i . '</a></li>';
                                        }
                                    } else {
                                        // Display first two pages
                                        for ($i = 1; $i <= 2; $i++) {
                                            echo '<li class="paginate_button page-item ' . ($page == $i ? 'active' : '') . '"><a href="manageproduct.php?page=' . $i . '" aria-controls="example2" tabindex="0" class="page-link">' . $i . '</a></li>';
                                        }

                                        // Display ellipses before the current page
                                        if ($page > 2 + $numPagesToShow) {
                                            echo '<li class="paginate_button page-item disabled"><span class="page-link">...</span></li>';
                                        }

                                        // Display pages around the current page
                                        $startPage = max(3, $page - 1);
                                        $endPage = min($totalPages - 2, $page + 1);

                                        for ($i = $startPage; $i <= $endPage; $i++) {
                                            echo '<li class="paginate_button page-item ' . ($page == $i ? 'active' : '') . '"><a href="manageproduct.php?page=' . $i . '" aria-controls="example2" tabindex="0" class="page-link">' . $i . '</a></li>';
                                        }

                                        // Display ellipses after the current page
                                        if ($page < $totalPages - 2 - $numPagesToShow) {
                                            echo '<li class="paginate_button page-item disabled"><span class="page-link">...</span></li>';
                                        }

                                        // Display last two pages
                                        for ($i = $totalPages - 1; $i <= $totalPages; $i++) {
                                            echo '<li class="paginate_button page-item ' . ($page == $i ? 'active' : '') . '"><a href="manageproduct.php?page=' . $i . '" aria-controls="example2" tabindex="0" class="page-link">' . $i . '</a></li>';
                                        }
                                    }

                                    if ($page == $totalPages) {
                                        echo '<li class="paginate_button page-item next disabled" id="example2_next"><a href="manageproduct.php?page=' . $nump . '"aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>';
                                    } elseif ($totalPages == 0) {
                                        echo '<li class="paginate_button page-item next disabled" id="example2_next"><a href="manageproduct.php?page=' . $nump . '"aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>';
                                    } else {
                                        echo '<li class="paginate_button page-item next" id="example2_next"><a href="manageproduct.php?page=' . $nump . '"aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>';
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
            </section>
        </div>

        <?php
        include $partials . 'footer.php';
        ?>

    </div>
    <script>
        function goToPage() {
            var input = document.getElementById('pageInput');
            var pageNumber = parseInt(input.value);

            // Add validation if needed
            if (!isNaN(pageNumber) && pageNumber >= 1 && pageNumber <= <?php echo $totalPages; ?>) {
                window.location.href = 'manageproduct.php?page=' + pageNumber;
            }
        }
    </script>

    <?php
    include  '../../links/js.php';
    ?>
</body>

</html>