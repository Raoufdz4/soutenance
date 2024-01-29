<?php
session_start();
$useremail=$_SESSION['email'];
include '../../config.php';


if (isset($_GET['id'])) {
    
    $id = htmlspecialchars($_GET['id']);

  
    $req1 = "DELETE FROM product WHERE id_produit = $id";
    $res1= mysqli_query($cnx,$req1);
    
    if ($res1) {
        function deleteDirectory($dir) {
            if (!is_dir($dir)) {
                return false;
            }
        
            // Open the directory
            $dirHandle = opendir($dir);
        
            // Iterate through the directory
            while ($file = readdir($dirHandle)) {
                if ($file != '.' && $file != '..') {
                    $filePath = $dir . '/' . $file;
        
                    // If it's a directory, recursively delete it
                    if (is_dir($filePath)) {
                        deleteDirectory($filePath);
                    } else {
                        // If it's a file, delete it
                        unlink($filePath);
                    }
                }
            }
        
            // Close the directory handle
            closedir($dirHandle);
        
            // Finally, remove the main directory
            rmdir($dir);
        
            return true;
        }
        $targetDirectory = "../../dist/UserData/".$useremail."/product/".$id;
        if (deleteDirectory($targetDirectory)) {
            header("location:../user/produit.php");
            }
            else{
                echo "error";
            }
            
        exit();
    }

} 

?>