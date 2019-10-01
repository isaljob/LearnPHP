<?php
  session_start();
  $_SESSION = []; //kosongkan session
  session_unset();
  session_destroy();

  header("Location: login.php");
  exit;
  ?>
