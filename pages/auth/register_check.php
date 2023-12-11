<?php

include '../../config.php';

if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email_r']) && isset($_POST['pass_r'])) {


    $fname = $_POST['first_name'];

    $fname= ucwords(strtolower($fname));

    $lname = $_POST['last_name'];

    $lname= ucwords(strtolower($lname));

    $email = $_POST['email_r'];

    $pass = $_POST['pass_r'];

    
    $req1="SELECT * FROM user WHERE (email='$email')";
    $res1=mysqli_query($cnx,$req1);
if (mysqli_num_rows($res1)>0) {
    echo '<form id="myForm" action="register.php" method="post">';
        echo '<input type="text" name="error_r" value="error1" hidden>';
        echo '</form>';

        echo '<script>';
        echo 'document.getElementById("myForm").submit();'; 
        echo '</script>';
}
else {
    $req2="INSERT INTO user (first_name,last_name,full_name,email,`password`,create_date) VALUES ('$fname','$lname','$fname $lname','$email','$pass',NOW())";
    $res2=mysqli_query($cnx,$req2);
    $req3="INSERT INTO user_social (id_user) VALUES ('$email')";
    $res3=mysqli_query($cnx,$req3);
    $req4="INSERT INTO user_has_roles (id_user,roles_name) VALUES ('$email','user')";
    $res4=mysqli_query($cnx,$req4);
    if ($res2 && $res3 && $res4) {
        echo '<form id="myForm" action="login.php" method="post">';
        echo '<input type="text" name="error_r" value="noerror" hidden>';
        echo '</form>';

        echo '<script>';
        echo 'document.getElementById("myForm").submit();'; 
        echo '</script>';
    }
    else {
        echo '<form id="myForm" action="register.php" method="post">';
        echo '<input type="text" name="error_r" value="error2" hidden>';
        echo '</form>';

        echo '<script>';
        echo 'document.getElementById("myForm").submit();'; 
        echo '</script>';
        
    }
    
}
    
}
?>