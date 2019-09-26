<?php
// perulangan
// for, while, do.. while, foreach: perulangan khusus array

// for
for ($i=0;$i<5;$i++){
    echo "Test for saja.. <br>";
}

// while ---> tidak dijalankan jika false
$i = 0;
while ($i<5){
    echo "Test while saja.. <br>";
    $i++;
}

// do.. while ---> dijalankan minimal 1 kali jika false
$i = 10;
do {
    echo "Test do while saja.. <br>";
    $i++;
} while ($i < 5);

?>