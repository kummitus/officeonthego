<?php
  class Bill {

    public $id;
    public $u_id;
    public $company;
    public $sum;
    public $info;
    public $path;
    public $date;

    public function __construct($id, $u_id, $company, $sum, $info, $path, $date) {
      $this->id = $id;
      $this->u_id = $u_id;
      $this->company = $company;
      $this->sum = $sum;
      $this->info = $info;
      $this->path = $path;
      $this->date = $date;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM bills');

      foreach($req->fetchAll() as $bill) {
        $list[] = new bill($bill['id'], $bill['u_id'], $bill['company'], $bill['sum'], $bill['info'], $bill['path'], $bill['date']);
      }

      return $list;
    }

    public static function find($id) {
      $db = Db::getInstance();

      $id = intval($id);
      $req = $db->prepare('SELECT * FROM bills WHERE id = :id');

      $req->execute(array('id' => $id));
      $bill = $req->fetch();

      return new bill($bill['id'], $bill['u_id'], $bill['company'], $bill['sum'], $bill['info'], $bill['path'], $bill['date']);
    }

    public static function create($u_id, $company, $sum, $info, $path, $date) {
      $db = Db::getInstance();

      $req = $db->query("INSERT INTO bills (u_id, company, sum, info, path, value) VALUES ('$u_id', '$company', '$sum', '$info', '$path', '$date')");
    }

    public static function update($id, $u_id, $company, $sum, $info, $path, $date) {
      $db = Db::getInstance();

      $req = $db->query("UPDATE bills SET u_id=$u_id, company='$company', name=$sum, info='$info', path='$path', date='$date' WHERE id=$id");
    }

    public static function delete($id) {
      $db = Db::getInstance();

      $id = intval($id);
      $req = $db->query("DELETE FROM bills WHERE id='$id'");
    }
  }
?>
