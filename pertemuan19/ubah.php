<?php
  // start session
  session_start();

  // cek apakah sudah login / apakah ada session Login
  if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
  }

  // include functions.php agar bisa menjalankan function-function nya
  require 'functions.php';

  // ambil data di URL
  $id = $_GET["id"];

  // query data mahasiswa berdasarkan id
  $mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0]; // ditambahkan index [0] karena hasil dari function query mereturn array numerik
  echo $mhs["nama"];

  // cek apakah tombol sumbit pernah ditekan atau belum
  if (isset($_POST["submit"])) {
    // cek apakah data berhasil diubah atau tidak
    if (ubah($_POST) > 0) {
      echo "
        <script>
          alert('Data berhasil diubah');
          document.location.href = 'index.php';
        </script>
      ";
    } else {
      echo "
        <script>
          alert('Data gagal diubah');
          document.location.href = 'index.php';
        </script>
      ";
    };
  };
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ubah Data Mahasiswa</title>
  </head>
  <body>
    <h1>Ubah Data Mahasiswa</h1>

    <a href="index.php">Kembali ke halaman Index</a>

    <form class="" action="" method="post" enctype="multipart/form-data">
      <!-- bikin input tapi hidden, untuk mengirimkan $id ke ubah.php -->
      <input type="hidden" name="id" value="<?php echo $mhs["id"]; ?>">
      <input type="hidden" name="gambarLama" value="<?php echo $mhs["gambar"]; ?>">
      <ul>
        <li>
          <label for="nama">Nama :</label>
          <input type="text" name="nama" value="<?php echo $mhs["nama"]; ?>" id="nama" required>
        </li>
        <li>
          <label for="nim">NIM :</label>
          <input type="text" name="nim" value="<?php echo $mhs["nim"]; ?>" id="nim" required>
        </li>
        <li>
          <label for="email">Email :</label>
          <input type="text" name="email" value="<?php echo $mhs["email"]; ?>" id="email" required>
        </li>
        <li>
          <label for="jurusan">Jurusan :</label>
          <input type="text" name="jurusan" value="<?php echo $mhs["jurusan"]; ?>" id="jurusan" required>
        </li>
        <li>
          <label for="gambar">Gambar :</label> <br>
          <img src="./img/<?php echo $mhs["gambar"] ?>" alt="" width="50px"> <br>
          <input type="file" name="gambar" id="gambar">
        </li>
        <li>
          <button type="submit" name="submit">Ubah Data</button>
        </li>
      </ul>
    </form>
  </body>
</html>
