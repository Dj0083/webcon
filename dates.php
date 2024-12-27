<?php
include 'conference_adm/db_config.php'; // Database connection

$query = "SELECT * FROM dates ORDER BY event_date ASC";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) > 0) {
    echo '<section id="dates" class="details">';
    echo '<h2>Important Dates</h2>';
    echo '<ul>';
    while ($row = mysqli_fetch_assoc($result)) {
        $event_name = $row['event_name'] ?? 'No Event Name';
        $event_date = $row['event_date'] ?? 'No Date';
        echo "<li><strong>$event_name:</strong> " . date('jS F Y', strtotime($event_date)) . "</li>";
    }
    echo '</ul>';
    echo '<p class="description">Ensure you submit your papers and register by the deadlines to be part of this exciting event.</p>';
    echo '</section>';
} else {
    echo '<p>No important dates found.</p>';
}
?>
