<?php
session_start();
  $arr = array();
  $arr[] = array(
    'login' => 'admin',
    'passwd' => hash('whirlpool', 'admin'),
    'root' => 'mod'
  );

  file_put_contents('user/private/passwd', serialize($arr));
  header("Location: index.php");
?>