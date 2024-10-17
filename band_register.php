<?php
include_once "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <h1>Selamat Datang!</h1>
    <button id="registration-button">Registrasi</button>

    <!-- Modal for registration page -->
    <div id="registrationModal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Halaman Registrasi</h2>
            <form id="registrationForm" action="" method="POST">
                <label for="name">Nama:</label>
                <input type="text" id="name" name="nama" required><br>
                
                <label for="class">Kelas:</label>
                <input type="text" id="class" name="kelas" required><br>
                
                <label for="major">Jurusan:</label>
                <input type="text" id="major" name="jurusan" required><br>
                
                <label for="instrument">Choose Instrument</label><br>
                <select name="alat_musik" id="instrument">
                    <option value="guitar">Guitar</option>
                    <option value="piano">Piano</option>
                    <option value="drums">Drums</option>
                    <option value="violin">Violin</option>
                    <option value="flute">Flute</option>
                </select><br>
                
                <label for="experience">Pengalaman:</label>
                <textarea id="experience" name="pengalaman" required></textarea><br>
                
                <button type="submit" name="submit">Daftar</button>
            </form>
        </div>
    </div>

<?php
$submitTambah = isset($_POST['submit']);
if ($submitTambah) {
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$jurusan = $_POST['jurusan'];
$alat_musik = $_POST['alat_musik'];
$pengalaman = $_POST['pengalaman'];

$sql = "INSERT INTO tb_band(id_user, nama, kelas, jurusan, alat_musik, pengalaman)
        VALUES ('0','$nama', '$kelas', '$jurusan', '$alat_musik', '$pengalaman')";

// Execute the query
if (mysqli_query($koneksi, $sql)) {
    echo "<script>
            alert('Registration Confirmed');
          </script>";
    echo '<iframe src="https://docs.google.com/forms/d/e/1FAIpQLSd9-ANyuBQ7a24eFBeBGjuynW5OyHmBKkvPkYU61tymXjk7zQ/viewform?embedded=true" width="640" height="3379" frameborder="0" marginheight="0" marginwidth="0">Memuat…</iframe>=';
} else {
    echo "Error: " . mysqli_error($koneksi);
}

}
?>

 <script src="script.js"></script>
</body>
</html>
