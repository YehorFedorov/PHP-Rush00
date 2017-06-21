<?php
  session_start();
  if (isset($_SESSION['logged_on_user'])) {
    $_SESSION['logged_on_user'] = '';
  }
  header("Location: ../index.php");
?>
