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
      $id = intval($_GET['id']);
      $images = Image::getImages($id, 0);
      $task = Task::find($_GET['id']);
      $time = Time::getTaskHours($task->id);
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
      if(strlen($_POST['name'])<3 || strlen($_POST['info'])<3 || !isset($_POST['g_id']) || !isset($_POST['p_id'])) {
        echo "Please fill in the form";
        $this->form();
        return;
      }
      if(!isset($_POST['id'])){
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
        echo "Please fill in the form";
        $this->form();
        return;
      }
      Task::delete($_GET['id']);
      $tasks = Task::all();
      require_once('views/tasks/index.php');
    }

    public function toggleactivity() {
      allowedMethodCall($_SESSION);
      if (!isset($_GET['id'])) {
        echo "Please fill in the form";
        $this->form();
        return;
      }
      $task = Task::find($_GET['id']);
      if($task->active == 1){
        Task::toggleinactive($_GET['id']);
      }else{
        Task::toggleactive($_GET['id']);
      }
      $tasks = Task::all();
      require_once('views/tasks/index.php');
    }

    public function addpic() {
      allowedMethodCall($_SESSION);
      if (!isset($_GET['id'])) {
        echo "Please fill in the form";
        $this->form();
        return;
      }
      $task = intval($_GET['id']);
      require_once('views/tasks/addpic.php');
    }

    public function insertpic(){
      allowedMethodCall($_SESSION);

      $params['o_id'] = intval($_POST['o_id']);
      $params['comment'] = $_POST['comment'];
      $files = $_FILES;
      Image::insertpictask($params, $files);
      header("Location: ?controller=tasks&action=show&id=".$params);
    }

    public function removepic(){
      allowedMethodCall($_SESSION);

      Image::removepic($_GET['picid']);
      header("Location: ?controller=tasks&action=show&id=".$_GET['id']);
    }

  }
?>
