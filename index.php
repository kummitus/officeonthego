<?php
  session_start();
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
?>
