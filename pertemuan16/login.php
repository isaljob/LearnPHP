<?php
  // start session
  session_start();

  if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
  }

  // include functions.php agar bisa menjalankan function-function nya
  require 'functions.php';

  if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    // cek apakah username ada di database, jika ada maka nilai row adalah 1
    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // cek Username
    if (mysqli_num_rows($result) === 1) {

      // cek kesesuaian Password
      $row = mysqli_fetch_assoc($result);
      if (password_verify($password, $row["password"])) {
        // set session
        $_SESSION["login"] = true;

        // jika sesuai maka redirect ke index.php
        header("Location: index.php");
        exit;
      }
    }

    $error = true;

  }

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Halaman Login</title>
    <style media="screen">
      label {
        display: block;
      }
    </style>
  </head>
  <body>
    <h1>Halaman Login</h1>

    <?php if (isset($error)):?>
      <p style="color: red; font-style: italic;">
        Username/Password salah
      </p>
    <?php endif; ?>

    <form class="" action="" method="post">
      <ul>
        <li>
          <label for="username">Username:</label>
          <input type="text" name="username" value="" id="username">
        </li>
        <li>
          <label for="password">Password:</label>
          <input type="password" name="password" value="" id="password">
        </li>
        <li>
          <button type="submit" name="login">Login</button>
        </li>
      </ul>
    </form>
  </body>
</html>
