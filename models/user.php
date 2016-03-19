<?php
  class User {

    public $id;
    public $name;
    public $password;

    public function __construct($id, $name, $password) {
      $this->id = $id;
      $this->name = $name;
      $this->password = $password;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query("SELECT * FROM users");


      foreach($req->fetchAll() as $user) {
        $list[] = new User($user['id'], $user['name'], $user['password']);
      }

      return $list;
    }

    public static function find($id) {
      $db = Db::getInstance();

      $id = intval($id);
      $req = $db->prepare("SELECT * FROM users WHERE id = :id");

      $req->execute(array('id' => $id));
      $user = $req->fetch();

      return new User($user['id'], $user['name'], $user['password']);
    }

    public static function create($name, $password) {
      $db = Db::getInstance();

      $req = $db->query("INSERT INTO users (name, password) VALUES ('$name', '$password')");
    }

    public static function update($id, $name, $password) {
      $db = Db::getInstance();
      $id = intval($id);
      $req = $db->query("UPDATE users SET name='$name', password='$password' WHERE id='$id'");
    }

    public static function delete($id) {
      $db = Db::getInstance();

      $id = intval($id);
      $req = $db->query("DELETE FROM users WHERE id='$id'");
    }

    public static function authenticate($name, $password) {
      $db = Db::getInstance();

      $req = $db->prepare("SELECT * FROM users WHERE name=:name AND password=:password LIMIT 1");
      $req->execute(array('name' => $name, 'password' => $password));
      $user = $req->fetch();

      if($user){
        return new User($user['id'], $user['name'], $user['password']);
      }
      return null;
    }
  }
?>
