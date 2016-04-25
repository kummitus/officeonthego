<?php
  class Bill {

    public $id;
    public $u_id;
    public $company;
    public $sum;
    public $info;
    public $dateofpurchase;

    public function __construct($id, $u_id, $company, $sum, $info, $date) {
      $this->id = $id;
      $this->u_id = $u_id;
      $this->company = $company;
      $this->sum = $sum;
      $this->info = $info;
      $this->dateofpurchase = $date;
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
        $list[] = new bill($bill['id'], $bill['u_id'], $bill['company'], $bill['sum'], $bill['info'], $bill['dateofpurchase']);
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
        $req = $db->prepare("INSERT INTO bills (u_id, company, sum, info, dateofpurchase) VALUES (:u_id, :company, :sum, :info, :dateofpurchase)");
        $req->execute(array('u_id' => $u_id, 'company' => $company, 'sum' => $sum, 'info' => $info, 'dateofpurchase' => $date));
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation in create!</h1>".$e;
      }

        require 'utils/kint/Kint.class.php';
      return $db->lastInsertId();
    }

    public static function update($id, $u_id, $company, $sum, $info, $date) {
      if(!verifyLogin($_SESSION)){
        return;
      }
      $db = Db::getInstance();
      try{
        $req = $db->prepare("UPDATE bills SET u_id=:u_id, company=:company, name=:sum, info=:info, dateofpurchase=:dateofpurchase WHERE id=:id");
        $req->execute(array('u_id' => $u_id, 'company' => $company, 'sum' => $sum, 'info' => $info, 'dateofpurchase' => $date, 'id' => $id));
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
        $req = $db->prepare("DELETE FROM bills WHERE id=:id");
        $req->execute(array('id' => $id));
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation!</h1>";
      }
    }

    public static function companies() {
      if(!verifyLogin($_SESSION)){
        return;
      }
      $list = [];
      $db = Db::getInstance();
      try{
        $req = $db->query("SELECT DISTINCT company FROM bills");
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation!</h1>";
      }
      foreach($req->fetchAll() as $company) {
        $list[] = $company['company'];
      }

      return $list;
    }
  }
?>
