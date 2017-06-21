<?php
  function print_item($val) {
    echo '<div class="item">';
      echo '<div class="item-img">
        <img src="'.$val['Image'].'" alt="'.$val['Name'].'">
      </div>
      <div class="item-name">
        <span>'.$val['Name'].'</span>
      </div>
      <div class="item-description">
        <span>'.$val['Description'].'</span>
      </div>
      <div class="item-category">';
      $cat = explode(", ", $val['Category']);
      foreach ($cat as $c) {
        echo '<span>'.$c.'</span>';
      }
      echo '
      </div>
      <div class="item-price">
        <span>'.$val['Price'].'</span>
      </div>';
      echo '
      <form class="add_to_cart" action="assets/add_to_cart.php" method="post">
        <input type="submit" name="submit" value="Add to cart"/>
        <input type="hidden" name="item_to_cart" value="'.$val['Name'].'">
        <input type="hidden" name="price" value="'.$val['Price'].'">
      </form>
      ';
    echo '</div>';
  }
?>
