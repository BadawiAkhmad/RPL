<?php
session_start();

if (!isset($_SESSION['login_user'])) {
  header("location: login.php");
}

$username = $_SESSION['login_user'];

$nim = $_POST['nim'];
$fakultas = $_POST['fakultas'];
$jurusan = $_POST['jurusan'];
$dosen = $_POST['nama-dosen'];
$jwb1 = $_POST['jwb1'];
$jwb2 = $_POST['jwb2'];
$jwb3 = $_POST['jwb3'];
$jwb4 = $_POST['jwb4'];
$jwb5 = $_POST['jwb5'];
$jwb6 = $_POST['jwb6'];
$jwb7 = $_POST['jwb7'];
$jwb8 = $_POST['jwb8'];
$jwb9 = $_POST['jwb9'];
$jwb10 = $_POST['jwb10'];

$jawaban = array($jwb1, $jwb2, $jwb3, $jwb4, $jwb5, $jwb6, $jwb7, $jwb8, $jwb9, $jwb10);
$counter = array_count_values($jawaban);
arsort($counter);
$jwb = array_key_first($counter);

include 'koneksi.php';
$query = "SELECT NIP FROM dosen WHERE Nama_Dosen = ? AND Jurusan = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $dosen, $jurusan);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Ambil nilai NIP dari hasil query
    $row = $result->fetch_assoc();
    $nip = $row['NIP'];

    // Simpan data ke dalam database
    $query = "INSERT INTO jawaban (NIM, NIP, jawaban) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $nim, $nip, $jwb);
    $stmt->execute();

    // Cek apakah data berhasil disimpan atau tidak
    if ($stmt->affected_rows > 0) {
      // Menampilkan alert JavaScript
      echo '<script>alert("Data berhasil disimpan.");';
      echo 'if (confirm("Pilih OK untuk kembali atau Cancel untuk Logout.")) {';
      echo 'window.location.href = "Mahasiswa.php";';
      echo '} else {';
      echo 'window.location.href = "logout.php";';
      echo '}</script>';
    } else {
        echo "Terjadi kesalahan saat menyimpan data.";
    }
  } else {
    // Data tidak ditemukan
    echo "<script>alert('Tidak Ada NIP Yang COCOK. Coba lagi nanti.');</script>";
}
?>