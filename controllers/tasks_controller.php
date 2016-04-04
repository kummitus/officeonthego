<?php
  class TasksController {
    public function index() {
      allowedMethodCall($_SESSION);
      $tasks = Task::all();
      require_once('views/tasks/index.php');

    }

    public function show() {
      allowedMethodCall($_SESSION);
      if (!isset($_GET['id'])) {
        return call('pages', 'error');
      }

      $task = Task::find($_GET['id']);
      require_once('views/tasks/show.php');
    }

    public function form() {
      allowedMethodCall($_SESSION);
      $places = Place::all();
      $groups = Group::allactive();
      if(isset($_GET['id'])){
        $task = Task::find($_GET['id']);
      }
      require_once('views/tasks/form.php');
    }

    public function create() {
      allowedMethodCall($_SESSION);
      require 'utils/kint/Kint.class.php';
      Kint::trace();
              Kint::dump( $_SERVER );
              Kint::dump( $_POST );
      if(!isset($_POST['name']) || !isset($_POST['info']) || !isset($_POST['g_id']) || !isset($_POST['p_id'])) {
        return call('pages', 'error');
      }
      if(is_numeric($_POST['id'])){
        Task::create($_POST['g_id'], $_POST['p_id'], $_POST['name'], $_POST['info']);
        header("Location: ?controller=tasks&action=index");
      }else{
        Task::update($_POST['id'], $_POST['g_id'], $_POST['p_id'], $_POST['name'], $_POST['info'], $_POST['active']);
        header("Location: ?controller=tasks&action=show&id=".urlencode($_POST['id']));
      }
    }
    public function delete() {
      allowedMethodCall($_SESSION);
      if (!isset($_GET['id'])) {
        return call('pages', 'error');
      }
      Task::delete($_GET['id']);
      $tasks = Task::all();
      require_once('views/tasks/index.php');
    }

    public function toggleactivity() {
      allowedMethodCall($_SESSION);
      if (!isset($_GET['id'])) {
        return call('pages', 'error');
      }
      $task = Task::find($_GET['id']);
      if($task->active == 1){
        Task::toggleactive($task->id);
      }else{
        Task::toggleinactive($task->id);
      }
      $groups = Task::all();
      require_once('views/tasks/index.php');
    }

  }
?>
