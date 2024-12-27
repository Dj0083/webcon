<?php
include 'db_config.php';

// Fetch the tracks from the database
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
    <title>Conference Tracks</title>
</head>
<body>
    <h2>Conference Tracks</h2>
    <p>TECH•CON 2024 will feature multiple tracks across various domains of technology and sustainability. These tracks aim to foster cross-disciplinary research and innovative solutions.</p>

    <ul>
        <?php foreach ($tracks as $track): ?>
            <li><strong><?php echo $track['title']; ?>:</strong> <?php echo $track['description']; ?></li>
        <?php endforeach; ?>
    </ul>

</body>
</html>
