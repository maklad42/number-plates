<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cars</title>
  <link rel="stylesheet" href="./styles/cars.css" />
  <script async src="./scripts/cars.js"></script>
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
    <div class="details">
      #<span class="plate-num"></span><br>
      <span class="plate-spotted">Still looking...</span>
    </div>
    <div class="numblock-outer">
      <?php include './includes/blocks.php'; ?>
    </div>
  </div>
</body>

</html>
