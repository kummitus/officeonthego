<?php
  class PlacesController {
    public function index() {
      allowedMethodCall($_SESSION);
      $places = Place::all();
      $cities = Place::cities();
      require_once('views/places/index.php');
    }

    public function show() {
      allowedMethodCall($_SESSION);
      if (!isset($_GET['id'])) {
        return call('pages', 'error');
      }
      $place = Place::find($_GET['id']);
      require_once('views/places/show.php');
    }

    public function form() {
      allowedMethodCall($_SESSION);
      if(isset($_GET['id'])){
        $place = Place::find($_GET['id']);
      }
      $owners = Owner::all();
      require_once('views/places/form.php');
    }

    public function create() {
      allowedMethodCall($_SESSION);
      if(strlen($_POST['address'])<5 || strlen($_POST['billingcode'])<4) {
        echo "Please fill in the form";
        $this->form();
        return;
      }
      if(0 > $_POST['id']) {
        Place::create($_POST['o_id'], $_POST['address'], $_POST['city'], $_POST['maintenance'], $_POST['billingcode']);
        header("Location: ?controller=places&action=index");
      } else {
        Place::update($_POST['id'], $_POST['o_id'], $_POST['address'], $_POST['city'], $_POST['maintenance'], $_POST['billingcode']);
        header("Location: ?controller=places&action=show&id=".urlencode($_POST['id']));
      }
    }

    public function delete() {
      allowedMethodCall($_SESSION);
      if (!isset($_GET['id'])) {
        return call('pages', 'error');
      }
      Place::delete($_GET['id']);
      $places = Place::all();
      $cities = Place::cities();
      require_once('views/places/index.php');
    }
  }

?>
