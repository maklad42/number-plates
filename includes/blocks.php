  <?php

  if (isset($_REQUEST['q'])) {
    $offset = $_REQUEST['q'];
  } else {
    $offset = 0;
  }

  $start = $offset * 1000;
  $end = $offset * 1000 + 999;

  $json = file_get_contents('../data/cars.json');
  $plates = json_decode($json, true);

  $total_found = 0;
  $found_here = 0;

  foreach ($plates as $key => $val) {
    if ($val['found'] === 'true') {
      $total_found += 1;
    }
    if ($key >= $start && $key <= $end) {
      if ($val['found'] === 'true') {
        $found_here += 1;
      }
    }
  }

  ?>

  <div class="title"><?php echo $start; ?> ~ <?php echo $end; ?></div>
  <div class="totalfound"><?php echo $found_here; ?> out of the <?php echo $total_found; ?> total found plates. Only <?php echo number_format(10000 - $total_found); ?> to go.</div>
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
