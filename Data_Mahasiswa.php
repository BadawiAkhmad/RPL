<!doctype html>
<html lang="en">

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
    <nav class="navbar fixed-top">
        <div class="container-fluid">
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
            <h3><i class="fa-solid fa-graduation-cap"></i>Data Mahasiswa</h3>

            <?php
            // Include file koneksi.php
            include 'koneksi.php';

            // Query untuk mendapatkan data dari database
            $query = "SELECT * FROM student ORDER BY NIM";
            $result = mysqli_query($conn, $query);
            ?>

            <div class="tabel">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Fakultas</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Semester</th>
                            <th scope="col">Kelola</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result))  :
                         ?>
                         <tr>
                            <th><?= $no++?></th>
                            <td><?= $row['NIM']?></td>
                            <td><?= $row['nama_student']?></td>
                            <td><?= $row['fakultas']?></td>
                            <td><?= $row['jurusan']?></td>
                            <td><?= $row['semester']?></td>
                            <td>
                                <a href="#" class="editBtn text-decoration-none">
                                    <i class="fa-solid fa-pen-to-square" data-bs-toggle="modal" data-bs-target="#modalEdit<?=$no?>" data-toggle="tooltip" title="Edit"></i>
                                </a>
                                <a href="#" class="deleteBtn text-decoration-none">
                                    <i class='fa-solid fa-trash-can' data-bs-toggle="modal" data-bs-target="#modalHapus<?=$no?>" data-toggle='tooltip' title='Delete'></i>
                                </a>
                            </td>

                        <!-- Modal Edit -->
                            <div class="modal fade" id="modalEdit<?= $no?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="modalEditLabel">Form Edit Data Dosen</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="editMahasiswa.php" method="post">
                                            <div class="modal-body">

                                                <div class="mb-3">
                                                    <label for="nimEdit" class="form-label">NIM Mahasiswa</label>
                                                    <input class="form-control" type="number" name="nimEdit" value="<?= $row['NIM']?>" aria-label="Disabled input example" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="namaEdit" class="form-label">Nama Mahasiswa</label>
                                                    <input type="text" class="form-control" id="namaEdit" name="namaEdit" value="<?= $row['nama_student']?>" placeholder="Masukkan Nama">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="fakultasEdit" class="form-label">Fakultas Mahasiswa</label>
                                                    <input type="text" class="form-control" id="fakultasEdit" name="fakultasEdit" value="<?= $row['fakultas']?>" placeholder="Masukkan Fakultas">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="jurusanEdit" class="form-label">Jurusan Mahasiswa</label>
                                                    <input type="text" class="form-control" id="jurusanEdit" name="jurusanEdit" value="<?= $row['jurusan']?>" placeholder="Masukkan Jurusan">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="semesterEdit" class="form-label">Semester Mahasiswa</label>
                                                    <input type="number" class="form-control" id="semesterEdit" name="semesterEdit" value="<?= $row['semester']?>" placeholder="Masukkan Matakuliah">
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary" name="btnEdit">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Hapus -->
                            <div class="modal fade" id="modalHapus<?= $no?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="modalHapusLabel">Form Hapus Data Dosen</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="hapusMahasiswa.php" method="post">

                                            <input type="hidden" name="nimHapus" id="nimHapus" value="<?= $row['NIM']?>">

                                            <div class="modal-body">

                                            <h5 class='text-center'>Apakah anda yakin menghapus data ini?
                                                <span class='text-danger'><?= $row['NIM']?> - <?= $row['nama_student']?></span>
                                            </h5>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary" name="btnHapus">Delete</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>




    <script type="text/javascript" src="Admin.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>