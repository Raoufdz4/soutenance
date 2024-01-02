<?php

include '../../config.php';


if (isset($_GET['id'])) {
    
    $id = htmlspecialchars($_GET['id']);

  
    $deleteQuery = "DELETE FROM product WHERE id_produit = ?";
    $stmt = $cnx->prepare($deleteQuery);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        echo 'Record deleted successfully';
    } else {
        echo 'Error deleting record: ' . $stmt->error;
    }

    $stmt->close();
    
   
    header("Location: ../produit.php");
    exit();
} 
$cnx->close();
?>