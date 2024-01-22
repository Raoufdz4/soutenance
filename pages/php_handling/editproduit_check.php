<?php
session_start();
include '../../config.php';

$useremail=$_SESSION['email'];

if (isset($_POST['productid']) && !empty($_POST['productid'])) {
    
    $productid=$_POST['productid'];

    if (isset($_POST['product_name']) && !empty($_POST['product_name'])){
        $pname = $_POST['product_name'];
        $pname= strtolower($pname);
        $req1="SELECT * FROM product WHERE id_produit='$productid' and product_user_id='$useremail'";
        $res1=mysqli_query($cnx,$req1);
        if (mysqli_num_rows($res1)>0) {
            $req2="UPDATE product SET product_name='$pname' WHERE id_produit='$productid' and product_user_id='$useremail'";
            $res2=mysqli_query($cnx,$req2);
        }
    }
    if (isset($_POST['product_des']) && !empty($_POST['product_des'])){
        $pdescr = $_POST['product_des'];
        $pdescr= strtolower($pdescr);
        $req1="SELECT * FROM product WHERE id_produit='$productid' and product_user_id='$useremail'";
        $res1=mysqli_query($cnx,$req1);
        if (mysqli_num_rows($res1)>0) {
            $req2="UPDATE product SET descr='$pdescr' WHERE id_produit='$productid' and product_user_id='$useremail'";
            $res2=mysqli_query($cnx,$req2);
        }
    }
    if (isset($_FILES["user_image"]) && $_FILES["user_image"]["error"] == 0) {
    
        // Define a target directory to store uploaded images
        $targetDirectory = "../../dist/UserData/".$useremail."/profile/";
    
            if (!is_dir($targetDirectory)) {
            // Create the directory if it doesn't exist
            mkdir($targetDirectory, 0777, true); // The third parameter true enables recursive creation
            }
            
            // Set the new file name
            $newFileName = "profile_picture";
    
            // Add the original file extension to the new file name
            $newFileName .= '.' . pathinfo($_FILES["user_image"]["name"], PATHINFO_EXTENSION);
    
            // Create the target path with the new file name
            $targetFile = $targetDirectory . $newFileName;
    
    
            $baseNameWithoutExtension = pathinfo($newFileName, PATHINFO_FILENAME);
        
            // Remove any existing file with the same base name (regardless of extension)
            $existingFiles = glob($targetDirectory . $baseNameWithoutExtension . ".*");
            foreach ($existingFiles as $existingFile) {
                unlink($existingFile);
            }
    
    
            // Move the uploaded file to the target directory
            if (move_uploaded_file($_FILES["user_image"]["tmp_name"], $targetFile)) {                
                echo "The file has been uploaded successfully.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

}


header("location:../user/produit.php");
?>