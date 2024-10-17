<?php 
$host = "localhost";
$user = "root";
$password = "";
$database = "db_daftar_band";

$koneksi = mysqli_connect ($host, $user, $password, $database);

if (mysqli_connect_errno())
{
echo "gagal konek : ". mysqli_connect_error();
}
else 
{
 echo "konek sukses";
} 
?>
