<?php
  class Place {

    public $id;
    public $o_id;
    public $name;
    public $address;
    public $city;
    public $maintenance;
    public $billingcode;
    public $oname;

    public function __construct($id, $o_id, $name, $address, $city, $maintenance, $billingcode, $oname) {
      $this->id = $id;
      $this->o_id = $o_id;
      $this->name = $name;
      $this->city = $city;
      $this->address = $address;
      $this->maintenance = $maintenance;
      $this->billingcode = $billingcode;
      $this->oname = $oname;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query("SELECT places.id, places.name, places.address, places.city, places.maintenance, places.billingcode, owners.name AS oname, owners.id AS oid FROM places INNER JOIN owners ON places.o_id=owners.id ");


      foreach($req->fetchAll() as $place) {
        $list[] = new Place($place['id'], $place['o_id'], $place['name'], $place['address'], $place['city'], $place['maintenance'], $place['billingcode'], $place['oname']);
      }

      return $list;
    }

    public static function cities() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query("SELECT DISTINCT city FROM places");

      foreach($req->fetchAll() as $city) {
        $list[] = $city['city'];
      }

      return $list;
    }

    public static function find($id) {
      $db = Db::getInstance();

      $id = intval($id);
      $req = $db->query("SELECT places.id, places.name, places.address, places.city, places.maintenance, places.billingcode, owners.name AS oname, owners.id FROM places INNER JOIN owners ON places.o_id=owners.id WHERE places.id=$id");

      //$req->execute(array('id' => $id));
      $place = $req->fetch();

      return new Place($place['id'], $place['o_id'], $place['name'], $place['address'], $place['city'], $place['maintenance'], $place['billingcode'], $place['oname']);
    }

    public static function create($o_id, $name, $address, $city, $maintenance, $billingcode) {
      $db = Db::getInstance();

      $req = $db->query("INSERT INTO places (o_id, name, address, city, maintenance, billingcode) VALUES ('$o_id', '$name', '$address', '$city', '$maintenance', '$billingcode')");
    }

    public static function update($id, $o_id, $name, $address, $city, $maintenance, $billingcode) {
      $db = Db::getInstance();

      $req = $db->query("UPDATE places SET a_id=$o_id, name='$name', address='$address', city='$city', maintenance='$maintenance', billingcode='$billingcode' WHERE id=$id");
    }

    public static function delete($id) {
      $db = Db::getInstance();

      $id = intval($id);
      $req = $db->query("DELETE FROM places WHERE id='$id'");
    }
  }
?>
