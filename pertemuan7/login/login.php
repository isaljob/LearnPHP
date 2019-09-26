<?php
// cek apakah tombol submit sudah ditekan
if (isset($_POST["submit"])) {
  // cek username & Password
  if ($_POST["username"] == "admin" && $_POST["password"] == "123") {
    // jika benar, redirect ke halaman Admin
    header("Location: admin.php");
    exit;
  } else {
    // jika salah, tampilkan pean kesalahan
    $error = true;
  }
}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Halaman Login</title>
  </head>
  <body>
    <h1>Login Admin</h1>

    <?php if(isset($error)) : ?>
      <p style="color: red; font-style: italic;">username / password salah</p>
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
          <button type="submit" name="submit">Login</button>
        </li>
      </ul>
    </form>
  </body>
</html>
