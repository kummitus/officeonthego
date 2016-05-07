<?php
    class BillsController {
      public function index() {
        allowedMethodCall($_SESSION);
        $bills = Bill::all();
        $companies = Bill::companies();
        require_once('views/bills/index.php');
      }

      public function show() {
        allowedMethodCall($_SESSION);
        if (!isset($_GET['id'])) {
          return call('pages', 'error');
        }
        $id = intval($_GET['id']);
        $images = Image::getImages($id, 2);
        $bill = Bill::find($_GET['id']);
        require_once('views/bills/show.php');
      }

      public function form() {
        allowedMethodCall($_SESSION);
        if(isset($_GET['id'])){
          $bill = Bill::find($_GET['id']);
        }
        $companies = Bill::companies();
        $tasks = Task::findActive();
        require_once('views/bills/form.php');
      }

      public function create() {
        allowedMethodCall($_SESSION);
        if(strlen($_POST['company'])<5 || !isset($_POST['info']) || intval($_POST['sum'])<1 || !isset($_POST['date'])) {
          echo "Please fill in the form";
          $this->form();
          return;
        }
        if(isset($_POST['id'])) {
          $params = Bill::create($_POST['u_id'],$_POST['company'], $_POST['sum'], $_POST['info'], $_POST['date'], $_POST['task']);
          $files = $_FILES;
          Image::insertpicbill($params, $files);
          $this->index();
        } else {
          $params = Bill::update($_POST['id'], $_POST['u_id'], $_POST['company'], $_POST['sum'], $_POST['info'], $_POST['date'], $_POST['task']);
          $files = $_FILES;
          $bills = Bill::all();
          $this->index();
        }
      }

      public function delete() {
        allowedMethodCall($_SESSION);
        if (!isset($_GET['id'])) {
          return call('pages', 'error');
        }

        Bill::delete($_GET['id']);
        $image = Image::getImages($_GET['id'], 2);
        if(isset($image)){
          Image::removepic($image[0]->id);
        }

        $bills = Bill::all();
        $this->index();
      }
    }
?>
