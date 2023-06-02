<?php
session_start();
$error = '';

if (isset($_POST['submit'])) {
    if (empty($_POST['username']) && empty($_POST['password'])) {
        $error = "Masukkan Username dan password.";
    } elseif (empty($_POST['username'])){
        $error = "Masukkan Username.";
    } elseif (empty($_POST['password'])){
        $error = "Masukkan password.";
    } else {
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
                header("location: admin.php");
            } else {
                header("location: welcome.php");
            }
        } else {
            $error = "Username atau password salah.";
            echo "<script>
                    alert('$error');
                    window.location.href = 'login.php';
                </script>";
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.7.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Login</h1>
        <form method="post" action="login.php" class="mt-3">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Username">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password">
            </div>
            <input type="submit" name="submit" value="Login" class="btn btn-primary">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
