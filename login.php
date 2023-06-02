<?php
session_start();
$error = '';

if (isset($_POST['submit'])) {
    if (empty($_POST['username']) && empty($_POST['password'])) {
        $error = "Masukan Username dan password.";
    } elseif (empty($_POST['username'])){
        $error = "Masukan Username.";
    } elseif (empty($_POST['password'])){
        $error = "Masukan password.";
    }else {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $conn = mysqli_connect('localhost', 'root', '', 'sistem_evaluasi');

        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['login_user'] = $username;

            if ($row['access'] == 1) {
                $_SESSION['access'] = true;
                header("location: Admin.php");
            } else {
                header("location: Mahasiswa.php");
            }
        } else {
            $error = "Username atau password salah.";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Login</h1>
    <form method="post" action="login.php">
        <label>Username:</label><br>
        <fieldset>
            <legend>Login details</legend>

            <label>Username:</label>
            <input type="text" name="username" placeholder="Masukkan Username">

            <label>Password:</label>
            <input type="password" name="password" placeholder="Masukkan Password">
        </fieldset>
        <input type="submit" name="submit" value="Login">
        <span><?php echo $error; ?></span>
    </form>
    <br>
</body>

</html>