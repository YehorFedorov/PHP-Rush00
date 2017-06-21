<?php
  session_start();

  $item_to_remove = $_GET['item'];
  $path = '../user/private/cart_'.$_SESSION['logged_on_user'];
  $file = unserialize(file_get_contents($path));
  $i = 0;
  foreach ($file as $f) {
    if ($f['item'] == $item_to_remove) {
      unset($file[$i]);
      $new_file = array_values($file);
      file_put_contents($path, serialize($new_file));
      header("Location: ../view_cart.php");
      exit;
    }
    $i++;
  }
?>
