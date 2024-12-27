<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php'); // Redirect to login if not logged in
    exit();
}

$username = $_SESSION['username'];
$role = $_SESSION['role']; // Get the user's role from the session
?>

<!-- Unified Dashboard HTML -->
<h1>Welcome, <?php echo $username; ?>!</h1>

<?php
if ($role == 'admin') {
    // Admin-specific features
    echo "<h2>Admin Dashboard</h2>";
    echo "<ul>
        <li><a href='manage_participants.php'>Manage Participants</a></li>
        <li><a href='manage_sessions.php'>Manage Sessions</a></li>
        <li><a href='upload_proceedings.php'>Upload Proceedings</a></li>
        <li><a href='logout.php'>Logout</a></li>
    </ul>";
} else {
    // Staff-specific features
    echo "<h2>Staff Dashboard</h2>";
    echo "<ul>
        <li><a href='view_sessions.php'>View Sessions</a></li>
        <li><a href='view_participants.php'>View Participants</a></li>
        <li><a href='logout.php'>Logout</a></li>
    </ul>";

    
}
?>
