<?php
  session_start();

  if ($_POST['submit'] == 'Add to cart' && $_POST['item_to_cart'] && $_SESSION['logged_on_user']) {
    $array[] = array('item' => $_POST['item_to_cart'], 'price' => $_POST['price']);
    $url = '../user/private/cart_'.$_SESSION['logged_on_user'];
    if (file_exists($url)) {
      $tmp = unserialize(file_get_contents($url));
      $array = array_merge($tmp, $array);
    }
    $ch = fopen($url, 'w');
    flock($ch, LOCK_EX);
    print_r($array);
    file_put_contents($url, serialize($array));
    fclose($ch);
  }

  header("Location: ../index.php");
?>
