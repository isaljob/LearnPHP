<?php
  session_start();
  $_SESSION = []; //kosongkan session
  session_unset();
  session_destroy();

  // menghapus cookie
  //hapus cookie dengan cara mengeset cookie yang pernah dibuat dengan dibuat expired
  setcookie('id', '', time()-3600);
  setcookie('key', '', time()-3600);

  header("Location: login.php");
  exit;
  ?>
