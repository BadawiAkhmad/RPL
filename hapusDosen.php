<?php
session_start();

if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
}

$username = $_SESSION['login_user'];

include "koneksi.php";

if (isset($_POST['btnHapus'])){
    $nip = $_POST['nipHapus'];

    $query = "DELETE FROM dosen WHERE NIP='$nip'";

    $simpan = mysqli_query($conn, $query);
    
    //Cek hasil Save
    if($simpan){
        echo "<script>
                alert('Hapus Data Sukses!');
                document.location = 'Dosen.php';
            </script>";
    }else{
        echo "<script>
                alert('Hapus Data Gagal!');
                document.location = 'Dosen.php';
            </script>";
    }
}
?>