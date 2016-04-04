<?php
  class Owner {

    public $id;
    public $name;
    public $phone;
    public $email;

    public function __construct($id, $name, $phone, $email) {
      $this->id = $id;
      $this->name = $name;
      $this->phone = $phone;
      $this->email = $email;
    }

    public static function all() {
      if(!verifyLogin($_SESSION)){
        return;
      }
      $list = [];
      $db = Db::getInstance();
      try{
        $req = $db->query('SELECT * FROM owners');
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation!</h1>";
      }
      foreach($req->fetchAll() as $owner) {
        $list[] = new Owner($owner['id'], $owner['name'], $owner['phone'], $owner['email']);
      }

      return $list;
  }

  public static function find($id) {
    if(!verifyLogin($_SESSION)){
      return;
    }
    $db = Db::getInstance();

    $id = intval($id);
    try{
      $req = $db->prepare('SELECT * FROM owners WHERE id = :id');
      $req->execute(array('id' => $id));
      $owner = $req->fetch();
    }catch (PDOException $e) {
      echo "<h1 class='warning'>Invalid operation!</h1>";
    }
    return new Owner($owner['id'], $owner['name'], $owner['phone'], $owner['email']);
  }

  public static function create($name, $phone, $email) {
    if(!verifyLogin($_SESSION)){
      return;
    }
    $db = Db::getInstance();
    try{
      $req = $db->query("INSERT INTO owners (name, phone, email) VALUES ('$name', '$phone', '$email')");
    }catch (PDOException $e) {
      echo "<h1 class='warning'>Invalid operation!</h1>";
    }
  }

  public static function update($id, $name, $phone, $email) {
    if(!verifyLogin($_SESSION)){
          return;
        }
    $db = Db::getInstance();
    $id = intval($id);
    try{
      $req = $db->query("UPDATE owners SET name='$name', phone='$phone', email='$email' WHERE id='$id'");
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
      $req = $db->query("DELETE FROM owners WHERE id='$id'");
    }catch (PDOException $e) {
      echo "<h1 class='warning'>Invalid operation!</h1>";
    }
  }

}

?>
