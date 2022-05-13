  <?php

  if (isset($_REQUEST['curr'])) {
    $offset = $_REQUEST['curr'];
  } else {
    $offset = 0;
  }

  $json = file_get_contents('./data/cars.json');
  $plates = json_decode($json, true);
  // var_dump($plates);

  for ($i = 0; $i < 10; $i++) : ?>
    <div class="numblock">
      <?php
      for ($x = 0; $x < 100; $x++) : ?>
        <?php $pos = $x + ($i * 100) + ($offset * 1000); ?>
        <div data-num="<?php echo $pos ?>" data-spotted="<?php echo $plates[$pos]; ?>" class="plate<?php
                                                                                                    if ($plates[$pos] === "true") {
                                                                                                      echo " spotted";
                                                                                                    }
                                                                                                    ?>">
        </div>
      <?php endfor; ?>
    </div>
  <?php endfor; ?>
