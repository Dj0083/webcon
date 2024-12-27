<?php
include 'conference_adm/db_config.php'; // Include your database connection file

$query = "SELECT * FROM tracks";
$result = mysqli_query($conn, $query);
?>

<section id="tracks" class="details"> 
    <h2>Conference Tracks</h2>
    <p class="description">
        TECH•CON 2024 will feature multiple tracks across various domains of technology and sustainability. These tracks aim to foster cross-disciplinary research and innovative solutions. Some of the key tracks include:
    </p>
    <ul>
        <?php
        // Fetch and display tracks from the database
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li><strong>" . $row['Title'] . ":</strong> " . $row['description'] . "</li>";
        }
        ?>
    </ul>
    <p class="description">
        Participants can submit their papers based on these tracks, and each track will be presented by leading experts in the field.
    </p>
    <button onclick="window.location.href='register_session.html'">Register for Sessions</button>
</section>
