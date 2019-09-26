<?php
  $mahasiswa = [
                 ["Faishal Fawwaz","08321042","Telekomunikasi","isaljob@gmail.com"]
                ,["Dian Puspita Sari","08321039","Telekomunikasi","enosaurus@gmail.com"]
                ]
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Latihan 3</title>
   </head>
   <body>
     <h1>Daftar Mahasiswa</h1>

     <ul>
       <?php foreach ($mahasiswa as $mhs) : ?>
         <li>Nama: <?php echo $mhs[0]; ?></li>
         <li>NIM: <?php echo $mhs[1]; ?></li>
         <li>Jurusan: <?php echo $mhs[2]; ?></li>
         <li>Email: <?php echo $mhs[3]; ?></li>
         <br>
       <?php endforeach; ?>
     </ul>
   </body>
 </html>
