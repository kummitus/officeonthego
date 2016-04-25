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
      $id = intval($_GET['id']);
      $images = Image::getImages($id, 1);
      $place = Place::find($id);
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

    public function addpic() {
      allowedMethodCall($_SESSION);
      if (!isset($_GET['id'])) {
        echo "Please fill in the form";
        $this->form();
        return;
      }
      $place = intval($_GET['id']);
      require_once('views/places/addpic.php');
    }

    public function insertpic(){
      allowedMethodCall($_SESSION);

      $params['o_id'] = intval($_POST['o_id']);
      $params['comment'] = $_POST['comment'];
      $files = $_FILES;
      Image::insertpicplace($params, $files);
      header("Location: ?controller=tasks&action=show&id=".$params);
    }

    public function removepic(){
      allowedMethodCall($_SESSION);

      Image::removepic($_GET['picid']);
      header("Location: ?controller=places&action=show&id=".$_GET['id']);
    }
  }

?>
