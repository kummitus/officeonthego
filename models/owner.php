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
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM owners');

      foreach($req->fetchAll() as $owner) {
        $list[] = new Owner($owner['id'], $owner['name'], $owner['phone'], $owner['email']);
      }

      return $list;
  }

  public static function find($id) {
    $db = Db::getInstance();

    $id = intval($id);
    $req = $db->prepare('SELECT * FROM owners WHERE id = :id');

    $req->execute(array('id' => $id));
    $owner = $req->fetch();

    return new Owner($owner['id'], $owner['name'], $owner['phone'], $owner['email']);
  }

  public static function create($name, $phone, $email) {
    $db = Db::getInstance();

    $req = $db->query("INSERT INTO owners (name, phone, email) VALUES ('$name', '$phone', '$email')");
  }

  public static function update($id, $name, $phone, $email) {
    $db = Db::getInstance();
    $id = intval($id);
    $req = $db->query("UPDATE owners SET name='$name', phone='$phone', email='$email' WHERE id='$id'");
  }

  public static function delete($id) {
    $db = Db::getInstance();

    $id = intval($id);
    $req = $db->query("DELETE FROM owners WHERE id='$id'");
  }

}

?>
