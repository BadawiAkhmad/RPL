<?php
session_start();

if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
}

$username = $_SESSION['login_user'];

include "koneksi.php";

if (isset($_POST['btnEdit'])){
    $id = $_POST['id'];
    $pertanyaan = $_POST['pertanyaan'];

    $query = "UPDATE pertanyaan SET pertanyaan='$pertanyaan' WHERE id=$id";

    $simpan = mysqli_query($conn, $query);
    
    //Cek hasil Save
    if($simpan){
        echo "<script>
                alert('Edit Data Sukses!');
                document.location = 'Pertanyaan.php';
            </script>";
    }else{
        echo "<script>
                alert('Edit Data Gagal!');
                document.location = 'Pertanyaan.php';
            </script>";
    }
}
?>