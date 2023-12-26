<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userCode = filter_var($_POST['email_code'], FILTER_SANITIZE_NUMBER_INT);

    // Compare the verification code with the one stored in the session
    if ($userCode == $_SESSION['verification_code']) {
        // Verification successful, mark the user account as verified
        echo 'Verification successful! You can now log in or access the site.';
        header('location:register.php');
    } else {
        // Verification failed
        echo 'Verification failed. Please try again.';
        echo '<form id="myForm" action="register_emailver2.php" method="post">';
        echo '<input type="text" name="error_r" value="error3" hidden>';
        echo '</form>';

        echo '<script>';
        echo 'document.getElementById("myForm").submit();'; 
        echo '</script>';
        exit;
    }

    // Clear the session variables
    unset($_SESSION['verification_code']);
    unset($_SESSION['email']);
}

?>
