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

  // pagination
  // konfigurasi
  $jumlahDataPerHalaman = 1;
  $jumlahData = count(query("SELECT * FROM mahasiswa"));
  $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman); // pembulatan hasil bagi ke atas
  // if else dengan ternary
  $halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1; // apakah ada halaman aktif, jika ya ambil dengan $_GET['halaman'] jika tidak paksa ke halaman 1 (default)
  $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

  // query table mahasiswa
  $mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerHalaman"); // function query dari functions.php

  // jika tombol cari di klik
  if(isset($_POST["cari"])){
    $mahasiswa = cari($_POST["keyword"]);
  }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Halaman Admin</title>
    <style media="screen">
      .loading {
        width: 100px;
        position: absolute;
        top: 135px;
        left: 300px;
        z-index: -1;
        display: none;
      }
    </style>
  </head>
  <body>

    <a href="logout.php">Logout</a>

    <h1>Daftar Mahasiswa</h1>

    <!-- link untuk tambah data -->
    <a href="tambah.php">Tambah data mahasiswa</a>
    <br><br>

    <!-- form cari -->
    <form class="" action="" method="post">
      <input type="text" name="keyword" value="" size="40" autofocus placeholder="Masukkan keyword..." autocomplete="off" id="keyword">
      <button type="submit" name="cari" id="tombol-cari">Cari</button>
      <img src="img/loading.gif" alt="" class="loading">
    </form>
    <br>

    <!-- menambahkan pagination -->
    <!-- navigasi -->
    <?php if ($halamanAktif > 1) : ?>
      <a href="?halaman=<?php echo $halamanAktif-1; ?>">&laquo</a>
    <?php endif; ?>

    <?php for ($i=1; $i<=$jumlahHalaman ; $i++) :?>
      <?php if ($i == $halamanAktif) : ?>
        <a href="?halaman=<?php echo $i; ?>" style="font-weight: bold; color: red;"><?php echo $i; ?></a>
      <?php else : ?>
        <a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
      <?php endif; ?>
    <?php endfor; ?>

    <?php if ($halamanAktif < $jumlahHalaman) : ?>
      <a href="?halaman=<?php echo $halamanAktif+1; ?>">&raquo</a>
    <?php endif; ?>
    <br><br>


    <!-- menampilkan table hasil query -->
    <div class="" id="container">
      <table border="1" cellpadding="10" cellspacing="0">
          <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
          </tr>

          <?php $i = 1; ?>
          <?php foreach ( $mahasiswa as $row ) : ?>
          <tr>
            <td><?php echo $i; ?></td>
            <td>
              <a href="ubah.php?id=<?php echo $row["id"];?>">
                Ubah
              </a> |
              <a href="hapus.php?id=<?php echo $row["id"];?>"
                 onclick="return confirm('Anda yakin?');">
                Hapus
              </a>
            </td>
            <td>
              <img src="img/<?php echo $row["gambar"]; ?>" alt="" width="100px">
            </td>
            <td><?php echo $row["nim"]; ?></td>
            <td><?php echo $row["nama"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
            <td><?php echo $row["jurusan"]; ?></td>
          </tr>
          <?php $i++; ?>
        <?php endforeach; ?>
      </table>
    </div>
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
  </body>
</html>
