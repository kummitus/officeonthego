<?php
  class UsersController {

    public function index() {
      if(!verifyLogin($_SESSION)){
        echo "<h1 class'warning'>Not logged in</h1>";
        return;
      }
      $users = User::all();
      require_once('views/users/index.php');
    }

    public function show() {
      if(!verifyLogin($_SESSION)){
        echo "<h1 class'warning'>Not logged in</h1>";
        return;
      }
      if (!isset($_GET['id'])) {
        return call('pages', 'error');
      }
      $user = User::find($_GET['id']);
      require_once('views/users/show.php');
    }

    public function delete() {
      if(!verifyLogin($_SESSION)){
        echo "<h1 class'warning'>Not logged in</h1>";
        return;
      }
      if (!isset($_GET['id'])) {
        return call('pages', 'error');
      }
      User::delete($_GET['id']);
      $users = User::all();
      require_once('views/users/index.php');
    }

    public function form() {
      if(!verifyLogin($_SESSION)){
        echo "<h1 class'warning'>Not logged in</h1>";
        return;
      }
      if(isset($_GET['id'])){
        $user = User::find($_GET['id']);
      }
      require_once('views/users/form.php');
    }

    public function create() {
      if(!verifyLogin($_SESSION)){
        echo "<h1 class'warning'>Not logged in</h1>";
        return;
      }
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
        header("Location: /");
      } else {
        $_SESSION['user'] = $user->id;
        $_SESSION['username'] = $user->name;
        $_SESSION['adminlevel'] = $user->adminlevel;
        header("Location: ?controller=pages&action=home");
      }
    }

    public function logout() {
      $_SESSION['user'] = null;
      $_SESSION['username'] = null;
      session_unset();
      session_destroy();
      header("Location: ?controller=pages&action=home");
    }

    public function toggleadmin() {
      if(!verifyLogin($_SESSION)){
        echo "<h1 class'warning'>Not logged in</h1>";
        return;
      }
      if(!hasAdminRights($_SESSION)){
        if($_SESSION['user'] != $user->id){
          $user = User::find($_GET['id']);
          if($user->adminlevel == 0){
            User::update($user->id, $user->name, $user->password, 1);
          }else{
            User::update($user->id, $user->name, $user->password, 0);
          }
        }
      }
      header("Location: ?controller=users&action=index");
    }
  }
?>
