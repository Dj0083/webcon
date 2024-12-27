<?php
session_start();
include 'db_config.php';

// Check if user is logged in and is an admin
if (!isset($_SESSION['user_id'])) {
    header("Location: admin.php");
    exit();
}

if ($_SESSION['role'] !== 'admin') {
    echo "You do not have permission to access this page.";
    exit();
}

// Handle form submission to edit a track
if (isset($_POST['edit'])) {
    $track_id = $_POST['track_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Update the track in the database
    $stmt = $conn->prepare("UPDATE tracks SET title = ?, description = ? WHERE id = ?");
    $stmt->bind_param("ssi", $title, $description, $track_id);

    if ($stmt->execute()) {
        $message = "Track updated successfully!";
    } else {
        $message = "Error updating track: " . $stmt->error;
    }
    $stmt->close();
}

// Fetch the existing tracks
$stmt = $conn->prepare("SELECT * FROM tracks");
$stmt->execute();
$result = $stmt->get_result();
$tracks = $result->fetch_all(MYSQLI_ASSOC);

$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .message {
            padding: 10px;
            margin-bottom: 20px;
            background-color: #f4f4f4;
            border: 1px solid #ccc;
        }
        .error {
            color: red;
        }
        .success {
            color: green;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Admin Dashboard</h1>

    <!-- Display success or error message -->
    <?php if (isset($message)) echo "<p class='" . (strpos($message, 'success') !== false ? "success" : "error") . "'>$message</p>"; ?>

    <h2>Edit Tracks</h2>

    <!-- Display existing tracks in a table -->
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($tracks as $track): ?>
            <tr>
                <td><?php echo $track['id']; ?></td>
                <td><?php echo $track['title']; ?></td>
                <td><?php echo $track['description']; ?></td>
                <td>
                    <!-- Edit button: Open a form to edit this track -->
                    <form action="" method="POST" style="display:inline;">
                        <input type="hidden" name="track_id" value="<?php echo $track['id']; ?>">
                        <input type="text" name="title" value="<?php echo $track['title']; ?>" required>
                        <textarea name="description" required><?php echo $track['description']; ?></textarea>
                        <button type="submit" name="edit">Update</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <br>
    <a href="admin.php">Log out</a>
</body>
</html>
