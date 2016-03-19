<?php
    class AdminsController {
      $admins = Admins::all();
      require_once('views/admins/index.php');

    }

    public function show() {
      if (!isset($_GET['id'])) {
        return call('pages', 'error');
      }

      $admin = Admin::find($_GET['id']);
      require_once('views/admins/show.php');
    }
