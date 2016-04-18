<?php
  function verifyLogin($status) {
      require_once($_SERVER['DOCUMENT_ROOT']."models/logger.php");
      if(isset($status['user'])){
        return true;
      }else{
        Logger::create(0, $_SERVER['REMOTE_ADDR'], 2);
        return false;
      }
  }

  function hasAdminRights($status) {
      require_once($_SERVER['DOCUMENT_ROOT']."models/logger.php");
      if($status['adminlevel'] == 1){
        return true;
      }else{
        Logger::create(0, $_SERVER['REMOTE_ADDR'], 1);
        return false;
      }
  }

  function allowedMethodCall($status){
    if(!verifyLogin($status)){
      echo "Please log in!";
      header("Location: ?controller=pages&action=error");
    }else{
      return true;
    }
  }
?>
