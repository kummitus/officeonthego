<?php
    class OwnersController {
      public function index() {
        $owners = Owner::all();
        require_once('views/owners/index.php');
      }

    public function show() {
      if (!isset($_GET['id'])) {
        return call('pages', 'error');
      }

      $owner = Owner::find($_GET['id']);
      require_once('views/owners/show.php');
    }

    public function delete() {
      if (!isset($_GET['id'])) {
        return call('pages', 'error');
      }
      Owner::delete($_GET['id']);
      $owners = Owner::all();
      require_once('views/owners/index.php');
    }

    public function form() {
      if(isset($_GET['id'])){
        $owner = Owner::find($_GET['id']);
      }
      require_once('views/owners/form.php');
    }

    public function create() {
      if(!isset($_POST['name'])) {
        return call('pages', 'error');
      }
      if(null == $_POST['id']) {
        Owner::create($_POST['name'], $_POST['phone'], $_POST['email']);
        header("Location: ?controller=owners&action=index");
      } else {
        Owner::update($_POST['id'], $_POST['name'], $_POST['phone'], $_POST['email']);
        header("Location: ?controller=owners&action=index");
      }
    }
  }
?>
