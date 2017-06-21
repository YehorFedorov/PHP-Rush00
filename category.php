<?php
  require_once 'templates/header.php';

  include 'assets/read_csv.php';
  include 'assets/print_item.php';

  echo '<div class="content">';
  echo '<div class="articles">';
  if ($_POST['submit'] == 'Home') {
    header("Location: index.php");
  } elseif ($_POST['submit'] == 'Apples') {
      $category = 'apples';
  } elseif ($_POST['submit'] == 'Banannas') {
      $category = 'banannas';
  } elseif ($_POST['submit'] == 'Citrus') {
      $category = 'citrus';
  }
  $path = read_csv('user/private/articles.csv');
  $i = 0;
  foreach ($path as $p) {
    if (strpos($p['Category'], $category) !== False) {
      print_item($path[$i]);
    }
    $i++;
  }
  echo '</div>';
  echo '</div>';

  require_once 'templates/footer.php';
?>
