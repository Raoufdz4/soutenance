<?php

include '../config.php';

include 'fnct_upl_image.php';
if ($cnx->connect_error) {
    die("Connection failed: " . $cnx->connect_error);
}

if (isset($_POST["submit"])) {
    $productName = $_POST["product_name"];
    $description = $_POST["descr"];

    $path = 'products/';
    $headerlocation='produit.php';
     addNewProductImageUpload($cnx,$productName,$description,$path,$headerlocation) ;

}


?>



