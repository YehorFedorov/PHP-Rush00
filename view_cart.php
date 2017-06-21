<?php
  session_start();
  ?>
  <?php require 'templates/header.php'; ?>
  <?php
  require_once 'assets/read_csv.php';


  echo '<div class="content cart">';
  $path = 'user/private/cart_'.$_SESSION['logged_on_user'];
  $file = unserialize(file_get_contents($path));
  // print_r($file);
  echo "\n\n\n";
  $items = read_csv('user/private/articles.csv');
  // print_r($items);
  $sum = 0;
  foreach ($file as $f) {
    echo '<div class="wrapper">';
    echo '<form action="assets/remove_item.php" method="GET" class="remove_item"><input type="hidden" name="item" value="'.$f['item'].'"/><input type="submit" name="submit" value="X"/></form>';
    foreach ($items as $i) {
      if ($i['Name'] == $f['item']) {
        echo '<div class="cart_img"><img src="'.$i['Image'].'"></div>';
      }
    }
    echo '<div class="title">'.$f['item'].'</div>';
    echo '<div class="price">'.$f['price'].'</div>';
    $sum += $f['price'];
    echo '</div>';
  }
  echo '<div class="total">'.$sum.'</div>';
  echo '<form action="order.php" class="order_table"><input type="hidden" name="user" value="'.$_SESSION['logged_on_user'].'"/><input type="submit" name="submit" value="Submit order"/></form>';
  echo '<div class="back_to_main"><a href="index.php">Back to homepage</a></div>';
  echo '</div>';
  require_once('templates/footer.php')
?>
