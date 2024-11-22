<?php
// Database connection
$servername = "localhost"; // or your server name
$username = "root"; // replace with your MySQL username
$password = ""; // replace with your MySQL password
$dbname = "ekstra";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch activities
$sql = "SELECT * FROM aktivitas";
$result = $conn->query($sql);

$activities = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $activities[] = $row;
    }
}
$conn->close();

// Return JSON response
header('Content-Type: application/json');
echo json_encode($activities);
?>