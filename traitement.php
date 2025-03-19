<?php

$correct_password = "adminBloggie125";

// Get the values submitted via POST
$password = isset($_POST['password']) ? $_POST['password'] : '';

// Check if the password is correct
if ($password !== $correct_password) {
    // If the password is incorrect, redirect back to the login page with an error
    header("Location: login.php?error=true");
    exit();
}
header("Location:dashboard.php");
?>
