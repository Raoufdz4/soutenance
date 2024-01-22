<?php
session_start();

$useremail=$_SESSION['email'];

include '../../config.php';

if (isset($_POST['product_name']) && !empty($_POST['product_name'])) {

    $pname = strtolower($_POST['product_name']);

    if (isset($_POST['product_des']) && !empty($_POST['product_des'])) {

        $pdesc = strtolower($_POST['product_des']);
        $req1="INSERT INTO product (product_name,descr,product_user_id) VALUES ('$pname','$pdesc','$useremail')";
        $res1=mysqli_query($cnx,$req1);

        if ($res1) {
            if (isset($_FILES["product_image"]) && $_FILES["product_image"]["error"] == 0) {

                $req2="SELECT * FROM product WHERE product_name='$pname' AND descr='$pdesc' AND product_user_id='$useremail'";
                $res2=mysqli_query($cnx,$req2);
                if ($res2) {
                    $row=mysqli_fetch_assoc($res2);
                    $productid=$row['id_produit'];

                    $targetDirectory = "../../dist/UserData/".$useremail."/product/".$productid."/";
                
                if (!is_dir($targetDirectory)) {
                    // Create the directory if it doesn't exist
                    mkdir($targetDirectory, 0777, true); // The third parameter true enables recursive creation
                    }
                    
                $newFileName = "product_picture_".$productid;

                // Add the original file extension to the new file name
                $newFileName .= '.' . pathinfo($_FILES["product_image"]["name"], PATHINFO_EXTENSION);
        
                // Create the target path with the new file name
                $targetFile = $targetDirectory . $newFileName;

                    if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $targetFile)) {   
                        $req3="UPDATE product SET product_imagepath='$targetFile' WHERE id_produit='$productid'";
                        $res3=mysqli_query($cnx,$req3);
                        if ($res3) {
                            header("location:../user/produit.php");
                            exit;
                        }
                        
                    }

                }
                
            }
            else {
                $req2="SELECT * FROM product WHERE product_name='$pname' AND descr='$pdesc' AND product_user_id='$useremail'";
                $res2=mysqli_query($cnx,$req2);
                if ($res2) {
                    $row=mysqli_fetch_assoc($res2);
                    $productid=$row['id_produit'];

                    $targetDirectory = "../../dist/UserData/".$useremail."/product/".$productid."/";

                if (!is_dir($targetDirectory)) {
                    // Create the directory if it doesn't exist
                    mkdir($targetDirectory, 0777, true); // The third parameter true enables recursive creation
                    }

                $sourceFilePath = '../../dist/ServerData/img/noimage.png';

                // Destination directory
                $destinationDirectory = $targetDirectory;
            
                // Destination file path (including the new filename)
                $destinationFilePath = $destinationDirectory . 'product_picture_'.$productid.'.png';
                if (copy($sourceFilePath, $destinationFilePath)) {
                    $req3="UPDATE product SET product_imagepath='$destinationFilePath' WHERE id_produit='$productid'";
                    $res3=mysqli_query($cnx,$req3);
                    if ($res3) {
                        header("location:../user/produit.php");
                        exit;
                    }
                    
                } else {
                    echo "Error copying the image.";
                }
                }
            }
        }
    }

    else {
        $req1="INSERT INTO product (product_name,product_user_id) VALUES ('$pname','$useremail')";
        $res1=mysqli_query($cnx,$req1);
        if ($res1) {
            if (isset($_FILES["product_image"]) && $_FILES["product_image"]["error"] == 0) {
                $req2="SELECT * FROM product WHERE product_name='$pname' AND product_user_id='$useremail'";
                $res2=mysqli_query($cnx,$req2);
                if ($res2) {
                    $row=mysqli_fetch_assoc($res2);
                    $productid=$row['id_produit'];

                    $targetDirectory = "../../dist/UserData/".$useremail."/product/".$productid."/";
                
                if (!is_dir($targetDirectory)) {
                    // Create the directory if it doesn't exist
                    mkdir($targetDirectory, 0777, true); // The third parameter true enables recursive creation
                }
                    
                    $newFileName = "product_picture_".$productid;

                    // Add the original file extension to the new file name
                    $newFileName .= '.' . pathinfo($_FILES["product_image"]["name"], PATHINFO_EXTENSION);
        
                    // Create the target path with the new file name
                    $targetFile = $targetDirectory . $newFileName;

                    if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $targetFile)) {   
                        $req3="UPDATE product SET product_imagepath='$targetFile' WHERE id_produit='$productid'";
                        $res3=mysqli_query($cnx,$req3);
                        if ($res3) {
                            header("location:../user/produit.php");
                            exit;
                        }
                    }
                }
            }
            else {
                $req2="SELECT * FROM product WHERE product_name='$pname' AND product_user_id='$useremail'";
                $res2=mysqli_query($cnx,$req2);
                if ($res2) {
                    $row=mysqli_fetch_assoc($res2);
                    $productid=$row['id_produit'];

                    $targetDirectory = "../../dist/UserData/".$useremail."/product/".$productid."/";

                if (!is_dir($targetDirectory)) {
                    // Create the directory if it doesn't exist
                    mkdir($targetDirectory, 0777, true); // The third parameter true enables recursive creation
                    }

                $sourceFilePath = '../../dist/ServerData/img/noimage.png';

                // Destination directory
                $destinationDirectory = $targetDirectory;
            
                // Destination file path (including the new filename)
                $destinationFilePath = $destinationDirectory . 'product_picture_'.$productid.'.png';
                if (copy($sourceFilePath, $destinationFilePath)) {
                    $req3="UPDATE product SET product_imagepath='$destinationFilePath' WHERE id_produit='$productid'";
                    $res3=mysqli_query($cnx,$req3);
                    if ($res3) {
                        header("location:../user/produit.php");
                        exit;
                    }
                } else {
                    echo "Error copying the image.";
                }
                }
            }
        }
    }
    
}


?>



