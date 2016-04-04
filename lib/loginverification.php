<?php
  function verifyLogin($status) {
      if(isset($status['user'])){
        return true;
      }else{
        return false;
      }
  }

  function hasAdminRights($status) {
      if($status['adminlevel'] == 1){
        return true;
      }else{
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
