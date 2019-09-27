<?php
  // koneksi ke database
  $conn = mysqli_connect("localhost", "root", "", "phpdasar");

  function query($query) { // nangkap parameter $query dari index.php
    global $conn; // agar dapat menggunakan variable diluar functions
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
    }
    return $rows;
  }

 ?>
