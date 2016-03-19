<?php
  class Membership {

    public $u_id;
    public $g_id;

    public function __construct($u_id, $g_id) {
      $this->u_id = $u_id;
      $this->g_id = $g_id;
    }

    public static function create($u_id, $g_id) {
      $db = Db::getInstance();

      $req = $db->query("INSERT INTO memberships (g_id, u_id) VALUES ('$g_id', '$u_id')");
    }

    public static function leave($u_id, $g_id) {
      $db = Db::getInstance();

      $id = intval($id);
      $req = $db->query("DELETE FROM memberships WHERE u_id=$u_id AND g_id=$g_id");
    }
  }
?>
