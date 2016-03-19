<?php
  class TasksController {
    public function index() {
      $tasks = Task::all();
      require_once('views/tasks/index.php');

    }

    public function show() {
      if (!isset($_GET['id'])) {
        return call('pages', 'error');
      }

      $task = Task::find($_GET['id']);
      require_once('views/tasks/show.php');
    }

    public function form() {
      $places = Place::all();
      $groups = Group::allactive();
      if(isset($_GET['id'])){
        $task = Task::find($_GET['id']);
      }
      require_once('views/tasks/form.php');
    }

    public function create() {
      if(!isset($_POST['name']) || !isset($_POST['info']) || !isset($_POST['g_id']) || !isset($_POST['p_id'])) {
        return call('pages', 'error');
      }
      if(null == $_POST['id']) {
        Task::create($_POST['g_id'], $_POST['p_id'], $_POST['name'], $_POST['info']);
        header("Location: ?controller=tasks&action=index");
      } else {
        Task::update($_POST['id'], $_POST['g_id'], $_POST['p_id'], $_POST['name'], $_POST['info'], $_POST['active']);
        header("Location: ?controller=tasks&action=show&id=".urlencode($_POST['id']));
      }
    }

    public function delete() {
      if (!isset($_GET['id'])) {
        return call('pages', 'error');
      }
      Task::delete($_GET['id']);
      $tasks = Task::all();
      require_once('views/tasks/index.php');
    }

    public function toggleactivity() {
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
