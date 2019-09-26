<?php
// associative array
// panggil key nya bukan index nya
  $arraymahasiswa =
  [
                [
                "nama" => "Faishal Fawwaz",
                "nim" => "08321042",
                "email" => "isaljob@gmail.com",
                "jurusan" => "Teknik Telekomunikasi"
              ],
                [
                "nama" => "Dian Puspita Sari",
                "nim" => "08321039",
                "email" => "enosaurus@gmail.com",
                "jurusan" => "Teknik Telekomunikasi"
                ]
  ];

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>associative Array</title>
   </head>
   <body>
     <h1>Daftar Mahasiswa</h1>
      <?php foreach ($arraymahasiswa as $mhs) :?>
        <div class="">
          <ul>
            <li>Nama: <?php echo($mhs["nama"]); ?></li>
            <li>NIM: <?php echo($mhs["nim"]); ?></li>
            <li>Email: <?php echo($mhs["email"]); ?></li>
            <li>Jurusan: <?php echo($mhs["jurusan"]); ?></li>
          </ul>
        </div>
      <?php endforeach; ?>
   </body>
 </html>
