<?php
include 'conference_adm/db_config.php'; // Include database connection

// Query to fetch all schedule data
$query = "SELECT * FROM schedule ORDER BY id";
$result = mysqli_query($conn, $query);

// Check if the query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Display the schedule
if (mysqli_num_rows($result) > 0) {
    echo '<section id="schedule" class="details">';
    echo '<h2>Conference Schedule</h2>';
    echo '<table>';
    echo '<thead>';
    echo '<tr><th>Time</th><th>Track</th><th>Session/Topic</th><th>Location</th></tr>';
    echo '</thead>';
    echo '<tbody>';
    
    while ($row = mysqli_fetch_assoc($result)) {
        $time = $row['time'];
        $track = $row['track'];
        $session_topic = $row['session_topic'];
        $location = $row['location'];
        
        // Format time for better display
        $formatted_time = date('h:i A', strtotime($time));
        
        echo "<tr><td>$formatted_time</td><td>$track</td><td>$session_topic</td><td>$location</td></tr>";
    }
    
    echo '</tbody>';
    echo '</table>';
    echo '</section>';
} else {
    echo '<p>No schedule data available.</p>';
}
?>
