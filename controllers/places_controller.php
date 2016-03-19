<?php
  class PlacesController {
    public function index() {
      $places = Place::all();
      $cities = Place::cities();
      $owners = Owner::all();
      require_once('views/places/index.php');
    }

    public function show() {
      if (!isset($_GET['id'])) {
        return call('pages', 'error');
      }

      $place = Place::find($_GET['id']);
      require_once('views/places/show.php');
    }

    public function form() {
      if(isset($_GET['id'])){
        $place = Place::find($_GET['id']);
      }
      $owners = Owner::all();
      require_once('views/places/form.php');
    }

    public function create() {
      if(!isset($_POST['name']) || !isset($_POST['billingcode']) || !isset($_POST['o_id'])) {
        return call('pages', 'error');
      }
      if(0 > $_POST['id']) {
        Place::create($_POST['o_id'], $_POST['name'], $_POST['address'], $_POST['city'], $_POST['maintenance'], $_POST['billingcode']);
        header("Location: ?controller=places&action=index");
      } else {
        Place::update($_POST['id'], $_POST['o_id'], $_POST['name'], $_POST['address'], $_POST['city'], $_POST['maintenance'], $_POST['billingcode']);
        header("Location: ?controller=places&action=show&id=".urlencode($_POST['id']));
      }
    }

    public function delete() {
      if (!isset($_GET['id'])) {
        return call('pages', 'error');
      }
      Place::delete($_GET['id']);
      $places = Place::all();
      require_once('views/places/index.php');
    }
  }

?>
