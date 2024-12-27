<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: admin.php");
    exit();
}
?>
<h1>Welcome to the Admin Panel</h1>
<a href="logout.php">Log Out</a>
<?php
session_start();

// Check if the user is logged in and if their role is admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php"); // Redirect to login page if not admin
    exit();
}
?>
