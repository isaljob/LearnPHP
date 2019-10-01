<?php
  // koneksi ke database
  $conn = mysqli_connect("localhost", "root", "", "phpdasar");

  // function query
  function query($query) { // nangkap parameter $query dari index.php
    global $conn; // agar dapat menggunakan variable diluar functions
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
    }
    return $rows;
  };

  // query insert data
  function tambah($data) {
    global $conn; // agar dapat menggunakan variable diluar functions
    // ambil data dari tiap elemen
    $nama = htmlspecialchars($_POST["nama"]); // agar tidak bisa diinput tag html ditambahkan function htmlspecialchars
    $nim = htmlspecialchars($_POST["nim"]);
    $email = htmlspecialchars($_POST["email"]);
    $jurusan =htmlspecialchars($_POST["jurusan"]);
    $gambar = htmlspecialchars($_POST["gambar"]);

    // variable $query
    $query = "INSERT INTO mahasiswa
              VALUES ('','$nama','$nim','$email','$jurusan','$gambar')
              ";

    // query insert data
    mysqli_query($conn, $query);

    // cek apakah data berhasil ditambahkan atau tidak
    // pakai mysqli_affected_rows() nanti akan mereturn value 1 atau lebih jika berhasil
    // atau -1 jika gagal
    // mereturn status affected kan database
    return mysqli_affected_rows($conn);
  };

  // query delete data
  function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");

    return mysqli_affected_rows($conn);
  };

  // query update data
  function ubah($data) {
    global $conn; // agar dapat menggunakan variable diluar functions
    // ambil data dari tiap elemen
    $id = $_POST["id"];
    $nama = htmlspecialchars($_POST["nama"]); // agar tidak bisa diinput tag html ditambahkan function htmlspecialchars
    $nim = htmlspecialchars($_POST["nim"]);
    $email = htmlspecialchars($_POST["email"]);
    $jurusan =htmlspecialchars($_POST["jurusan"]);
    $gambar = htmlspecialchars($_POST["gambar"]);

    // variable $query
    $query = "UPDATE mahasiswa
              SET nama = '$nama',
                  nim = '$nim',
                  email = '$email',
                  jurusan = '$jurusan',
                  gambar = '$gambar'
              WHERE id = $id
              ";

    // query update data
    mysqli_query($conn, $query);

    // cek apakah data berhasil ditambahkan atau tidak
    // pakai mysqli_affected_rows() nanti akan mereturn value 1 atau lebih jika berhasil
    // atau -1 jika gagal
    // mereturn status affected kan database
    return mysqli_affected_rows($conn);
  };
 ?>
