<?php
    class BillsController {
      public function index() {
        $bills = Bill::all();
        require_once('views/bills/index.php');
      }

      public function show() {
        if (!isset($_GET['id'])) {
          return call('pages', 'error');
        }
        $bill = Bill::find($_GET['id']);
        require_once('views/bills/show.php');
      }

      public function form() {
        $users = User::all();
        if(isset($_GET['id'])){
          $bill = Bill::find($_GET['id']);
        }
        require_once('views/bills/form.php');
      }

      public function create() {
        if(!isset($_POST['company']) || !isset($_POST['info']) || !isset($_POST['sum']) || !isset($_POST['path'])) {
          return call('pages', 'error');
        }
        if(null == $_POST['id']) {
          Bill::create($_POST['u_id'], $_POST['company'], $_POST['sum'], $_POST['info'], $_POST['path'], $_POST['date']);
          header("Location: ?controller=bills&action=index");
        } else {
          Bill::update($_POST['id'], $_POST['u_id'], $_POST['company'], $_POST['sum'], $_POST['info'], $_POST['path'], $_POST['date']);
          header("Location: ?controller=bills&action=show&id=".urlencode($_POST['id']));
        }
      }

      public function delete() {
        if (!isset($_GET['id'])) {
          return call('pages', 'error');
        }
        Bill::delete($_GET['id']);
        $bills = Bill::all();
        require_once('views/bills/index.php');
      }
    }
?>
