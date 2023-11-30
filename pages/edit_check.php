<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Perform the database update
    $query = "UPDATE your_table SET name='$name', email='$email' WHERE id=$id";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "Record updated successfully!";
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    }
}

mysqli_close($connection);
?>