<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Latihan Array</title>
    <style media="screen">
      .kotak {
        width: 30px;
        height: 30px;
        background-color: #BADA55;
        border-radius: 50%;
        text-align: center;
        line-height: 30px;
        margin: 3px;
        float: left;
      }

      .kotak:hover {
        transform: rotate(45deg);
      }

      .clear {
        clear: both;
      }
    </style>
  </head>
  <body>

    <?php
      $arrnumbers = [[1,2,3],[4,5,6],[7,8,9]];
    ?>

    <?php foreach ($arrnumbers as $numbers) :?>
      <?php foreach ($numbers as $number) :?>
        <div class="kotak">
          <?php echo $number; ?>
        </div>
      <?php endforeach; ?>
        <div class="clear">
          <!-- untuk mencetak baris menjadi kolom, dengan kata lain membersihkan efek float nya -->
        </div>
    <?php endforeach; ?>


  </body>
</html>
