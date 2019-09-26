<?php
  $mahasiswa = [
                 ["nama" => "Faishal Fawwaz",
                  "nim" => "08321042",
                  "prodi" => "Telekomunikasi",
                  "email" => "isaljob@gmail.com"]
                ,["nama" => "Dian Puspita Sari",
                  "nim" => "08321039",
                  "prodi" => "Telekomunikasi",
                  "email" => "enosaurus@gmail.com"]
                ]
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Daftar Mahasiswa</title>
  </head>
  <body>
    <h1>Daftar Mahasiswa</h1>
    <?php foreach ($mahasiswa as $mhs) :?>
      <ul>
        <li>
          <a href="latihan2.php?nama=<?php echo $mhs["nama"];?>&nim=<?php echo $mhs["nim"] ?>&prodi=<?php echo $mhs["prodi"]; ?>&email=<?php echo $mhs["email"]; ?>">
            <?php echo $mhs["nama"];?>
          </a>
        </li>
      </ul>
    <?php endforeach; ?>
  </body>
</html>
