<?php


include '../config.php';


if (isset($_POST['name']) && isset($_POST['descr']) ) {


    $name = $_POST['name'];

    $descr = $_POST['descr'];

   
    $req1="INSERT INTO product (product_name,descr) VALUES ('$name','$descr')";
    $res1=mysqli_query($cnx,$req1);

    echo '<form id="myForm" action="add_produit.php" method="post">';
    echo '<input type="text" name="error_r" value="noerror" hidden>';
    echo '</form>';

    echo '<script>';
    echo 'document.getElementById("myForm").submit();'; 
    echo '</script>';



}














?>



