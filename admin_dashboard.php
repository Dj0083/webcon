<?php
session_start();
include 'db_config.php';

// Check if user is logged in and is an admin
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if ($_SESSION['role'] !== 'admin') {
    echo "You do not have permission to access this page.";
    exit();
}

// Fetch the existing tracks
$stmt = $conn->prepare("SELECT * FROM tracks");
$stmt->execute();
$result = $stmt->get_result();
$tracks = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();

// Handle form submission to update a track
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
        input, textarea {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
        }
        .message {
            padding: 10px;
            margin-bottom: 20px;
            background-color: #f4f4f4;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <h1>Admin Dashboard</h1>

    <h2>Manage Tracks</h2>

    <!-- Display success or error message -->
    <?php if (isset($message)) echo "<p>$message</p>"; ?>

    <!-- Display existing tracks in a table with edit options -->
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($tracks as $track): ?>
            <tr>
                <form method="POST">
                    <td><?php echo $track['id']; ?></td>
                    <td><input type="text" name="title" value="<?php echo isset($track['title']) ? $track['title'] : ''; ?>" required></td>
                    <td><textarea name="description" required><?php echo isset($track['description']) ? $track['description'] : ''; ?></textarea></td>
                    <td>
                        <!-- Hidden input field for track ID -->
                        <input type="hidden" name="track_id" value="<?php echo $track['id']; ?>">
                        <button type="submit" name="edit">Update</button>
                    </td>
                </form>
            </tr>
        <?php endforeach; ?>
    </table>

    
    <br>
    <a href="index.php">Log out</a>

    
</body>
</html>
