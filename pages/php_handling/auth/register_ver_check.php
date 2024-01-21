<?php
session_start();
include "../../../init.php";

$dist = "../../../".$dist;

$partials  = "../../../".$partials;

$auth  = "../../../".$auth;

$pages = "../../../".$pages;

$plugins = "../../../".$plugins;

include '../../../config.php';

include '../../../icon.php';

include "../../../links/css.php";

$_SESSION['useremail']=$_POST['email_r'];
 $username_email=$_SESSION['useremail'];

if (isset($_POST['email_r'])) {
    $req1="SELECT * FROM user WHERE (email='$username_email')";
    $res1=mysqli_query($cnx,$req1);
if (mysqli_num_rows($res1)>0) {
    echo '<form id="myForm" action="register_emailver.php" method="post">';
        echo '<input type="text" name="error_r" value="error1" hidden>';
        echo '</form>';

        echo '<script>';
        echo 'document.getElementById("myForm").submit();'; 
        echo '</script>';
        exit;
}
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require $plugins.'PHPMailer/src/Exception.php';
require $plugins.'PHPMailer/src/PHPMailer.php';
require $plugins.'PHPMailer/src/SMTP.php';

session_start();

// Function to generate a verification code
function generateVerificationCode() {
    return mt_rand(100000, 999999);
}

// Set your Gmail credentials
$gmailUsername = 'colivraison.emailtest@gmail.com'; // Replace with your Gmail email address
$gmailPassword = 'ojeb vouh bwsa yjsv'; // Replace with your Gmail password

// Recipient email address
$recipientEmail = filter_var($_POST['email_r'], FILTER_SANITIZE_EMAIL);

// Generate a verification code
$verificationCode = generateVerificationCode();

// Save the verification code and email in the session
$_SESSION['verification_code'] = $verificationCode;
$_SESSION['email'] = $recipientEmail;

// Email content
$subject = 'Email Verification Code';
$body = "Thank you for registering! Your verification code is: $verificationCode";

// Create PHPMailer object
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = $gmailUsername;
    $mail->Password = $gmailPassword;
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption
    $mail->Port = 25;

    // Recipient settings
    $mail->setFrom($gmailUsername, 'Colivraison');
    $mail->addAddress($recipientEmail);

    // Email content
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $body;

    // Send email
    $mail->send();

    // Redirect to the verification page
    header('Location: register_emailver2.php');
    exit();
} catch (Exception $e) {
    echo "Error: {$mail->ErrorInfo}";
}
?>