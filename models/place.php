<?php
  class Place {

    public $id;
    public $o_id;
    public $address;
    public $city;
    public $maintenance;
    public $billingcode;
    public $oname;

    public function __construct($id, $o_id, $address, $city, $maintenance, $billingcode, $oname) {
      $this->id = $id;
      $this->o_id = $o_id;
      $this->city = $city;
      $this->address = $address;
      $this->maintenance = $maintenance;
      $this->billingcode = $billingcode;
      $this->oname = $oname;
    }

    public static function all() {
      if(!verifyLogin($_SESSION)){
        return;
      }
      $list = [];
      $db = Db::getInstance();
      try{
        $req = $db->query("SELECT places.id, places.address, places.city, places.maintenance, places.billingcode, owners.name AS oname, owners.id AS oid FROM places INNER JOIN owners ON places.o_id=owners.id");
        foreach($req->fetchAll() as $place) {
          $list[] = new Place($place['id'], $place['oid'], $place['address'], $place['city'], $place['maintenance'], $place['billingcode'], $place['oname']);
        }
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation!</h1>";
      }
      return $list;
    }

    public static function cities() {
      if(!verifyLogin($_SESSION)){
        return;
      }
      $list = [];
      $db = Db::getInstance();
      try{
        $req = $db->query("SELECT DISTINCT city FROM places");
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation!</h1>";
      }
      foreach($req->fetchAll() as $city) {
        $list[] = $city['city'];
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
        $req = $db->query("SELECT places.id, places.address, places.city, places.maintenance, places.billingcode, owners.name AS oname, owners.id FROM places INNER JOIN owners ON places.o_id=owners.id WHERE places.id=$id");
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation!</h1>";
      }
      //$req->execute(array('id' => $id));
      $place = $req->fetch();

      return new Place($place['id'], $place['o_id'], $place['address'], $place['city'], $place['maintenance'], $place['billingcode'], $place['oname']);
    }

    public static function create($o_id, $address, $city, $maintenance, $billingcode) {
      if(!verifyLogin($_SESSION)){
        return;
      }
      $db = Db::getInstance();
      try{
        $req = $db->query("INSERT INTO places (o_id, address, city, maintenance, billingcode) VALUES ('$o_id', '$address', '$city', '$maintenance', '$billingcode')");
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation!</h1>";
      }
    }

    public static function update($id, $o_id, $address, $city, $maintenance, $billingcode) {
      if(!verifyLogin($_SESSION)){
        return;
      }
      $db = Db::getInstance();
      try{
        $req = $db->query("UPDATE places SET a_id=$o_id, address='$address', city='$city', maintenance='$maintenance', billingcode='$billingcode' WHERE id=$id");
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation!</h1>";
      }
    }

    public static function delete($id) {
      if(!verifyLogin($_SESSION)){
        echo "Please login!";
        return;
      }
      $db = Db::getInstance();

      $id = intval($id);
      try{
        $req = $db->query("DELETE FROM places WHERE id='$id'");
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation!</h1>";
      }
    }
  }
?>
