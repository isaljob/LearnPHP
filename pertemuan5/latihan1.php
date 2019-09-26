<?php
// array
// variable yang dapat memiliki banyak nilai

// membuat array
// cara lama
$hari = array("Senin","Selasa","Rabu","Kamis");

// cara baru
$bulan = ["Januari","Februari","Maret","April","Mei","Juni"];


// menampilkan array di browser
// var_dump() atau print_r()
var_dump($hari);
echo "<br>";
print_r($bulan);
echo "<br>";

// menambahkan array
$hari[] = "Jumat";
var_dump($hari);
 ?>
