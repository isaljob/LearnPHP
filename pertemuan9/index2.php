<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

// ambil data dari tabel Mahasiswa
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");

// ambil data (fetch) mahasiswa dari object result, ada 4 cara:
// mysqli_fetch_row()  ------> mengembalikan nilai array numerik
// mysqli_fetch_assoc() -----> mengembalikan nilai array associative
// mysqli_fetch_array() -----> mengembalikan nilai array numerik dan associative
// mysqli_fetch_object() ----> mengembalikan nilai object, harus pakai $mhs->nama

// while ($mhs = mysqli_fetch_assoc($result)) {
//   var_dump($mhs["nama"]);
// };

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

        <?php $i = 1; ?>
        <?php while($row = mysqli_fetch_assoc($result)) : ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td>
            <a href="">Ubah</a> |
            <a href="">Hapus</a>
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
        <?php endwhile; ?>
    </table>

  </body>
</html>
