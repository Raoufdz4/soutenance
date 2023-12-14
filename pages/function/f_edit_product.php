<?php


function EditProduct($cnx,$name,$description,$path,$headerlocation){
 
  $uploadFolder = "images/".$path;
  $uploadPath = $uploadFolder . basename($_FILES["image"]["name"]);
  
  if (move_uploaded_file($_FILES["image"]["tmp_name"], $uploadPath)) {
      // Image moved successfully, now insert into the database
      $escapedImagePath = $cnx->real_escape_string($uploadPath);
  
      // Insert into the database using prepared statements
      $stmt = $cnx->prepare("UPDATE product SET product_name = ?, descr = ?, image_path = ? WHERE id_produit = ?");
      $stmt->bind_param("sss", $name, $description, $escapedImagePath);
  
      if ($stmt->execute()) {
        header('location:'.$headerlocation.'');
      } else {
        return  "Error: " . $stmt->error;
      }
  
      $stmt->close();
  } else {
    return "Error moving the uploaded file.";
  }
}

  ?>
