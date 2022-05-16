  <?php

  if (isset($_REQUEST['q'])) {
    $offset = $_REQUEST['q'];
  } else {
    $offset = 0;
  }

  $json = file_get_contents('../data/cars.json');
  $plates = json_decode($json, true);

  ?>

  <div class="title"><?php echo $offset * 1000; ?> ~ <?php echo $offset * 1000 + 999; ?></div>
  <div class="numblock-outer">
    <?php for ($i = 0; $i < 10; $i++) : ?>
      <div class="numblock" data-offset="<?php echo $offset; ?>">
        <?php
        for ($x = 0; $x < 100; $x++) : ?>
          <?php $pos = $x + ($i * 100) + ($offset * 1000); ?>
          <div data-num="<?php echo $pos ?>" data-spotted="<?php echo $plates[$pos]['found']; ?>" class="plate<?php
                                                                                                              if ($plates[$pos]['found'] === "true") {
                                                                                                                echo " spotted";
                                                                                                              }
                                                                                                              ?>">
          </div>
        <?php endfor; ?>
      </div>
    <?php endfor; ?>
  </div>
