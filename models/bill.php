<?php
  class Bill {

    public $id;
    public $u_id;
    public $company;
    public $sum;
    public $info;
    public $dateofpurchase;
    public $task;

    public function __construct($id, $u_id, $company, $sum, $info, $date, $task) {
      $this->id = $id;
      $this->u_id = $u_id;
      $this->company = $company;
      $this->sum = $sum;
      $this->info = $info;
      $this->dateofpurchase = $date;
      $this->task = $task;
    }

    public static function all() {
      if(!verifyLogin($_SESSION)){
        return;
      }
      $list = [];
      $db = Db::getInstance();
      try{
        $req = $db->query('SELECT bills.id AS bid, bills.u_id AS u_id, bills.company AS company, bills.sum AS sum, bills.info AS info, bills.dateofpurchase AS dateofpurchase, bills.task, tasks.id, tasks.name AS name FROM bills INNER JOIN tasks ON tasks.id=bills.task');
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation!</h1>";
      }
      foreach($req->fetchAll() as $bill) {
        $list[] = new bill($bill['bid'], $bill['u_id'], $bill['company'], $bill['sum'], $bill['info'], $bill['dateofpurchase'], $bill['name']);
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
        $req = $db->prepare('SELECT bills.id AS bid, bills.u_id as u_id, bills.company AS company, bills.sum AS sum, bills.info AS info, bills.dateofpurchase AS dateofpurchase, bills.task, tasks.id, tasks.name AS name FROM bills INNER JOIN tasks ON tasks.id=bills.task WHERE bills.id = :id');
        $req->execute(array('id' => $id));
        $bill = $req->fetch();
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation!</h1>";
      }
      return new bill($bill['bid'], $bill['u_id'], $bill['company'], $bill['sum'], $bill['info'], $bill['dateofpurchase'], $bill['name']);
    }

    public static function create($u_id, $company, $sum, $info, $date, $task) {
      if(!verifyLogin($_SESSION)){
        return;
      }
      $db = Db::getInstance();

      date_default_timezone_set('Europe/Helsinki');

      $date1 = date_create($date);
      $date = date_format($date1, 'Y-m-d');
      try{
        $req = $db->prepare("INSERT INTO bills (u_id, company, sum, info, dateofpurchase, task) VALUES (:u_id, :company, :sum, :info, :dateofpurchase, :task)");
        $req->execute(array('u_id' => $u_id, 'company' => $company, 'sum' => $sum, 'info' => $info, 'dateofpurchase' => $date, 'task' => $task));
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation in create!</h1>".$e;
      }

        require 'utils/kint/Kint.class.php';
      return $db->lastInsertId();
    }

    public static function update($id, $u_id, $company, $sum, $info, $date, $task) {
      if(!verifyLogin($_SESSION)){
        return;
      }
      $db = Db::getInstance();
      try{
        $req = $db->prepare("UPDATE bills SET u_id=:u_id, company=:company, name=:sum, info=:info, dateofpurchase=:dateofpurchase, task=:task WHERE id=:id");
        $req->execute(array('u_id' => $u_id, 'company' => $company, 'sum' => $sum, 'info' => $info, 'dateofpurchase' => $date, 'id' => $id, 'task' => $task));
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

    public static function getBillsByTask($id){
      if(!verifyLogin($_SESSION)){
        return;
      }
      $list = [];
      $db = Db::getInstance();
      try{
        $req = $db->prepare("SELECT * FROM bills WHERE task=:id");
        $req->execute(array('id' => $id));
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation!</h1>";
      }
      foreach($req->fetchAll() as $bill) {
        $list[] = new bill($bill['id'], $bill['u_id'], $bill['company'], $bill['sum'], $bill['info'], $bill['dateofpurchase'], $bill['task']);
      }

      return $list;
    }
  }
?>
