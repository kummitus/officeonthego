<?php
  class PagesController {
    public function home() {
      if(allowedMethodCall($_SESSION)){
        $group = Membership::getGroupByUserId($_SESSION['user']);
        $task = Task::current($group);
        require_once('views/tasks/showcurrent.php');
        require_once("views/times/formforhome.php");
      }else{
        require_once('views/pages/home.php');
      }
    }

    public function error() {
      require_once('views/pages/error.php');
    }
  }

?>
