<?php
session_start();

if (!isset($_SESSION['login_user'])) {
  header("location: login.php");
}

$username = $_SESSION['login_user'];
?>

<!Doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Form Pengisian</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="style2.css">
</head>

<body style="height: 1200px;">
  <!--Header-->
  <div class="header mb-0">
    <h2>Selamat Datang <?php echo $username; ?> di Sistem Evaluasi Pembelajaran UIN Maliki Malang</h2>
    <p>Harap Mengisi Form Untuk Membantu Dalam Proses Evaluasi</p>
  </div>

  <!--Bar Header-->
  <div class="bar p-2 mt-0 sticky-top">
    <a class="teksbar text-black text-decoration-none">
      <img src="img/3.png" width="40" height="40" class="d-inline-block align-text-top">
      Sistem Evaluasi Universitas Islam Negeri Maulana Malik Ibrahim Malang
    </a>
  </div>

  <!--Form-->
  <form action="proses.php" method="post">
    <div class="container">
      <div class="form-group p-1 text-white">
        <div class="title">Form Evalusi Dosen</div>
        <!--Input NIM-->
        <div class="mb-3 row">
          <label for="NIM" class="col-sm-2 col-form-label label-besar">NIM :</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" id="nim" name="nim" required>
          </div>
        </div>
      </div>

      <!--Select Fakultas-->
      <div class="form-group p-1 text-white">
        <div class="input-group mb-3">
          <label class="input-group-text" for="fakultas">Fakultas</label>
          <select class="form-select" id="fakultas" name="fakultas" required>
            <option selected disabled="true">Choose...</option>
            <option value="Ilmu Tarbiyah dan Keguruan">Ilmu Tarbiyah dan Keguruan</option>
            <option value="Syariah">Syariah</option>
            <option value="Humaniora">Humaniora</option>
            <option value="Psikologi">Psikologi</option>
            <option value="Ekonomi">Ekonomi</option>
            <option value="Sains dan Teknologi">Sains dan Teknologi</option>
          </select>
        </div>
      </div>

      <!--Select Jurusan-->
      <div class="form-group p-1 text-white">
        <div class="input-group mb-3">
          <label class="input-group-text" for="jurusan">Jurusan</label>
          <select class="form-select" id="jurusan" name="jurusan" required>
            <option selected disabled>Choose...</option>
          </select>
        </div>
      </div>

      <!--Select Nama Dosen-->
      <div class="form-group p-1 text-white">
        <div class="input-group mb-3">
          <label class="input-group-text" for="nama-dosen">Nama Dosen</label>
          <select class="form-select" id="nama-dosen" name="nama-dosen" required>
            <option selected disabled>Choose...</option>
          </select>
        </div>
      </div>

      <script>
        // Mendapatkan elemen-elemen dropdown
        var fakultasDropdown = document.getElementById("fakultas");
        var jurusanDropdown = document.getElementById("jurusan");
        var namaDosenDropdown = document.getElementById("nama-dosen");

        // Nilai jurusan dan nama dosen berdasarkan fakultas yang dipilih
        var jurusanValues = {
          "Ilmu Tarbiyah dan Keguruan": {
            "Ilmu Tarbiah dan Keguruan": ["Brahma, M.Ag."],
            "Pendidikan Ilmu Pengetahuan Sosial": ["Sri, M.Ag."],
            "Pendidikan Guru Madrasah Ibtidaiyah": ["Wahyu, M.Ag."]
          },
          "Syariah": {
            "Al-Ahwal al-Syakhshiyyah": ["Susi, M.Pd."],
            "Hukum Bisnis Syariah": ["Yani, M.Ag."],
          },
          "Humaniora": {
            "Bahasa dan Sastra Arab": ["Cia, M.Hum"],
            "Bahasa dan Sastra Inggris": ["Asia, M.Hum"],
            "Pendidikan Bahasa Arab": ["Lia, M.Hum"]
          },
          "Psikologi": {
            "Psikologi": ["Furqon, M.Si."]
          },
          "Ekonomi": {
            "D3 Perbankan Syariah": ["Layla, M.Si."],
            "Manajemen": ["Mia, M.Si."],
            "Perbankan Syariah": ["Basor, M.Si."],
            "Akuntansi": ["Leon, M.M."]
          },
          "Sains dan Teknologi": {
            "Teknik Infromatika": ["Hartono, M.Kom."],
            "Teknik Arsitektur": ["Agus, M.Kom."],
            "Matematika": ["Mahmud, M.Kom."],
            "Kimia": ["Yahdi, M.Kom."],
            "Biologi": ["Lusi, M.Si."],
            "Farmasi": ["Yanto, M.Si."],
            "Fisika": ["Mahdi, M.Si."]
          }
        };

        // Peristiwa perubahan pada dropdown fakultas
        fakultasDropdown.addEventListener("change", function() {
          // Mendapatkan nilai fakultas yang dipilih
          var selectedFakultas = fakultasDropdown.value;

          // Menghapus semua pilihan jurusan sebelumnya
          jurusanDropdown.innerHTML = '<option selected disabled>Choose...</option>';

          // Membuat pilihan jurusan berdasarkan fakultas yang dipilih
          if (selectedFakultas in jurusanValues) {
            var jurusans = jurusanValues[selectedFakultas];
            for (var jurusan in jurusans) {
              var option = document.createElement("option");
              option.value = jurusan;
              option.text = jurusan;
              jurusanDropdown.appendChild(option);
            }
          }
        });

        // Perubahan pada dropdown jurusan
        jurusanDropdown.addEventListener("change", function() {
          // Mendapatkan nilai fakultas dan jurusan yang dipilih
          var selectedFakultas = fakultasDropdown.value;
          var selectedJurusan = jurusanDropdown.value;

          // Menghapus semua pilihan nama dosen sebelumnya
          namaDosenDropdown.innerHTML = '<option selected disabled>Choose...</option>';

          // Membuat pilihan nama dosen berdasarkan fakultas dan jurusan yang dipilih
          if (selectedFakultas in jurusanValues && selectedJurusan in jurusanValues[selectedFakultas]) {
            var dosenList = jurusanValues[selectedFakultas][selectedJurusan];
            for (var i = 0; i < dosenList.length; i++) {
              var option = document.createElement("option");
              option.value = dosenList[i]; // Menggunakan nama dosen sebagai value
              option.text = dosenList[i];
              namaDosenDropdown.appendChild(option);
            }
          }

        });
      </script>

      <?php
      // Include file koneksi.php
      include 'koneksi.php';

      // Query untuk mendapatkan data dari database
      $query = "SELECT * FROM Pertanyaan";
      $result = mysqli_query($conn, $query);

      if ($result) {
        // Mendapatkan jumlah baris yang ditemukan
        $numRows = mysqli_num_rows($result);

        if ($numRows > 0) {
          // Menyiapkan array untuk menyimpan pertanyaan
          $pertanyaanArray = array();

          // Mengambil data baris per baris dari hasil query
          while ($row = mysqli_fetch_assoc($result)) {
            // Mendapatkan nilai kolom "pertanyaan"
            $pertanyaan = $row['pertanyaan'];

            // Menyimpan pertanyaan dalam array dengan indeks yang berbeda
            $pertanyaanArray[] = $pertanyaan;
          }
        } else {
          echo "Tidak ada data yang ditemukan.";
        }

        // Membebaskan memori dari hasil query
        mysqli_free_result($result);
      } else {
        echo "Error saat menjalankan query: " . mysqli_error($conn);
      }
      ?>

      <div class="soal mb-4">
        <!--Soal 1-->
        <div class="soal1 mb-3" style="font-size: 25px; color: white;">1. <?php echo $pertanyaanArray[0]; ?></div>
        <div class="row">
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jwb1" id="jwb1_1" value="Sangat Baik">
              <label class="form-check-label text-white" for="jwb1_1">Sangat Baik</label>
            </div>
          </div>
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jwb1" id="jwb1_2" value="Baik">
              <label class="form-check-label text-white" for="jwb1_2">Baik</label>
            </div>
          </div>
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jwb1" id="jwb1_3" value="Cukup Baik">
              <label class="form-check-label text-white" for="jwb1_3">Cukup Baik</label>
            </div>
          </div>
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jwb1" id="jwb1_4" value="Kurang Baik">
              <label class="form-check-label text-white" for="jwb1_4">Kurang Baik</label>
            </div>
          </div>
        </div>

        <!--Soal 2-->
        <div class="soal1 mb-3 mt-3" style="font-size: 25px; color: white;">2. <?php echo $pertanyaanArray[1]; ?></div>
        <div class="row">
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jwb2" id="jwb2_1" value="Sangat Baik">
              <label class="form-check-label text-white" for="jwb2_1">Sangat Baik</label>
            </div>
          </div>
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jwb2" id="jwb2_2" value="Baik">
              <label class="form-check-label text-white" for="jwb2_2">Baik</label>
            </div>
          </div>
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jwb2" id="jwb2_3" value="Cukup Baik">
              <label class="form-check-label text-white" for="jwb2_3">Cukup Baik</label>
            </div>
          </div>
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jwb2" id="jwb2_4" value="Kurang Baik">
              <label class="form-check-label text-white" for="jwb2_4">Kurang Baik</label>
            </div>
          </div>
        </div>

        <!--Soal 3-->
        <div class="soal3 mt-4 mb-3" style="font-size: 25px; color: white;">3. <?php echo $pertanyaanArray[2]; ?></div>
        <div class="row">
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jwb3" id="jwb3_1" value="Sangat Baik">
              <label class="form-check-label text-white" for="jwb3_1">Sangat Baik</label>
            </div>
          </div>
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jwb3" id="jwb3_2" value="Baik">
              <label class="form-check-label text-white" for="jwb3_2">Baik</label>
            </div>
          </div>
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jwb3" id="jwb3_3" value="Cukup Baik">
              <label class="form-check-label text-white" for="jwb3_3">Cukup Baik</label>
            </div>
          </div>
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jwb3" id="jwb3_4" value="Kurang Baik">
              <label class="form-check-label text-white" for="jwb3_4">Kurang Baik</label>
            </div>
          </div>
        </div>


        <!--Soal 4-->
        <div class="soal4 mt-4 mb-3" style="font-size: 25px; color: white;">4. <?php echo $pertanyaanArray[3]; ?></div>
        <div class="row">
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jwb4" id="jwb4_1" value="Sangat Baik">
              <label class="form-check-label text-white" for="jwb4_1">Sangat Baik</label>
            </div>
          </div>
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jwb4" id="jwb4_2" value="Baik">
              <label class="form-check-label text-white" for="jwb4_2">Baik</label>
            </div>
          </div>
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jwb4" id="jwb4_3" value="Cukup Baik">
              <label class="form-check-label text-white" for="jwb4_3">Cukup Baik</label>
            </div>
          </div>
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jwb4" id="jwb4_4" value="Kurang Baik">
              <label class="form-check-label text-white" for="jwb4_4">Kurang Baik</label>
            </div>
          </div>
        </div>

        <!--Soal 5-->
        <div class="soal5 mt-4 mb-3" style="font-size: 25px; color: white;">5. <?php echo $pertanyaanArray[4]; ?></div>
        <div class="row">
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jwb5" id="jwb5_1" value="Sangat Baik">
              <label class="form-check-label text-white" for="jwb5_1">Sangat Baik</label>
            </div>
          </div>
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jwb5" id="jwb5_2" value="Baik">
              <label class="form-check-label text-white" for="jwb5_2">Baik</label>
            </div>
          </div>
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jwb5" id="jwb5_3" value="Cukup Baik">
              <label class="form-check-label text-white" for="jwb5_3">Cukup Baik</label>
            </div>
          </div>
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jwb5" id="jwb5_4" value="Kurang Baik">
              <label class="form-check-label text-white" for="jwb5_4">Kurang Baik</label>
            </div>
          </div>
        </div>

        <!--Soal 6-->
        <div class="soal7 mt-4 mb-3" style="font-size: 25px; color: white;"> 6. <?php echo $pertanyaanArray[5]; ?></div>
        <div class="row">
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jwb6" id="jwb6_1" value="Sangat Baik">
              <label class="form-check-label text-white" for="jwb6_1">Sangat Baik</label>
            </div>
          </div>
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jwb6" id="jwb6_2" value="Baik">
              <label class="form-check-label text-white" for="jwb6_2">Baik</label>
            </div>
          </div>
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jwb6" id="jwb6_3" value="Cukup Baik">
              <label class="form-check-label text-white" for="jwb6_3">Cukup Baik</label>
            </div>
          </div>
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jwb6" id="jwb6_4" value="Kurang Baik">
              <label class="form-check-label text-white" for="jwb6_4">Kurang Baik</label>
            </div>
          </div>
        </div>

        <!--Soal 7-->
        <div class="soal7 mt-4 mb-3" style="font-size: 25px; color: white;"> 7. <?php echo $pertanyaanArray[6]; ?></div>
        <div class="row">
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jwb7" id="jwb7_1" value="Sangat Baik">
              <label class="form-check-label text-white" for="jwb7_1">Sangat Baik</label>
            </div>
          </div>
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jwb7" id="jwb7_2" value="Baik">
              <label class="form-check-label text-white" for="jwb7_2">Baik</label>
            </div>
          </div>
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jwb7" id="jwb7_3" value="Cukup Baik">
              <label class="form-check-label text-white" for="jwb7_3">Cukup Baik</label>
            </div>
          </div>
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jwb7" id="jwb7_4" value="Kurang Baik">
              <label class="form-check-label text-white" for="jwb7_4">Kurang Baik</label>
            </div>
          </div>
        </div>

        <!--Soal 8-->
        <div class="soal8 mt-4 mb-3" style="font-size: 25px; color: white;">8. <?php echo $pertanyaanArray[7]; ?></div>
        <div class="row">
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jwb8" id="jwb8_1" value="Sangat Baik">
              <label class="form-check-label text-white" for="jwb8_1">Sangat Baik</label>
            </div>
          </div>
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jwb8" id="jwb8_2" value="Baik">
              <label class="form-check-label text-white" for="jwb8_2">Baik</label>
            </div>
          </div>
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jwb8" id="jwb8_3" value="Cukup Baik">
              <label class="form-check-label text-white" for="jwb8_3">Cukup Baik</label>
            </div>
          </div>
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jwb8" id="jwb8_4" value="Kurang Baik">
              <label class="form-check-label text-white" for="jwb8_4">Kurang Baik</label>
            </div>
          </div>
        </div>

        <!--Soal 9-->
        <div class="soal9 mt-4 mb-3" style="font-size: 25px; color: white;">9. <?php echo $pertanyaanArray[8]; ?></div>
        <div class="row">
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jwb9" id="jwb9_1" value="Sangat Baik">
              <label class="form-check-label text-white" for="jwb9_1">Sangat Baik</label>
            </div>
          </div>
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jwb9" id="jwb9_2" value="Baik">
              <label class="form-check-label text-white" for="jwb9_2">Baik</label>
            </div>
          </div>
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jwb9" id="jwb9_3" value="Cukup Baik">
              <label class="form-check-label text-white" for="jwb9_3">Cukup Baik</label>
            </div>
          </div>
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jwb9" id="jwb9_4" value="Kurang Baik">
              <label class="form-check-label text-white" for="jwb9_4">Kurang Baik</label>
            </div>
          </div>
        </div>

        <!--Soal 10-->
        <div class="soal10 mt-4 mb-3" style="font-size: 25px; color: white;">10. <?php echo $pertanyaanArray[9]; ?></div>
        <div class="row">
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jwb10" id="jwb10_1" value="Sangat Baik">
              <label class="form-check-label text-white" for="jwb10_1">Sangat Baik</label>
            </div>
          </div>
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jwb10" id="jwb10_2" value="Baik">
              <label class="form-check-label text-white" for="jwb10_2">Baik</label>
            </div>
          </div>
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jwb10" id="jwb10_3" value="Cukup Baik">
              <label class="form-check-label text-white" for="jwb10_3">Cukup Baik</label>
            </div>
          </div>
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jwb10" id="jwb10_4" value="Kurang Baik">
              <label class="form-check-label text-white" for="jwb10_4">Kurang Baik</label>
            </div>
          </div>
        </div>

      </div>
      
      <!--Submit-->
      <div class="d-grid gap-2 col-6 mx-auto mt-3">
      <button class="btn btn-primary" type="submit">Submit</button>
      </div>
      
  </form>

        <!--Logout-->
        <div class="logout">
        <a href="logout.php" style="text-decoration: none;">
          <button type="button" class="btn btn-dark d-grid gap-2 col-2 mx-auto mt-3 ">Logout</button>
        </a>
      </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>