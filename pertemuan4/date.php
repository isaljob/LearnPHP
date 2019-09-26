<?php
// built-in function Date, untuk menampilkan tanggal dengan format tertentu
    echo date("l, d-M-Y");
    echo "<br>";

// built-in function Time
    echo time();
    echo "<br>";

// built-in function mktime, membuat sendiri detik
// mktime(0,0,0,0,0,0) -> jam, menit, detik, tanggal, bulan, tahun
    echo date("l", mktime(0,0,0,12,3,1990));
    echo "<br>";
?>