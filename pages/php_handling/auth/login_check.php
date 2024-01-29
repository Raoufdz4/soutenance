<?php
session_start();
include '../../../config.php';

if (isset($_POST['email_l']) && isset($_POST['pass_l'])) {
    $email = $_POST['email_l'];
    $pass = $_POST['pass_l'];

    $req1 = "SELECT * FROM user WHERE email='$email' AND `password`='$pass'";
    $res1 = mysqli_query($cnx,$req1);

    if ($res1) {
        if (mysqli_num_rows($res1) > 0) {
            $_SESSION['email'] = $email;
            header('Location: ../../../index.php');
        } else {
            // Failed login
            echo '<form id="myForm" action="login.php" method="post">';
            echo '<input type="text" name="error_l" value="error3" hidden>';
            echo '</form>';

            echo '<script>';
            echo 'document.getElementById("myForm").submit();'; 
            echo '</script>';
        }
    } else {
        // Handle database query error
        echo 'Database query error: ' . mysqli_error($cnx);
    }
}
?>