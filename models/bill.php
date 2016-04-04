<?php
  class Bill {

    public $id;
    public $u_id;
    public $t_id;
    public $company;
    public $sum;
    public $info;
    public $path;
    public $date;

    public function __construct($id, $u_id, $t_id, $company, $sum, $info, $path, $date) {
      $this->id = $id;
      $this->u_id = $u_id;
      $this->t_id = $t_id;
      $this->company = $company;
      $this->sum = $sum;
      $this->info = $info;
      $this->path = $path;
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
        $list[] = new bill($bill['id'], $bill['u_id'], $bill['t_id'], $bill['company'], $bill['sum'], $bill['info'], $bill['path'], $bill['date']);
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
      return new bill($bill['id'], $bill['u_id'], $bill['t_id'], $bill['company'], $bill['sum'], $bill['info'], $bill['path'], $bill['date']);
    }

    public static function create($u_id, $p_id, $company, $sum, $info, $path, $date) {
      if(!verifyLogin($_SESSION)){
        return;
      }
      $db = Db::getInstance();
      try{
        $req = $db->query("INSERT INTO bills (u_id, t_id, company, sum, info, path, value) VALUES ('$u_id', '$t_id', '$company', '$sum', '$info', '$path', '$date')");
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation!</h1>";
      }
    }

    public static function update($id, $u_id, $p_id, $company, $sum, $info, $path, $date) {
      if(!verifyLogin($_SESSION)){
        return;
      }
      $db = Db::getInstance();
      try{
        $req = $db->query("UPDATE bills SET u_id=$u_id, t_id=$t_id, company='$company', name=$sum, info='$info', path='$path', date='$date' WHERE id=$id");
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
        $req = $db->query("DELETE FROM bills WHERE id='$id'");
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation!</h1>";
      }
    }
  }
?>
