<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cars</title>
  <link rel="stylesheet" href="./styles/cars.css" />
</head>

<body>
  <header></header>
  <nav>

  </nav>
  <main>
    <form submit="./cars.php" method="post">
      <label for="carnumber">Number plate:</label>
      <input type="text" id="carnumber" name="carnumber" class="carnumber">
    </form>
  </main>
  <div class="found">
    <div class="title">0 ~ 0999</div>
    <div class="numblock-outer">
      <?php
      for ($i = 1; $i <= 10; $i++) : ?>
        <div class="numblock">
          <?php
          for ($x = 0; $x < 100; $x++) : ?>
            <div data-num="<?php echo $x ?>" class="plate"></div>
          <?php endfor; ?>
        </div>
      <?php endfor; ?>
    </div>
  </div>
</body>

</html>
