<?php
    class BillsController {
      public function index() {
        allowedMethodCall($_SESSION);
        $bills = Bill::all();
        require_once('views/bills/index.php');
      }

      public function show() {
        allowedMethodCall($_SESSION);
        if (!isset($_GET['id'])) {
          return call('pages', 'error');
        }
        $id = intval($_GET['id']);
        $images = Image::getImages($id, 1);
        $bill = Bill::find($_GET['id']);
        require_once('views/bills/show.php');
      }

      public function form() {
        allowedMethodCall($_SESSION);
        if(isset($_GET['id'])){
          $bill = Bill::find($_GET['id']);
        }
        require_once('views/bills/form.php');
      }

      public function create() {
        allowedMethodCall($_SESSION);
        if(!isset($_POST['company']) || !isset($_POST['info']) || !isset($_POST['sum']) || !isset($_POST['date'])) {
          return call('pages', 'error');
        }
        if(null == $_POST['id']) {
          $params = Bill::create($_POST['u_id'],$_POST['company'], $_POST['sum'], $_POST['info'], $_POST['date']);
          $files = $_FILES;
          Image::insertpicbill($params, $files);
          header("Location: ?controller=bills&action=index");
        } else {
          $params = Bill::update($_POST['id'], $_POST['u_id'], $_POST['company'], $_POST['sum'], $_POST['info'], $_POST['date']);
          $files = $_FILES;
          Image::insertpicbill($params, $files);
          $bills = Bill::all();
          header("Location: ?controller=bills&action=show&id=".urlencode($_POST['id']));
        }
      }

      public function delete() {
        allowedMethodCall($_SESSION);
        if (!isset($_GET['id'])) {
          return call('pages', 'error');
        }
        Bill::delete($_GET['id']);
        $bills = Bill::all();
        require_once('views/bills/index.php');
      }
    }
?>
