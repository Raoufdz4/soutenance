<?php

include '../../config.php';

include 'function/f_add_product.php';
if ($cnx->connect_error) {
    die("Connection failed: " . $cnx->connect_error);
}

if (isset($_POST["submit"])) {
    $productName = $_POST["product_name"];
    $description = $_POST["descr"];

    $path = 'product_image/';
    $headerlocation='produit.php';
     addNewProduct($cnx,$productName,$description,$path,$headerlocation,) ;

}


?>



