<?php
// Database connection details
$host = "localhost";
$user = "root"; // Update with your database username
$password = ""; // Update with your database password
$database = "db_daftar_band";  // The name of your database

// Create connection
$koneksi = mysqli_connect ($host, $user, $password, $database);

// Check connection
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

// Capture form data
$name = $_POST['name'];
$class = $_POST['class'];
$major = $_POST['major'];
$instrument = $_POST['instrument'];
$experience = $_POST['experience'];

// SQL query to insert form data into the tb_band table
$sql = "INSERT INTO tb_band (id_user, nama, kelas, jurusan, alat_musik, pengalaman)
        VALUES ('0','$name', '$class', '$major', '$instrument', '$experience')";

if ($koneksi->query($sql) === TRUE) {
    echo "Registration successful!";
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}

$koneksi->close();
?>
