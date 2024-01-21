<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('Location:pages/php_handling/auth/login.php');
    exit();
}
header('Location:pages/user/home.php');
?>