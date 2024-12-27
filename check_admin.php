<?php
session_start();

// Check if the user is logged in and if their role is admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php"); // Redirect to login page if not admin
    exit();
}
?>
