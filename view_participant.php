<?php
include 'db.php';

$query = "SELECT * FROM participants";
$result = mysqli_query($conn, $query);

echo "<table>";
echo "<tr><th>Name</th><th>Email</th><th>Session</th><th>Registration Date</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";

    // Fetch session name from the sessions table
    $session_query = "SELECT session_name FROM sessions WHERE id=" . $row['session_id'];
    $session_result = mysqli_query($conn, $session_query);
    $session_row = mysqli_fetch_assoc($session_result);
    echo "<td>" . $session_row['session_name'] . "</td>";

    echo "<td>" . $row['registration_date'] . "</td>";
    echo "</tr>";
}

echo "</table>";
?>
