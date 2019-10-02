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

  $id = $_GET["id"];

  if( hapus($id) > 0) {
    echo "
      <script>
        alert('Data berhasil dihapus');
        document.location.href = 'index.php';
      </script>
    ";
  } else {
    echo "
      <script>
        alert('Data gagal dihapus');
        document.location.href = 'index.php';
      </script>
    ";
  }

 ?>
