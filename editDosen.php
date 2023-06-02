<?php
session_start();

if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
}

$username = $_SESSION['login_user'];

include "koneksi.php";

if (isset($_POST['btnEdit'])){
    $nip = $_POST['nipEdit'];
    $nama = $_POST['namaEdit'];
    $fakultas = $_POST['fakultasEdit'];
    $jurusan = $_POST['jurusanEdit'];
    $matakuliah = $_POST['matakuliahEdit'];

    $query = "UPDATE dosen SET Nama_Dosen='$nama', Fakultas='$fakultas', Jurusan='$jurusan', Matakuliah='$matakuliah' WHERE NIP=$nip";

    $simpan = mysqli_query($conn, $query);
    
    //Cek hasil Save
    if($simpan){
        echo "<script>
                alert('Edit Data Sukses!');
                document.location = 'Dosen.php';
            </script>";
    }else{
        echo "<script>
                alert('Edit Data Gagal!');
                document.location = 'Dosen.php';
            </script>";
    }
}
?>