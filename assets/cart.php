<?php
  session_start();

  function get_cart_contents($url) {
    $ch = fopen($url, 'r');
    $file = file_get_contents($url);
    if (file_exists($url) && $file == True) {
      return True;
    } else {
      return False;
    }
  }

  function cart() {
    if (!$_SESSION['logged_on_user']) {
      echo "Please login<br>to use cart";
    } else {
      $url = 'user/private/cart_'.$_SESSION['logged_on_user'];
      if (file_exists($url)) {
        $sum = 0;
        $it_num = 0;
        $items = unserialize(file_get_contents($url));
        foreach ($items as $i) {
          $sum += $i['price'];
        }
        echo '<a href="view_cart.php">'.count($items).'items - '.$sum.'$'.'</a>';
      }
      else {
        echo "Your cart is empty";
      }
    }
  }
?>
