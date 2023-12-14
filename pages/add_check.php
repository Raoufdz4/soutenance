<?php



include '../config.php';


/*

if (isset($_POST['name']) && isset($_POST['descr'])/* && isset($_FILES['image'])) {
    
    $name = $_POST['name'];
    $descr = $_POST['descr'];
    
    // File upload handling
    $target_dir = "images/";  // Change this to your desired upload directory
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    // Move the uploaded file to the desired directory
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

        // Insert data into the database
        $req1 = "INSERT INTO product (product_name, descr/*, image) VALUES ('$name', '$descr'/*, '$target_file')";
        $res1 = mysqli_query($cnx, $req1);

        if ($res1) {
            echo "Image uploaded successfully!";
        } else {
            echo "Error: " . mysqli_error($cnx);
        }

    } else {
    echo "Error uploading image. Error details: " . $_FILES["image"]["error"];
}

    echo '<form id="myForm" action="add_produit.php" method="post">';
    echo '<input type="text" name="error_r" value="noerror" hidden>';
    echo '</form>';

    echo '<script>';
    echo 'document.getElementById("myForm").submit();'; 
    echo '</script>';

   

}


*/

/*
if (isset($_POST['product_name']) && isset($_POST['descr'])  ) {
    
    $name = $_POST['product_name'];

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


<?php     */

if ($cnx->connect_error) {
    die("Connection failed: " . $cnx->connect_error);
}

if (isset($_POST["submit"])) {
    $productName = $_POST["product_name"];
    $description = $_POST["descr"];

    // Image handling
    $uploadFolder = "images/";
    $uploadPath = $uploadFolder . basename($_FILES["image"]["name"]);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $uploadPath)) {
        // Image moved successfully, now insert into the database
        $escapedImagePath = $cnx->real_escape_string($uploadPath);

        // Insert into the database using prepared statements
        $stmt = $cnx->prepare("INSERT INTO product (product_name, descr, image_path) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $productName, $description, $escapedImagePath);

        if ($stmt->execute()) {
            echo "Image uploaded and inserted successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error moving the uploaded file.";
    }
}

$cnx->close();
?>










