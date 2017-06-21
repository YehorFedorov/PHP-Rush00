<?php
session_start();
$_SESSION = $_POST;
header("Location: admin.php")
?>