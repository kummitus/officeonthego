<?php
  class MembershipsController {
    public function create() {
      allowedMethodCall($_SESSION);
      if(!isset($_POST['u_id']) || !isset($_POST['g_id'])) {
        return call('pages', 'error');
      }
        Membership::create($_POST['u_id'], $_POST['g_id']);
        header("Location: ?controller=groups&action=show&id=".urlencode($_POST['g_id']));
    }


    public function leave() {
      allowedMethodCall($_SESSION);
      if (!isset($_GET['u_id']) || !isset($_GET['g_id'])) {
        return call('pages', 'error');
      }
      Membership::leave($_GET['u_id'], $_GET['g_id']);
      header("Location: ?controller=groups&action=show&id=".urlencode($_GET['g_id']));
    }
  }

?>
