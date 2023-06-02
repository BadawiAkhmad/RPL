<?php
session_start();

if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
}

$username = $_SESSION['login_user'];

include "koneksi.php";

if (isset($_POST['btnSave'])){
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $fakultas = $_POST['fakultas'];
    $jurusan = $_POST['jurusan'];
    $matakuliah = $_POST['matakuliah'];

    $query = "INSERT INTO dosen (NIP, Nama_Dosen, Fakultas, Jurusan, Matakuliah) VALUES ('$nip', '$nama', '$fakultas', '$jurusan', '$matakuliah')";

    $simpan = mysqli_query($conn, $query);
    
    //Cek hasil Save
    if($simpan){
        echo "<script>
                alert('Simpan Data Sukses!');
                document.location = 'Dosen.php';
            </script>";
    }else{
        echo "<script>
                alert('Data tidak berhasil disimpan! Cek kembali data yang diinput!');
                document.location = 'Dosen.php';
            </script>";
    }
}
?>