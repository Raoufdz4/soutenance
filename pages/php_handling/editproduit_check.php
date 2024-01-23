<?php
session_start();
include '../../config.php';

$useremail=$_SESSION['email'];

if (isset($_POST['eproductid']) && !empty($_POST['eproductid'])) {
    
    $eproductid=$_POST['eproductid'];

    if (isset($_POST['eproduct_name']) && !empty($_POST['eproduct_name'])){
        $epname = $_POST['eproduct_name'];
        $epname= strtolower($epname);
        $req1="SELECT * FROM product WHERE id_produit='$eproductid' and product_user_id='$useremail'";
        $res1=mysqli_query($cnx,$req1);
        if (mysqli_num_rows($res1)>0) {
            $req2="UPDATE product SET product_name='$epname' WHERE id_produit='$eproductid' and product_user_id='$useremail'";
            $res2=mysqli_query($cnx,$req2);
        }
    }

    if (isset($_POST['eproduct_des']) && !empty($_POST['eproduct_des'])){
        $epdescr = $_POST['eproduct_des'];
        $epdescr= strtolower($epdescr);
        $req1="SELECT * FROM product WHERE id_produit='$eproductid' and product_user_id='$useremail'";
        $res1=mysqli_query($cnx,$req1);
        if (mysqli_num_rows($res1)>0) {
            $req2="UPDATE product SET descr='$epdescr' WHERE id_produit='$eproductid' and product_user_id='$useremail'";
            $res2=mysqli_query($cnx,$req2);
        }
    }
    
    if (isset($_FILES["eproduct_image"]) && $_FILES["eproduct_image"]["error"] == 0) {
    
        // Define a target directory to store uploaded images
        $etargetDirectory = "../../dist/UserData/".$useremail."/product/".$eproductid."/";
    
            if (!is_dir($etargetDirectory)) {
            // Create the directory if it doesn't exist
            mkdir($etargetDirectory, 0777, true); // The third parameter true enables recursive creation
            }
            
            // Set the new file name
            $enewFileName = "product_picture_".$eproductid;
    
            // Add the original file extension to the new file name
            $enewFileName .= '.' . pathinfo($_FILES["eproduct_image"]["name"], PATHINFO_EXTENSION);
    
            // Create the target path with the new file name
            $etargetFile = $etargetDirectory . $enewFileName;
    
    
            $ebaseNameWithoutExtension = pathinfo($enewFileName, PATHINFO_FILENAME);
        
            // Remove any existing file with the same base name (regardless of extension)
            $eexistingFiles = glob($etargetDirectory . $ebaseNameWithoutExtension . ".*");
            foreach ($eexistingFiles as $eexistingFile) {
                unlink($eexistingFile);
            }
    
    
            // Move the uploaded file to the target directory
            if (move_uploaded_file($_FILES["eproduct_image"]["tmp_name"], $etargetFile)) {                
                $req1="SELECT * FROM product WHERE id_produit='$eproductid' and product_user_id='$useremail'";
                $res1=mysqli_query($cnx,$req1);
                if (mysqli_num_rows($res1)>0) {
                    $req2="UPDATE product SET product_imagepath='$etargetFile' WHERE id_produit='$eproductid' and product_user_id='$useremail'";
                    $res2=mysqli_query($cnx,$req2);
                    header("location:../user/produit.php");
        }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            if ($_FILES["eproduct_image"]["error"]=1) {
                echo "The uploaded file exceeds the `upload_max_filesize` directive in `php.ini` .";
            }
        }

}



?>