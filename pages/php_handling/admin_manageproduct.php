<?php
session_start();
include '../../config.php';

$useremail = $_SESSION['email'];

$responseData = array();
$productnum = array();

// Check if myUser is not present in POST or if it's "all"
if (!isset($_POST['myUser']) || $_POST['myUser'] === "all") {
    // Handle the case where user selects "all" users or leaves it empty
    $query = "SELECT * FROM product";
} else {
    $userid = $_POST['myUser'];
    $query = "SELECT * FROM product WHERE product_user_id='$userid'";
}

// Execute query to count total products
$countQuery = "SELECT COUNT(*) as total FROM ($query) as count_query";
$countResult = mysqli_query($cnx, $countQuery);

if ($countResult && $countRow = mysqli_fetch_assoc($countResult)) {
    $totalProducts = $countRow['total'];
} else {
    $totalProducts = 0; // Default to 0 if query fails
}

// Pagination parameters
$page = isset($_POST['page']) ? intval($_POST['page']) : 1; // Current page
$limit = 5; // Products per page
$offset = ($page - 1) * $limit; // Offset calculation

// Modify query for pagination
$query .= " LIMIT $limit OFFSET $offset";

// Execute the query to get products
$result = mysqli_query($cnx, $query);

if ($result) {
    // Fetch and store data in responseData array
    while ($row = mysqli_fetch_assoc($result)) {
        $responseData[] = array(
            'id_produit' => $row['id_produit'],
            'product_imagepath' => $row['product_imagepath'],
            'product_name' => $row['product_name'],
            'descr' => $row['descr']
        );
    }

    // Calculate total pages based on total products and limit
    $totalPages = ceil($totalProducts / $limit);

    // If there are no products, ensure at least one page is displayed
    if ($totalPages == 0) {
        $totalPages = 1;
    }
} else {
    // Handle the case where the query fails
    $totalPages = 1; // Set default total pages to 1
}

// Send the response as JSON
header('Content-Type: application/json');
echo json_encode(array('products' => $responseData, 'total_pages' => $totalPages, 'current_page' => $page));
?>