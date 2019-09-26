<?php
// perulabgan pada php
// for atau foerach
  $angka = [1,4,3,2,6,5,8,7];

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Latihan 2</title>
    <style media="screen">
      .kotak {
        background-color: salmon;
        width: 50px;
        height: 50px;
        margin: 3px;
        text-align: center;
        line-height: 50px;
        float: left;
      }
      .clear {
        clear: both;
      }
    </style>
  </head>
  <body>
    <!-- pake for biasa -->
    <?php for ($i=0; $i < count($angka); $i++) { ?>
      <div class="kotak">
        <?php echo $angka[$i]; ?>
      </div>
    <?php } ?>

    <div class="clear">
    </div>

    <!-- pake foreach -->
    <?php foreach ($angka as $a) { ?>
      <div class="kotak">
        <?php echo $a; ?>
      </div>
    <?php } ?>

    <div class="clear">
    </div>

    <!-- penulisan yang lebih simple  -->
    <?php foreach ($angka as $a) : ?>
      <div class="kotak">
        <?= $a; ?>
      </div>
    <?php endforeach; ?>


  </body>
</html>
