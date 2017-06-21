<?php
  function read_csv($url) {
    $fch = fopen($url, 'r');
    $items_array = array();
    $keys = array();
    $tmp = array();
    $i = 0;
    while (($items = fgetcsv($fch, ',')) != False) {
      if ($i == 0) {
        $keys = $items;
        $i = 1;
      }
      else {
        for ($j = 0; $j<count($keys); $j++) {
            $tmp[$keys[$j]] = $items[$j];
        }
        $items_array[] = $tmp;
      }
    }
    fclose($fch);
    return ($items_array);
  }
?>
