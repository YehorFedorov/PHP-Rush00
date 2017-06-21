<?php
  session_start();

  ?>
  <?php require 'templates/header.php'; ?>
  <?php
  require_once 'assets/read_csv.php';


  $path = 'user/private/cart_'.$_SESSION['logged_on_user'];
  $newpath = 'user/private/order_'.$_SESSION['logged_on_user'];
  rename($path, $newpath);
  echo '<div class="content order">';
  echo "Thank you for bying in our shop!! The administration will be happy to connect with you ASAP :)";
  echo '<div class="back_to_main"><a href="index.php">Back to homepage</a></div>';
  echo '</div>';
  require_once('templates/footer.php')
?>
