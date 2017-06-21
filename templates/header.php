<html>
<head>
  <link rel="stylesheet" type="text/CSS" href="css/main.css">

  <link href="https://fonts.googleapis.com/css?family=Ultra" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

  <?php

    session_start();

    // $_SESSION = array(
    //   'login' => '',
    //   'passwd' => '',
    //   'logged_on_user' => '',
    // );
if ($_SESSION['logged_on_user'] != NULL)
    {
      $str = unserialize(file_get_contents("user/private/passwd"));
      foreach ($str as $elem) {
        if (($_SESSION['logged_on_user'] == $elem['login']) && $elem['root'] == "mod")
          echo '<div class="admin panel"><a href="admin.php">Enter to the admin panel</a></div>';
      }
    }

    // echo file_get_contents('templates/header.php');

  ?>
  <header>
    <div class="logo">
      <a href="index.php">
        <img src="https://img.clipartfox.com/6abb375a8072d724b207ce3c273f4a4a_logo-clip-art-31-apple-logo-clipart_256-256.png" alt="logo">
      </a>
    </div>
    <div class="right-block">
      <div class="basket">
        <?php require_once('assets/cart.php'); cart(); ?>
      </div>
      <div class="dropdown">
        <?php
          session_start();

          if (!$_SESSION['logged_on_user']) {

        ?>
        <div class="dropdown-toggle">
          <span style="margin-bottom:0.875em;">Login</span>
        </div>
        <form class="login" action="user/login.php" method="get">
          <input type="text" name="login" placeholder="Enter login"/><br />
          <input type="password" name="passwd" placeholder="Enter password"/><br />
          <input type="submit" name="submit" value="OK"><br />
        </form>
        <a style="font-size:0.875em;" href="user/create.html">Create account</a>
        <?php
          } else {
        ?>
        <div class="logged_on_user"><?php echo 'Hello, <span>'.$_SESSION['logged_on_user'] ?></div>
        <form class="" action="user/logout.php" method="post">
          <input type="submit" name="submit" value="Logout"/>
        </form>
        <?php
          }
        ?>
      </div>
    </div>
    <nav>
      <form class="navbar" action="category.php" method="post">
        <input type="submit" name="submit" value="Home" />
        <input type="submit" name="submit" value="Apples" />
        <input type="submit" name="submit" value="Banannas" />
        <input type="submit" name="submit" value="Citrus" />
      </form>
    </nav>
  </header>
