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

    // upload Gambar
    $gambar = upload();
    if (!$gambar) {
      return false;
    }

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

  // function upload
  function upload() {

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
      echo "<script>
              alert('Pilih gambar terlebih dahulu!')
            </script>";
      return false;
    }

    // cek apakah yang diupload adalah Gambar
    $ekstensiGambarValid = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.', $namaFile); // memecah string menjadi array dengan delimiter tertentu
    $ekstensiGambar = strtolower(end($ekstensiGambar)); // mengambil elemen array terkahir, yaitu ekstensi gambar. kemudian ditambahkan strtolower dipaksa agar lowercase semua
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
      echo "<script>
              alert('File yang diupload bukan gambar!')
            </script>";
      return false;
    }

    // cek ukuran Gambar

  }

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


  // query Cari
  function cari($keyword){
    $query = "SELECT * FROM mahasiswa
              WHERE  nama like '%$keyword%'
                  OR nim like '%$keyword%'
                  OR email like '%$keyword%'
                  OR jurusan like '%$keyword%'
            ";
    return query($query);
  }

 ?>
