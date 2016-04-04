<?php
  class User {

    public $id;
    public $name;
    public $password;
    public $adminlevel;

    public function __construct($id, $name, $password, $adminlevel) {
      $this->id = $id;
      $this->name = $name;
      $this->password = $password;
      $this->adminlevel = $adminlevel;
    }
    // Query all Users
    public static function all() {
      // Test that user is authenticated
      if(!verifyLogin($_SESSION)){
        echo "<h1 class'warning'>Not logged in</h1>";
        return;
      }
      // Create variables
      $list = [];
      $db = Db::getInstance();
      // Query data
      try{
        $req = $db->query("SELECT * FROM users");
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation!</h1>";
      }
      // Create objects from database entries
      foreach($req->fetchAll() as $user) {
        $list[] = new User($user['id'], $user['name'], $user['password'], $user['adminlevel']);
      }

      // List is either empty or filled with User objects
      return $list;
    }
    // Query user by id
    public static function find($id) {
      if(!verifyLogin($_SESSION)){
        echo "<h1 class'warning'>Not logged in</h1>";
        return;
      }
      $db = Db::getInstance();

      $id = intval($id);
      $req = $db->prepare("SELECT * FROM users WHERE id = :id");

      $req->execute(array('id' => $id));
      try{
        $user = $req->fetch();
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation!</h1>";
      }
      return new User($user['id'], $user['name'], $user['password'], $user['adminlevel']);
    }

    // Create a user with name and password
    public static function create($name, $password) {
      if(!verifyLogin($_SESSION)){
        echo "<h1 class'warning'>Not logged in</h1>";
        return;
      }
      // Hash password with PHP defaults
      $password = password_hash($password, PASSWORD_DEFAULT);
      $db = Db::getInstance();
      try {
        // Admin level is set to 0 by default
        $req = $db->query("INSERT INTO users (name, password, adminlevel) VALUES ('$name', '$password', 0)");
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation!</h1>";
      }
    }

    // Update user status
    public static function update($id, $name, $password, $adminlevel) {
      if(!verifyLogin($_SESSION)){
        echo "<h1 class'warning'>Not logged in</h1>";
        return;
      }else if(!hasAdminRights($_SESSION)){
        echo "<h1 class='warning'>Unallowed operation</h1>";
        return;
      }
      // Hash password with PHP defaults
      $password = password_hash($password, PASSWORD_DEFAULT);

      $db = Db::getInstance();
      $id = intval($id);
      try {
        // Updates all fields
        $req = $db->query("UPDATE users SET name='$name', password='$password', adminlevel='$adminlevel' WHERE id='$id'");
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation!</h1>";
      }
    }

    // Delete user
    public static function delete($id) {
      // Test for authenticated and admin rights
      if(!verifyLogin($_SESSION)){
        echo "<h1 class'warning'>Not logged in</h1>";
        return;
      }else if(!hasAdminRights($_SESSION)){
        echo "<h1 class='warning'>Unallowed operation</h1>";
        return;
      }
      $db = Db::getInstance();

      $id = intval($id);
      try {
        $req = $db->query("DELETE FROM users WHERE id='$id'");
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation!</h1>";
      }
    }

    public static function authenticate($name, $password) {
      $db = Db::getInstance();

      $req = $db->prepare("SELECT * FROM users WHERE name=:name LIMIT 1");
      $req->execute(array('name' => $name));
      try{
        $user = $req->fetch();
        if(password_verify($password, $user['password'])){
          if($user){
            return new User($user['id'], $user['name'], $user['password'], $user['adminlevel']);
          }
        }
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation!</h1>";
      }
      return null;
    }
  }
?>
