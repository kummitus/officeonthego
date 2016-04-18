<?php
  if(!session_id()){
     session_start();
  }
  require_once($_SERVER['DOCUMENT_ROOT'].'lib/loginverification.php');

  if(!verifyLogin($_SESSION)){
    echo 'Not authenticated';
    return;
  }
  $name = basename($_GET['path']);
  $path = $_SERVER['DOCUMENT_ROOT']."uploads/".$name;

  $size = getimagesize($path);
  $mime = $size['mime'];
  header('Content-Transfer-Encoding: binary');
  header("Content-type: $mime");
  ob_end_clean();
  readfile($path);
 ?>
