<?php
$host = "localhost"; 
$username = "root";
$password = "";
$dbname = "sistem_evaluasi";

$conn = mysqli_connect($host, $username, $password, $dbname);

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}
?>
