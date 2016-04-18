<?php
  class TimesController {
    public function index() {
      allowedMethodCall($_SESSION);
      $times = Time::all();
      require_once('views/times/index.php');

    }

    public function show() {
      allowedMethodCall($_SESSION);
      if (!isset($_GET['id'])) {
        return call('pages', 'error');
      }

      $time = Time::find($_GET['id']);
      require_once('views/times/show.php');
    }

    public function form() {
      allowedMethodCall($_SESSION);
      $tasks = Task::all();
      $users = User::all();
      if(isset($_GET['id'])){
        $time = Time::find($_GET['id']);
      }

      require_once('views/times/form.php');
    }

    public function create() {
      allowedMethodCall($_SESSION);
      if(!isset($_POST['date']) || !isset($_POST['start_time']) || !isset($_POST['end_time']) || !isset($_POST['t_id'])) {
        return call('pages', 'error');
      }
      if(isset($_POST['members'])){
        foreach($_POST['members'] as $u_id){
          $u_id = intval($u_id);
          if(null == $_POST['id']) {
            Time::create($u_id, $_POST['date'], $_POST['start_time'], $_POST['end_time'], $_POST['t_id']);
          } else {
            Time::update($_POST['id'], $u_id, $_POST['date'], $_POST['start_time'], $_POST['end_time'], $_POST['t_id']);
          }
        }
        header("Location: ?controller=times&action=index");
      }else{
        if(null == $_POST['id']) {
          Time::create($_POST['u_id'], $_POST['date'], $_POST['start_time'], $_POST['end_time'], $_POST['t_id']);
          header("Location: ?controller=pages&action=home");
        } else {
          Time::update($_POST['id'], $_POST['u_id'], $_POST['date'], $_POST['start_time'], $_POST['end_time'], $_POST['t_id']);
          header("Location: ?controller=times&action=show&id=".urlencode($_POST['id']));
        }
      }
      header("Location: ?controller=pages&action=home");
    }

    public function delete() {
      allowedMethodCall($_SESSION);
      if (!isset($_GET['id'])) {
        return call('pages', 'error');
      }
      Time::delete($_GET['id']);
      $times = Time::all();
      require_once('views/times/index.php');
    }

  }
?>
