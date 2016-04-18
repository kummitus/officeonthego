<?php
  class Group {

    public $id;
    public $a_id;
    public $name;
    public $info;
    public $active;

      public function __construct($id, $a_id, $name, $info, $active) {
        $this->id = $id;
        $this->a_id = $a_id;
        $this->name = $name;
        $this->info = $info;
        $this->active = $active;
      }

      public static function all() {
        if(!verifyLogin($_SESSION)){
          return;
        }
        $list = [];
        $db = Db::getInstance();
        $req = $db->query("SELECT * FROM groups");

        foreach($req->fetchAll() as $group) {
          $list[] = new Group($group['id'], $group['a_id'], $group['name'], $group['info'], $group['active']);
        }

        return $list;
      }

      public static function allactive() {
        if(!verifyLogin($_SESSION)){
          return;
        }
        $list = [];
        $db = Db::getInstance();
        $req = $db->query("SELECT * FROM groups WHERE active=1");

        foreach($req->fetchAll() as $group) {
          $list[] = new Group($group['id'], $group['a_id'], $group['name'], $group['info'], $group['active']);
        }

        return $list;
      }

      public static function find($id) {
        if(!verifyLogin($_SESSION)){
          return;
        }
        $db = Db::getInstance();

        $id = intval($id);
        $req = $db->prepare("SELECT * FROM groups WHERE id = :id");

        $req->execute(array('id' => $id));
        $group = $req->fetch();

        return new Group($group['id'], $group['a_id'], $group['name'], $group['info'], $group['active']);
      }

      public static function findMembers($id) {
        if(!verifyLogin($_SESSION)){
          return;
        }
        $list = [];
        $db = Db::getInstance();
        try{
          $req = $db->query("SELECT memberships.id, memberships.u_id, users.id, users.name, memberships.g_id FROM memberships INNER JOIN users on memberships.u_id=users.id WHERE memberships.g_id='$id'");
        }catch (PDOException $e) {
          echo "<h1 class='warning'>Invalid operation in findMembers!</h1>";
        }
        foreach($req->fetchAll() as $member) {
          $list[] = new User($member['id'], $member['name'], 0, 0);
        }

        return $list;
      }

      public static function create($a_id, $name, $info) {
        if(!verifyLogin($_SESSION)){
          return;
        }
        $db = Db::getInstance();
        try{
          $req = $db->query("INSERT INTO groups (a_id, name, info, active) VALUES ('$a_id', '$name', '$info', true)");
        }catch (PDOException $e) {
          echo "<h1 class='warning'>Invalid operation!</h1>";
        }
      }

      public static function update($id, $a_id, $name, $info, $active) {
        if(!verifyLogin($_SESSION)){
          return;
        }
        $db = Db::getInstance();
        try{
          $req = $db->query("UPDATE groups SET a_id=$a_id, name='$name', info='$info', active=$active WHERE id=$id");
        }catch (PDOException $e) {
          echo "<h1 class='warning'>Invalid operation!</h1>";
        }
      }

      public static function delete($id) {
        if(!verifyLogin($_SESSION)){
          return;
        }
        $db = Db::getInstance();

        $id = intval($id);
        try{
          $req = $db->query("DELETE FROM groups WHERE id='$id'");
        }catch (PDOException $e) {
          echo "<h1 class='warning'>Invalid operation!</h1>";
        }
      }
  }
?>
