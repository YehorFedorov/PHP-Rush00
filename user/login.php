<?php
  session_start();

  if ($_GET['login'] != '' && $_GET['passwd'] != '' && $_GET['submit'] === OK) {

    if (file_exists('private/passwd'))
    {
      $user_info = unserialize(file_get_contents('private/passwd'));
      foreach ($user_info as $value) {
        if ($value['login'] == $_GET['login'] && $value['passwd'] == hash('whirlpool', $_GET['passwd'])) {
          $_SESSION['login'] = $_GET['login'];
          $_SESSION['passwd'] = $_GET['passwd'];
          $_SESSION['logged_on_user'] = $_SESSION['login'];
          echo "OK\n";
          header("Location: ../index.php");
          exit;
        }
      }
    }

    echo "ERROR\n";
    header("Location: ../index.php");
  } else {
    header("Location: ../index.php");
  }
?>
