<?php

include '../../config.php';


if (isset($_GET['id'])) {
    
    $id = htmlspecialchars($_GET['id']);

  
    $req1 = "DELETE FROM product WHERE id_produit = $id";
    $res1= mysqli_query($cnx,$req1);
    
    if ($res1) {
        header("Location: ../user/produit.php");
        exit();
    }

} 

?>