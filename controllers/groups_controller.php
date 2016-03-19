<?php
    class GroupsController {
      public function index() {
        $groups = Group::all();
        require_once('views/groups/index.php');
      }

      public function show() {
        if (!isset($_GET['id'])) {
          return call('pages', 'error');
        }
        $members = Group::findMembers($_GET['id']);
        $group = Group::find($_GET['id']);
        require_once('views/groups/show.php');
      }

      public function form() {
        $users = User::all();
        if(isset($_GET['id'])){
          $group = Group::find($_GET['id']);
        }
        require_once('views/groups/form.php');
      }

      public function create() {
        if(!isset($_POST['name']) || !isset($_POST['info']) || !isset($_POST['a_id'])) {
          return call('pages', 'error');
        }
        if(0 > $_POST['id']) {
          Group::create($_POST['a_id'], $_POST['name'], $_POST['info']);
          header("Location: ?controller=groups&action=index");
        } else {
          Group::update($_POST['id'], $_POST['a_id'], $_POST['name'], $_POST['info'], $_POST['active']);
          header("Location: ?controller=groups&action=show&id=".urlencode($_POST['id']));
        }
      }

      public function delete() {
        if (!isset($_GET['id'])) {
          return call('pages', 'error');
        }
        Group::delete($_GET['id']);
        $groups = Group::all();
        require_once('views/groups/index.php');
      }

      public function join() {
        $users = User::all();
        $group = Group::find($_GET['g_id']);
        require_once('views/groups/join.php');
      }
    }
?>
