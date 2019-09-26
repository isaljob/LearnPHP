<?php
  if (!isset($_GET["nama"]) ||
      !isset($_GET["nim"]) ||
      !isset($_GET["prodi"]) ||
      !isset($_GET["email"])){
    // redirect
    header("Location: latihan1.php");
    exit;
  }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>GET Method</title>
    <style media="screen">
      img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
      }
    </style>
  </head>
  <body>
    <ul>
      <img src="<?php echo $_GET["nama"];?>.jpg" alt="">
      <li><?php echo $_GET["nama"];?></li>
      <li><?php echo $_GET["nim"];?></li>
      <li><?php echo $_GET["prodi"];?></li>
      <li><?php echo $_GET["email"];?></li>
    </ul>
  </body>
</html>
