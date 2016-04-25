<?php
  class PagesController {
    public function home() {
      if(isset($_SESSION['user'])){
        $group = intval(Membership::getGroupByUserId($_SESSION['user']));
        $tasks = Task::findGroupTasksActive($group);
        $members = Group::findMembers($group);
        //require_once('views/tasks/showcurrent.php');
        require_once("views/times/formforhome.php");
      }else{
        require_once('views/pages/home.php');
      }
    }

    public function error() {

      Logger::create(0, $_SERVER['REMOTE_ADDR'], "Invalid request that invoked error function");
      require_once('views/pages/error.php');
    }

    public function about(){
      require_once('views/pages/about.php');
    }
  }

?>
