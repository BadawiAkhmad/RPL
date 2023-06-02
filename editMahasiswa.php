<?php
session_start();

if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
}

$username = $_SESSION['login_user'];

include "koneksi.php";

if (isset($_POST['btnEdit'])){
    $nim = $_POST['nimEdit'];
    $nama = $_POST['namaEdit'];
    $fakultas = $_POST['fakultasEdit'];
    $jurusan = $_POST['jurusanEdit'];
    $semester = $_POST['semesterEdit'];

    $query = "UPDATE student SET nama_student='$nama', fakultas='$fakultas', jurusan='$jurusan', semester='$semester' WHERE NIM=$nim";

    $simpan = mysqli_query($conn, $query);
    
    //Cek hasil Save
    if($simpan){
        echo "<script>
                alert('Edit Data Sukses!');
                document.location = 'Data_Mahasiswa.php';
            </script>";
    }else{
        echo "<script>
                alert('Edit Data Gagal!');
                document.location = 'Data_Mahasiswa.php';
            </script>";
    }
}
?>