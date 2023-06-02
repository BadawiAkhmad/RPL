<?php
session_start();

if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
}

$username = $_SESSION['login_user'];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Selamat Datang</title>
</head>

<body>
    <h1>Selamat datang, <?php echo " maha admin ".$username ." kun"; ?>!</h1>
    <a href="logout.php">Logout</a>
</body>

</html>