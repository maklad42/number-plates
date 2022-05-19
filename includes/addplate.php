<?php

if (isset($_REQUEST['plate'])) : ?>

  <?php
  $json = file_get_contents('../data/cars.json');
  $plates = json_decode($json, true);

  $n = $_REQUEST['plate'];
  if ($plates[$n]['found'] == 'true') {
    $status = 'Sorry, ' . $n . ' is already in the DB.';
    $added = 'duplicate';
  } else {
    // set date
    $dt = date('Y-m-d');

    // create backup file
    $bak = json_encode($plates, JSON_FORCE_OBJECT | JSON_PRETTY_PRINT);
    file_put_contents('../data/bak/cars_' . $dt . '.json', $bak);

    // update plates list
    $plates[$n]['found'] = 'true';
    $plates[$n]['when'] = $dt;

    // create new file
    $newfile = json_encode($plates, JSON_FORCE_OBJECT | JSON_PRETTY_PRINT);
    file_put_contents('../data/cars.json', $newfile);

    // display the status of the request
    $status = 'Added ' . $n . ' on ' . $dt;
    $added = 'newplate';
  }
  ?>

  <div class="message <?php echo $added . '">' . $status; ?></div>

<?php endif ?>
