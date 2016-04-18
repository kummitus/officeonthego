<?php
  class Bill {

    public $id;
    public $u_id;
    public $company;
    public $sum;
    public $info;
    public $date;

    public function __construct($id, $u_id, $company, $sum, $info, $date) {
      $this->id = $id;
      $this->u_id = $u_id;
      $this->company = $company;
      $this->sum = $sum;
      $this->info = $info;
      $this->date = $date;
    }

    public static function all() {
      if(!verifyLogin($_SESSION)){
        return;
      }
      $list = [];
      $db = Db::getInstance();
      try{
        $req = $db->query('SELECT * FROM bills');
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation!</h1>";
      }
      foreach($req->fetchAll() as $bill) {
        $list[] = new bill($bill['id'], $bill['u_id'], $bill['company'], $bill['sum'], $bill['info'], $bill['date']);
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
        $req = $db->prepare('SELECT * FROM bills WHERE id = :id');
        $req->execute(array('id' => $id));
        $bill = $req->fetch();
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation!</h1>";
      }
      return new bill($bill['id'], $bill['u_id'], $bill['company'], $bill['sum'], $bill['info'], $bill['date']);
    }

    public static function create($u_id, $company, $sum, $info, $date) {
      if(!verifyLogin($_SESSION)){
        return;
      }
      $db = Db::getInstance();

      $date1 = date_create($date);
      $date = date_format($date1, 'Y-m-d');
      try{
        $db->query("INSERT INTO bills (u_id, company, sum, info, date) VALUES ('$u_id', '$company', '$sum', '$info', '$date')");
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation in create!</h1>".$e;
      }
      return $db->lastInsertId();
    }

    public static function update($id, $u_id, $company, $sum, $info, $date) {
      if(!verifyLogin($_SESSION)){
        return;
      }
      $db = Db::getInstance();
      try{
        $db->query("UPDATE bills SET u_id=$u_id, company='$company', name=$sum, info='$info', path='$path', date='$date' WHERE id=$id");
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation in update!</h1>";
      }
      return $db->lastInsertId();
    }

    public static function delete($id) {
      if(!verifyLogin($_SESSION)){
        return;
      }
      $db = Db::getInstance();

      $id = intval($id);
      try{
        $req = $db->query("DELETE FROM bills WHERE id='$id'");
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation!</h1>";
      }
    }
  }
?>
