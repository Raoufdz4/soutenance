<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('Location:pages/auth/login.php');
    exit();
}
header('Location:pages/home.php');
?>