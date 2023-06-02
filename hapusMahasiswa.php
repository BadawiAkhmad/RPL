<?php
session_start();

if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
}

$username = $_SESSION['login_user'];

include "koneksi.php";

if (isset($_POST['btnHapus'])){
    $nim = $_POST['nimHapus'];

    $query = "DELETE FROM student WHERE NIM='$nim'";

    $simpan = mysqli_query($conn, $query);
    
    //Cek hasil Save
    if($simpan){
        echo "<script>
                alert('Hapus Data Sukses!');
                document.location = 'Data_Mahasiswa.php';
            </script>";
    }else{
        echo "<script>
                alert('Hapus Data Gagal!');
                document.location = 'Data_Mahasiswa.php';
            </script>";
    }
}
?>