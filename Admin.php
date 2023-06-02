<!doctype html>
<html lang="en">

<?php
session_start();

if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
}

$username = $_SESSION['login_user'];
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="Admin.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;1,600&display=swap"
        rel="stylesheet">

</head>

<body>
    <!--Navbar-->
    <nav class="navbar fixed-top ">
        <div class="container-fluid ">
            <a class="navbar-brand text-white">
                <img src="img/3.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                Sistem Evaluasi Universitas Islam Negeri Maulana Malik Ibrahim Malang
            </a>

            <div class="icon">
                <a href="logout.php" style="text-decoration: none;">
                    <i class="fas fa-right-from-bracket text-white" data-toggle="tooltip" title="Sign Out"></i>
                </a>
                
            </div>

        </div>
    </nav>

    <div class="row no-gutters mt-5">
         <!--Side Bar-->
         <div class="col-md-2 mt-2 p-3">
            <ul class="nav flex-column m-lg-3 mb-5">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="Admin.php"><i class="fa-solid fa-house"></i>Home</a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Dosen.php"><i class="fa-solid fa-book-open-reader"></i>Dosen</a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Data_Mahasiswa.php"><i class="fa-solid fa-graduation-cap"></i>Mahasiswa</a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Pertanyaan.php"><i class="fa-solid fa-clipboard-question"></i>Pertanyaan</a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Survei.php"><i class="fa-solid fa-square-poll-vertical"></i>Survei</a>
                    <hr class="bg-secondary">
                </li>
            </ul>
        </div>

        <!--Main Bar-->
        <div class="col-md-10 mt-3">
            <h3><i class="fa-solid fa-house"></i>Home</h3>

            <div class="row">
                <div class="card m-lg-3" style="width: 18rem;">
                    <i class="fa-solid fa-school"></i>
                    <div class="card-body">
                        <div class="card-body-image">
                            <img src="img/3.png" alt="Logo" width="150" height="150">
                        </div>
                        <h5 class="card-title">UIN Malang</h5>
                        <p class="card-text">UIN Malang adalah perguruan tinggi Islam yang terletak di Malang, Jawa
                            Timur. </p>
                        <a href="https://uin-malang.ac.id/" class="btn btn-primary">Kunjungi</a>
                    </div>
                </div>

                <div class="card m-lg-3" style="width: 18rem;">
                    <i class="fa-solid fa-computer"></i>
                    <div class="card-body">
                        <div class="card-body-image">
                            <img src="img/3.png" alt="Logo" width="150" height="150">
                        </div>
                        <h5 class="card-title">UIN Malang</h5>
                        <p class="card-text">UIN Malang adalah perguruan tinggi Islam yang terletak di Malang, Jawa
                            Timur. </p>
                        <a href="https://uin-malang.ac.id/" class="btn btn-primary">Kunjungi</a>
                    </div>
                </div>

                <div class="card m-lg-3" style="width: 18rem;">
                    <i class="fa-solid fa-book-quran"></i>
                    <div class="card-body">
                        <div class="card-body-image">
                            <img src="img/3.png" alt="Logo" width="150" height="150">
                        </div>
                        <h5 class="card-title">UIN Malang</h5>
                        <p class="card-text">UIN Malang adalah perguruan tinggi Islam yang terletak di Malang, Jawa
                            Timur. </p>
                        <a href="https://uin-malang.ac.id/" class="btn btn-primary">Kunjungi</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="card m-lg-3" style="width: 18rem;">
                    <i class="fa-solid fa-scale-balanced"></i>
                    <div class="card-body">
                        <div class="card-body-image">
                            <img src="img/3.png" alt="Logo" width="150" height="150">
                        </div>
                        <h5 class="card-title">UIN Malang</h5>
                        <p class="card-text">UIN Malang adalah perguruan tinggi Islam yang terletak di Malang, Jawa
                            Timur. </p>
                        <a href="https://uin-malang.ac.id/" class="btn btn-primary">Kunjungi</a>
                    </div>
                </div>

                <div class="card m-lg-3" style="width: 18rem;">
                    <i class="fa-solid fa-stethoscope"></i>
                    <div class="card-body">
                        <div class="card-body-image">
                            <img src="img/3.png" alt="Logo" width="150" height="150">
                        </div>
                        <h5 class="card-title">UIN Malang</h5>
                        <p class="card-text">UIN Malang adalah perguruan tinggi Islam yang terletak di Malang, Jawa
                            Timur. </p>
                        <a href="https://uin-malang.ac.id/" class="btn btn-primary">Kunjungi</a>
                    </div>
                </div>

                <div class="card m-lg-3" style="width: 18rem;">
                    <i class="fa-solid fa-landmark"></i>
                    <div class="card-body">
                        <div class="card-body-image">
                            <img src="img/3.png" alt="Logo" width="150" height="150">
                        </div>
                        <h5 class="card-title">UIN Malang</h5>
                        <p class="card-text">UIN Malang adalah perguruan tinggi Islam yang terletak di Malang, Jawa
                            Timur. </p>
                        <a href="https://uin-malang.ac.id/" class="btn btn-primary">Kunjungi</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="card m-lg-3" style="width: 18rem;">
                    <i class="fa-solid fa-user-group"></i>
                    <div class="card-body">
                        <div class="card-body-image">
                            <img src="img/3.png" alt="Logo" width="150" height="150">
                        </div>
                        <h5 class="card-title">UIN Malang</h5>
                        <p class="card-text">UIN Malang adalah perguruan tinggi Islam yang terletak di Malang, Jawa
                            Timur. </p>
                        <a href="https://uin-malang.ac.id/" class="btn btn-primary">Kunjungi</a>
                    </div>
                </div>

                <div class="card m-lg-3" style="width: 18rem;">
                    <i class="fa-solid fa-book"></i>
                    <div class="card-body">
                        <div class="card-body-image">
                            <img src="img/3.png" alt="Logo" width="150" height="150">
                        </div>
                        <h5 class="card-title">UIN Malang</h5>
                        <p class="card-text">UIN Malang adalah perguruan tinggi Islam yang terletak di Malang, Jawa
                            Timur. </p>
                        <a href="https://uin-malang.ac.id/" class="btn btn-primary">Kunjungi</a>
                    </div>
                </div>

                <div class="card m-lg-3" style="width: 18rem;">
                    <i class="fa-solid fa-comments"></i>
                    <div class="card-body">
                        <div class="card-body-image">
                            <img src="img/3.png" alt="Logo" width="150" height="150">
                        </div>
                        <h5 class="card-title">UIN Malang</h5>
                        <p class="card-text">UIN Malang adalah perguruan tinggi Islam yang terletak di Malang, Jawa
                            Timur. </p>
                        <a href="https://uin-malang.ac.id/" class="btn btn-primary">Kunjungi</a>
                    </div>
                </div>
            </div>

        </div>
    </div>




    <script type="text/javascript" src="Admin.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>