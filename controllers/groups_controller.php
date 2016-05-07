<?php
    class GroupsController {
      public function index() {
        allowedMethodCall($_SESSION);
        $groups = Group::all();
        require_once('views/groups/index.php');
      }

      public function show() {
        allowedMethodCall($_SESSION);
        if (!isset($_GET['id'])) {
          return call('pages', 'error');
        }
        $tasks = Task::findGroupTasks($_GET['id']);
        $members = Group::findMembers($_GET['id']);
        $group = Group::find($_GET['id']);
        require_once('views/groups/show.php');
      }

      public function form() {
        allowedMethodCall($_SESSION);
        $users = User::all();
        if(isset($_GET['id'])){
          $group = Group::find($_GET['id']);
        }
        require_once('views/groups/form.php');
      }

      public function create() {
        allowedMethodCall($_SESSION);
        if(strlen($_POST['name'])<4 || !isset($_POST['a_id'])) {
          echo "Please fill in the form";
          $this->form();
          return;
        }
        if(0 > $_POST['id'] || !isset($_POST['id'])) {
          Group::create($_POST['a_id'], $_POST['name'], $_POST['info']);
          header("Location: ?controller=groups&action=index");
        } else {
          Group::update($_POST['id'], $_POST['a_id'], $_POST['name'], $_POST['info'], $_POST['active']);
          header("Location: ?controller=groups&action=show&id=".urlencode($_POST['id']));
        }
      }

      public function delete() {
        allowedMethodCall($_SESSION);
        if (!isset($_GET['id'])) {
          return call('pages', 'error');
        }
        Group::delete($_GET['id']);
        $groups = Group::all();
        require_once('views/groups/index.php');
      }

      public function toggleactivity() {
        allowedMethodCall($_SESSION);
        if (!isset($_GET['id'])) {
          echo "Please fill in the form";
          $this->form();
          return;
        }
        $group = Group::find($_GET['id']);
        if($group->active == 1){
          Group::toggleinactive($_GET['id']);
        }else{
          Group::toggleactive($_GET['id']);
        }
        $groups = Group::all();
        require_once('views/groups/index.php');
      }

      public function join() {
        allowedMethodCall($_SESSION);
        $users = User::all();
        $group = Group::find($_GET['g_id']);
        require_once('views/groups/join.php');
      }
    }
?>
