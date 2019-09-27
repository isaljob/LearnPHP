<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

// ambil data dari tabel Mahasiswa
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Halaman Admin</title>
  </head>
  <body>

    <h1>Daftar Mahasiswa</h1>

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
        <tr>
          <td>1</td>
          <td>
            <a href="">Ubah</a> |
            <a href="">Hapus</a>
          </td>
          <td>
            <img src="img/faishal.jpg" alt="" width="100px">
          </td>
          <td>08321042</td>
          <td>Faishal Fawwaz</td>
          <td>isaljob@gmail.com</td>
          <td>Teknik Telekomunikasi</td>
        </tr>
    </table>

  </body>
</html>
