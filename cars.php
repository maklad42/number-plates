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
    <form submit="./addplate.php" method="post">
      <label for="carnumber">Number plate:</label>
      <input type="text" id="carnumber" name="carnumber" class="carnumber">
      <input type="submit" id="submit" name="submit" value="Add">
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
    <div class="pager">
      <div class="pagerlist">
        <div data-btn="k0" class="pager-btn first">&lt;&lt;</div>
        <div data-btn="prev" class="pager-btn prev">&lt;</div>
        <div data-btn="k0" class="pager-btn k0">0</div>
        <div data-btn="k1" class="pager-btn k1">1</div>
        <div data-btn="k2" class="pager-btn k2">2</div>
        <div data-btn="k3" class="pager-btn k3">3</div>
        <div data-btn="k4" class="pager-btn k4">4</div>
        <div data-btn="k5" class="pager-btn k5">5</div>
        <div data-btn="k6" class="pager-btn k6">6</div>
        <div data-btn="k7" class="pager-btn k7">7</div>
        <div data-btn="k8" class="pager-btn k8">8</div>
        <div data-btn="k9" class="pager-btn k9">9</div>
        <div data-btn="next" class="pager-btn next">&gt;</div>
        <div data-btn="k9" class="pager-btn last">&gt;&gt;</div>
      </div>
      <div id="curPage">-</div>
    </div>
  </div>
</body>

</html>
