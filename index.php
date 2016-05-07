<?php

  ob_start();
  session_start();
  #include 'c3.php';
  require_once('utils/connection.php');
  require('lib/loginverification.php');
  require_once('views/pages/header.php');

  if(isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action = $_GET['action'];
  } else {
    $controller = 'pages';
    $action = 'home';
  }
  require_once('views/layout.php');
  #phpinfo();

  ob_end_flush();
?>
