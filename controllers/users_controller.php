<?php
  class UsersController {
    public function index() {
      $users = User::all();
      require_once('views/users/index.php');
    }

    public function show() {
      if (!isset($_GET['id'])) {
        return call('pages', 'error');
      }
      $user = User::find($_GET['id']);
      require_once('views/users/show.php');
    }

    public function delete() {
      if (!isset($_GET['id'])) {
        return call('pages', 'error');
      }
      User::delete($_GET['id']);
      $users = User::all();
      require_once('views/users/index.php');
    }

    public function form() {
      if(isset($_GET['id'])){
        $user = User::find($_GET['id']);
      }
      require_once('views/users/form.php');
    }

    public function create() {
      if(!isset($_POST['name']) || !isset($_POST['password'])) {
        return call('pages', 'error');
      }
      if(null == $_POST['id']) {
        User::create($_POST['name'], $_POST['password']);
        header("Location: ?controller=users&action=index");
      } else {
        User::update($_POST['id'], $_POST['name'], $_POST['password']);
        header("Location: ?controller=users&action=index");
      }
    }

    public function login() {
      require_once('views/users/login.php');
    }

    public function handle_login() {

      $user = User::authenticate($_POST['name'], $_POST['password']);
      if(!$user){
        header("Location: ?controller=users&action=login");
      } else {
        $_SESSION['user'] = $user->id;
        $_SESSION['username'] = $user->name;
        header("Location: ?controller=users&action=index");
      }
    }

    public function logout() {
      $_SESSION['user'] = null;
      $_SESSION['username'] = null;
      session_unset();
      session_destroy();
      header("Location: ?controller=users&action=index");
    }
  }
?>
