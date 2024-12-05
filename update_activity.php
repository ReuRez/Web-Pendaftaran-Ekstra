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

// Get the data from the request
$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'];
$name = $data['name'];
$description = $data['description'];
$image = $data['image'];
$teacher = $data['teacher'];
$schedule = $data['schedule'];

// Update the activity
$sql = "UPDATE aktivitas SET name=?, description=?, image=?, teacher=?, schedule=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssi", $name, $description, $image, $teacher, $schedule, $id);
$stmt->execute();

$stmt->close();
$conn->close();
?>