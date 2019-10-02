<?php
  // start session
  session_start();

  // include functions.php agar bisa menjalankan function-function nya
  require 'functions.php';

  // cek cookie dan username
  if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM user WHERE id = '$id'");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if ($key === hash('sha256', $row['username'])) { // $key adalah username yang sudah diacak
      $_SESSION['login'] = true;
    }
  }

  if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
  }

  if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    // query username dengan $username yang diinput olen user/pengguna
    // jika username ada di database, nilai row adalah 1
    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // nah jika nilai row adalah 1 berarti username tersebut ada, kemudian menjalankan code selanjutnyta
    if (mysqli_num_rows($result) === 1) {

      // jika username ada, cek kesesuaian Password
      $row = mysqli_fetch_assoc($result);
      if (password_verify($password, $row["password"])) { // password_verify adalah fungsi untuk mencocokan password yang diinput yang sudah di encrypt

        // jika password sesuai, set session
        $_SESSION["login"] = true;

        // cek remember me
        if (isset($_POST["remember"])) {

          // jika checkbox remember me dicentang, buat 2 cookie, satu untuk id satu untuk username yang di encrypt/acak
          // id dan username diambil dari hasil query yang sudah di fetch di $row
          setcookie('id', $row['id'], time()+60);
          setcookie('key', hash('sha256', $row['username']), time()+60);
        }

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
            <input type="checkbox" name="remember" value="" id="remember">
            <label for="remember">Remember Me </label>
        </li>
        <li>
          <button type="submit" name="login">Login</button>
        </li>
      </ul>
    </form>
  </body>
</html>
