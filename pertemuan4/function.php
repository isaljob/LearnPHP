<?php
    // function dengan parameter
    // parameter ditambahkan nilai default agar saat function dipanggil tanpa parameter dapat tetap berjalan
    function salam($waktu = "pagi", $nama = "kamu"){
        return "Selamat $waktu, $nama!";
    }
?>

<!DOCTYPE html>
<html>
 <head>
    <title>Latihan Function</title>
 </head>
 <body>
     <h1><?= salam("siang", "faishal");?></h1>
 </body>
</html>