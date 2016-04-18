<?php
    class OwnersController {
      public function index() {
        allowedMethodCall($_SESSION);
        $owners = Owner::all();
        require_once('views/owners/index.php');
      }

    public function show() {
      allowedMethodCall($_SESSION);
      if (!isset($_GET['id'])) {
        return call('pages', 'error');
      }

      $owner = Owner::find($_GET['id']);
      require_once('views/owners/show.php');
    }

    public function delete() {
      allowedMethodCall($_SESSION);
      if (!isset($_GET['id'])) {
        return call('pages', 'error');
      }
      Owner::delete($_GET['id']);
      $owners = Owner::all();
      require_once('views/owners/index.php');
    }

    public function form() {
      allowedMethodCall($_SESSION);
      if(isset($_GET['id'])){
        $owner = Owner::find($_GET['id']);
      }
      require_once('views/owners/form.php');
    }

    public function create() {
      allowedMethodCall($_SESSION);
      if(strlen($_POST['name'])<4) {
        echo "Please fill in the form";
        $this->form();
        return;
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
