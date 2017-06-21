<?php
  session_start();
  if (isset($_POST['submit']) && $_POST['submit'] === 'OK' && strcmp($_POST['passwd'], "") && strcmp($_POST['login'], "")) {
      $username = $_POST['login'];
      $password = $_POST['passwd'];
      $dir = 'private';
      $file = 'passwd';
      $path = $dir.'/'.$file;
      $account = array(array('login' => $username, 'passwd' => hash('whirlpool', $password)));
      if (file_exists($path)) {
        $cont = unserialize(file_get_contents($path));
        $i = 0;
        while ($i < count($cont)) {
          if (strcmp($cont[$i]['login'], $account[0]['login']) === 0) {
            echo "ERROR\n";
            return;
          }
          $i++;
        }
        $account = array_merge($cont, $account);
      }
      if (!file_exists($dir)) {
        mkdir($dir);
      }
      file_put_contents($path, serialize($account));
      echo "OK\n";
  }
  else {
    echo "ERROR\n";
  }
  header("Location: ../index.php");
?>
