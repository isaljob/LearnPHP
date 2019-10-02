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

  // cek apakah tombol sumbit pernah ditekan atau belum
  if (isset($_POST["submit"])) {

    // cek apakah data berhasil ditambahkan
    if (tambah($_POST) > 0) {
      echo "
        <script>
          alert('Data berhasil ditambahkan');
          document.location.href = 'index.php';
        </script>
      ";
    } else {
      echo "
        <script>
          alert('Data gagal ditambahkan');
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
    <title>Tambah Data Mahasiswa</title>
  </head>
  <body>
    <h1>Tambah Data Mahasiswa</h1>

    <a href="index.php">Kembali ke halaman Index</a>

    <form class="" action="" method="post" enctype="multipart/form-data">
      <ul>
        <li>
          <label for="nama">Nama :</label>
          <input type="text" name="nama" value="" id="nama" required>
        </li>
        <li>
          <label for="nim">NIM :</label>
          <input type="text" name="nim" value="" id="nim" required>
        </li>
        <li>
          <label for="email">Email :</label>
          <input type="text" name="email" value="" id="email" required>
        </li>
        <li>
          <label for="jurusan">Jurusan :</label>
          <input type="text" name="jurusan" value="" id="jurusan" required>
        </li>
        <li>
          <label for="gambar">Gambar :</label>
          <input type="file" name="gambar" value="" id="gambar">
        </li>
        <li>
          <button type="submit" name="submit">Tambah Data</button>
        </li>
      </ul>
    </form>
  </body>
</html>
