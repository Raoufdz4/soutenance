<?php


function EditProduct($cnx,$productName,$description,$path,$headerlocation,$productid,$productfile){
 
   
 

    $uploadFolder = "../../dist/ServerData/img/".$path;
    $uploadPath = $uploadFolder . basename($productfile["name"]);
    
    if (move_uploaded_file($productfile["tmp_name"], $uploadPath)) {
        // Image moved successfully, now insert into the database
        $escapedImagePath = $cnx->real_escape_string($uploadPath);
    
        // Insert into the database using prepared statements
        $stmt = $cnx->prepare("UPDATE product SET product_name = ?, descr = ?, image_path = ? WHERE id_produit = ?");
        $stmt->bind_param("sssi", $productName, $description, $escapedImagePath, $productid);
        
        if ($stmt->execute()) {
            echo "Update successful!";
            header('location:' . $headerlocation . '');
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
        
        $stmt->close();
      } else {
        echo "Error moving the uploaded file.";
        exit(); // or die();
      }
  

}

  ?>
