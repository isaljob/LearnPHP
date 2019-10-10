<?php

  // beri delay untuk melihat efek gif loading
  sleep(1);



  require '../functions.php';

  $keyword = $_GET['keyword'];
  $query = "SELECT * FROM mahasiswa
            WHERE  nama like '%$keyword%'
                OR nim like '%$keyword%'
                OR email like '%$keyword%'
                OR jurusan like '%$keyword%'
          ";
  $mahasiswa = query($query);

 ?>

 <table border="1" cellpadding="10" cellspacing="0">
     <tr>
       <th>No.</th>
       <th>Aksi</th>
       <th>Gambar</th>
       <th>NIM</th>
       <th>Nama</th>
       <th>Email</th>
       <th>Jurusan</th>
     </tr>

     <?php $i = 1; ?>
     <?php foreach ( $mahasiswa as $row ) : ?>
     <tr>
       <td><?php echo $i; ?></td>
       <td>
         <a href="ubah.php?id=<?php echo $row["id"];?>">
           Ubah
         </a> |
         <a href="hapus.php?id=<?php echo $row["id"];?>"
            onclick="return confirm('Anda yakin?');">
           Hapus
         </a>
       </td>
       <td>
         <img src="img/<?php echo $row["gambar"]; ?>" alt="" width="100px">
       </td>
       <td><?php echo $row["nim"]; ?></td>
       <td><?php echo $row["nama"]; ?></td>
       <td><?php echo $row["email"]; ?></td>
       <td><?php echo $row["jurusan"]; ?></td>
     </tr>
     <?php $i++; ?>
   <?php endforeach; ?>
 </table>
