<?php
  class Membership {

    public $u_id;
    public $g_id;

    public function __construct($u_id, $g_id) {
      $this->u_id = $u_id;
      $this->g_id = $g_id;
    }

    public static function create($u_id, $g_id) {
      if(!verifyLogin($_SESSION)){
        return;
      }
      $db = Db::getInstance();
      try{
        $req = $db->query("INSERT INTO memberships (g_id, u_id) VALUES ('$g_id', '$u_id')");
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation!</h1>";
      }
    }

    public static function leave($u_id, $g_id) {
      if(!verifyLogin($_SESSION)){
        return;
      }
      $db = Db::getInstance();

      $id = intval($id);
      try{
        $req = $db->prepare("DELETE FROM memberships WHERE u_id=:u_id AND g_id=:g_id");
        $req->execute(array('u_id' => $u_id, 'g_id' => $g_id));
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation!</h1>";
      }
    }

    public static function getGroupByUserId($id){
      if(!verifyLogin($_SESSION)){
        return;
      }
      $db = Db::getInstance();
      $db1 = Db::getInstance();
      $id = intval($id);
      try{
        $req = $db->prepare("SELECT * FROM memberships INNER JOIN groups ON memberships.g_id=groups.id WHERE u_id=:id AND active=1 LIMIT 1");
        $req->execute(array('id' => $id));
        $group = $req->fetch();
        return $group['g_id'];
      }catch (PDOException $e){
        echo "<h1 class='warning'>Invalid operation! Query from memberships</h1>";
        return;
      }
    }
  }
?>
