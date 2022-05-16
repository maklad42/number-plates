<?php

if (isset($_REQUEST['plate'])) : ?>

  <?php
  $json = file_get_contents('../data/cars.json');
  $plates = json_decode($json, true);

  $n = $_REQUEST['plate'];
  if ($plates[$n]['found'] == 'true') {
    $status = 'Sorry, ' . $n . ' is already in the DB.';
  } else {
    $status = 'Added!';
  }
  ?>

  <div class="msg-wrapper"><?php echo $status; ?></div>

<?php endif ?>
