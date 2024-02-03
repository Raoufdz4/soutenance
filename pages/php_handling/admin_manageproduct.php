<?php
session_start();
include '../../config.php';

$useremail = $_SESSION['email'];

$responseData = array();

if (isset($_POST['cases']) && !empty($_POST['cases'])) {
    $caseid = $_POST['cases'];

    $query = "SELECT * FROM cases WHERE id_case='$caseid' AND (cases_user='$useremail' OR cases_user='ALL')";
    $result = mysqli_query($cnx, $query);

    if ($result) {
        // Check if any rows were returned
        if (mysqli_num_rows($result) > 0) {
            // Fetch and store data in responseData array
            while ($row = mysqli_fetch_assoc($result)) {
                $responseData[] = array(
                    'ads_euro' => $row['ads_euro'],
                    'exchange_rate' => $row['exchange_rate'],
                    'cpc' => $row['cpc'],
                    'cpd' => $row['cpd']
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
