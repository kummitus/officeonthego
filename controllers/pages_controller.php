<?php
  class PagesController {
    public function home() {
      $dun = 'jea';
      require_once('views/pages/home.php');
    }

    public function error() {
      require_once('views/pages/error.php');
    }
  }

?>
