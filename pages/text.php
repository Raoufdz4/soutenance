<?php


include '../config.php';



if (isset($_POST['name']) && isset($_POST['descr'])  && isset($_FILES['produit_image']) ) {
    
    $name = $_POST['name'];

    $descr = $_POST['descr'];

    $image = $_FILES['produit_image'];


    $req1="INSERT INTO product (product_name,descr,produit_image) VALUES ('$name','$descr','$image')";
    $res1=mysqli_query($cnx,$req1);

    echo '<form id="myForm" action="add_produit.php" method="post">';
    echo '<input type="text" name="error_r" value="noerror" hidden>';
    echo '</form>';

    echo '<script>';
    echo 'document.getElementById("myForm").submit();'; 
    echo '</script>';



}
// Assuming $cnx is your database connection variable

if (isset($_POST['name']) && isset($_POST['descr']) && isset($_FILES['image'])) {
    
    $name = $_POST['name'];
    $descr = $_POST['descr'];
    
    // File upload handling
    $target_dir = "images/";  // Change this to your desired upload directory
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    // Move the uploaded file to the desired directory
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

        // Insert data into the database
        $req1 = "INSERT INTO product (product_name, descr, image) VALUES ('$name', '$descr', '$target_file')";
        $res1 = mysqli_query($cnx, $req1);

        if ($res1) {
            echo "Image uploaded successfully!";
        } else {
            echo "Error: " . mysqli_error($cnx);
        }

    } else {
        echo "Error uploading image.";
    }
}
?>








<?php

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email =$_POST["email"];

    try {
        include "dbh.inc.php ";

        $query=" INSERT INTO users(username, password, email)
        VALUES (:username, :password, :email);";

        $stmt =$pdo->prepare($query);

        $stmt->bindparam(":username", $username);
        $stmt->bindparam(":password", $password);
        $stmt->bindparam(":email", $email);

        $stmt->execute([$username, $password, $email]);

        $pdo = null; 
        $stmt = null;

        header("Location: ../index.php");

        die();
        exit();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

} else {
    header("Location: ../index.php");
}

?>








--------------------------------------
--------------------------------------
--------------------------------------


<?php


if (isset($_GET['id'])) {
    
    $id = htmlspecialchars($_GET['id']);

   
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       
        $ProductName = $_POST['product_name'];
        $Description = $_POST['descr'];

        // Update the record in the database
        $updateQuery = "UPDATE product SET product_name = ?, descr = ? WHERE id_produit = ?";
        $stmt = $cnx->prepare($updateQuery);
        $stmt->bind_param('ssi', $ProductName, $Description, $id);

        if ($stmt->execute()) {
            echo 'Record updated successfully';
        } else {
            echo 'Error updating record: ' . $stmt->error;
        }

        $stmt->close();
    }

   
    $selectQuery = "SELECT product_name, descr FROM product WHERE id_produit = ?";
    $stmt = $cnx->prepare($selectQuery);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->bind_result($productName, $description);
    $stmt->fetch();
    $stmt->close();

    // Display a form with the existing data for editing
    ?>
    <div class="card card-default col-5">
    <div class="card-header text-bold ">
    <h3 class="card-title pl-2">edit</h3> 
  </div>
    <div class="card-body">
  <form action="" method="post" >
      
      <label for="name">Name:</label>
      <input type="text" class="form-control col-12" id="name" name="product_name"placeholder="name" value="<?php echo $productName; ?>" required><br>
      

      <div class="form-group">
          <label for="message">Description :</label>
          <textarea class="form-control col-12" id="text"  name="descr" rows="3" required><?php echo $description; ?></textarea>
      </div>

      <!--<label for="new_image">New Image:</label>
        <input type="file" name="new_image">-->

     <label for="image">Select an image:</label>
     <input type="file" name="produit_image" accept="image/*" required><br><br>
    
      <!-- Submit Button -->
      <button type="submit" class="btn btn-primary">Update</button>

  </form>
  </div>
 
</div>


<?php
} else {
    // Redirect or handle the case when 'id' parameter is not set
    //header("Location: error_page.php");
    exit();
}

// Close the database connection
$cnx->close();
?>








