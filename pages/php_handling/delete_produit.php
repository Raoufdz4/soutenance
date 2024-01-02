<?php
/*
include '../config.php';


if (isset($_GET['id'])) {
    
    $id = htmlspecialchars($_GET['id']);

    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        

        
        $deleteQuery = "DELETE FROM product WHERE id_produit = ?";
        $stmt = $cnx->prepare($deleteQuery);
        $stmt->bind_param('i', $id);

        if ($stmt->execute()) {
            echo 'Record deleted successfully';
        } else {
            echo 'Error deleting record: ' . $stmt->error;
        }

        $stmt->close();
    }

    
    ?>
    <p>Are you sure you want to delete this product?</p>
    <form method="post" action="">
        <input type="submit" value="Yes, Delete">
    </form>
    <?php
} else {
    
    header("Location: error_page.php");
    exit();
}


$cnx->close();
*/
?>

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