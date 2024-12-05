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

// Get the ID from the URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch activity details
$sql = "SELECT * FROM aktivitas WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

$activity = $result->fetch_assoc();
$stmt->close();
$conn->close();

// Return JSON response
header('Content-Type: application/json');
echo json_encode($activity);
?>