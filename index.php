<?php require_once 'templates/header.php' ?>
  <div class="content">

    <?php
      require_once('assets/read_csv.php');
      require_once('assets/print_item.php');

      $items = read_csv('user/private/articles.csv');

      echo '<div class="articles">';
      foreach ($items as $i) {
        print_item($i);
      }
      echo '</div>';
    ?>

    <?php echo file_get_contents('templates/footer.php'); ?>
  </div>
</body>
</html>
