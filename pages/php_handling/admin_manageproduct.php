<?php
session_start();
include '../../config.php';

$useremail = $_SESSION['email'];

$responseData = array();
$productnum = array();

if (isset($_POST['dropdown']) && !empty($_POST['dropdown'])) {
    $userid = $_POST['dropdown'];

    $query = "SELECT COUNT(*) as total FROM product WHERE product_user_id='$userid'";
    $result = mysqli_query($cnx, $query);

    $query2 = "SELECT * FROM product WHERE 	product_user_id='$userid'";
    $result2 = mysqli_query($cnx, $query2);

    


    if ($result) {
        // Check if any rows were returned
        if (mysqli_num_rows($result) > 0) {
            // Fetch and store data in responseData array
            while ($row = mysqli_fetch_assoc($result)) {
                $productnum[] = array(
                    'productnum' => $row['total']
                );
            }
        } else {
            // Handle case where no rows were returned
            $productnum['error'] = 'No data found for the specified case ID.';
        }
    } else {
        // Handle database query error
        $productnum['error'] = 'Error executing database query: ' . mysqli_error($cnx);
    }

    if ($result2) {
        // Check if any rows were returned
        if (mysqli_num_rows($result2) > 0) {
            // Fetch and store data in responseData array
            $i=0;
            while ($i<=$productnum['productnum']) {
                $responseData[] = array(
                    'id_produit ' => $row['id_produit ']
                );
                
            }
        } else {
            // Handle case where no rows were returned
            $responseData['error'] = 'No data found for the specified case ID.';
        }
    } else {
        // Handle database query error
        $responseData['error'] = 'Error executing database query: ' . mysqli_error($cnx);
    }

    // Close the database connection
    mysqli_close($cnx);
} else {
    // Handle invalid or missing cases parameter
    $responseData['error'] = 'Invalid or missing cases parameter in the request.';
}

// Send the response as JSON
header('Content-Type: application/json');
echo json_encode($responseData);
?>