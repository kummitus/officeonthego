<?php
  class Place {

    public $id;
    public $o_id;
    public $address;
    public $city;
    public $maintenance;
    public $billingcode;
    public $oname;
    public $long;
    public $lat;

    public function __construct($id, $o_id, $address, $city, $maintenance, $billingcode, $oname, $long, $lat) {
      $this->id = $id;
      $this->o_id = $o_id;
      $this->city = $city;
      $this->address = $address;
      $this->maintenance = $maintenance;
      $this->billingcode = $billingcode;
      $this->oname = $oname;
      $this->long = $long;
      $this->lat = $lat;
    }

    public static function all() {
      if(!verifyLogin($_SESSION)){
        return;
      }
      $list = [];
      $db = Db::getInstance();
      try{
        $req = $db->query("SELECT places.id, places.address, places.city, places.maintenance, places.billingcode, places.longitude, places.latitude, owners.name AS oname, owners.id AS oid FROM places INNER JOIN owners ON places.o_id=owners.id");
        foreach($req->fetchAll() as $place) {
          $list[] = new Place($place['id'], $place['oid'], $place['address'], $place['city'], $place['maintenance'], $place['billingcode'], $place['oname'], $place['longitude'], $place['latitude']);
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
        $req = $db->query("SELECT DISTINCT city FROM places ORDER BY city ASC");
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
        $req = $db->prepare("SELECT places.id, places.address, places.city, places.maintenance, places.billingcode, places.longitude, places.latitude, owners.name AS oname, owners.id AS o_id FROM places INNER JOIN owners ON places.o_id=o_id WHERE places.id=:id");
        $req->execute(array('id' => $id));
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation finding place!</h1>";
      }
      //$req->execute(array('id' => $id));
      $place = $req->fetch();

      return new Place($id, $place['o_id'], $place['address'], $place['city'], $place['maintenance'], $place['billingcode'], $place['oname'], $place['longitude'], $place['latitude']);
    }

    public static function create($o_id, $address, $city, $maintenance, $billingcode, $long, $lat) {
      if(!verifyLogin($_SESSION)){
        return;
      }
      $db = Db::getInstance();
      try{
        $req = $db->prepare("INSERT INTO places (o_id, address, city, maintenance, billingcode, longitude, latitude) VALUES (:o_id, :address, :city, :maintenance, :billingcode, :longitude, :latitude)");
        $req->execute(array('o_id' => $o_id, 'address' => $address, 'city' => $city, 'maintenance' => $maintenance, 'billingcode' => $billingcode, 'longitude' => $long, 'latitude' => $lat));
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation!</h1>";
      }
    }

    public static function update($id, $o_id, $address, $city, $maintenance, $billingcode, $long, $lat) {
      if(!verifyLogin($_SESSION)){
        return;
      }
      $db = Db::getInstance();
      try{
        $req = $db->prepare("UPDATE places SET o_id=:o_id, address=:address, city=:city, maintenance=:maintenance, billingcode=:billingcode, longitude=:longitude, latitude=:latitude WHERE id=:id");
        $req->execute(array('o_id' => $o_id, 'address' => $address, 'city' => $city, 'maintenance' => $maintenance, 'billingcode' => $billingcode, 'id' => $id, 'longitude' => $long, 'latitude' => $lat));
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
        $req = $db->prepare("DELETE FROM places WHERE id=:id");
        $req->execute(array('id' => $id));
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation in deleting place</h1>";
      }
    }
  }
?>
