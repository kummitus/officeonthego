<?php
  function verifyLogin($status) {
      require_once($_SERVER['DOCUMENT_ROOT']."models/logger.php");
      if(isset($status['user'])){
        return true;
      }else{
        Logger::create(1, $_SERVER['REMOTE_ADDR'], "Invoking method requiring logging in");
        return false;
      }
  }

  function hasAdminRights($status) {
      require_once($_SERVER['DOCUMENT_ROOT']."models/logger.php");
      if($status['adminlevel'] == 1){
        return true;
      }else{
        if(!isset($status['user'])){
          $status['user'] = 1;
        }
        Logger::create(intval($status['user']), $_SERVER['REMOTE_ADDR'], "User invoking method requiring admin access");
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
