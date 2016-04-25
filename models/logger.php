<?php
  Class Logger {

    public $id;
    public $user_id;
    public $ip;

    public function __construct($id, $user_id, $ip){
      $this->id = $id;
      $this->user_id = $user_id;
      $this->ip = $ip;
    }

    public static function create($user_id, $ip, $action) {
      $db = Db::getInstance();
      $date = date('Y-m-d');
      $time = date('H:i:s', time());
      try{
        $req = $db->prepare("INSERT INTO logging (user_id, ip, date, time, action) VALUES (:user_id, :ip, :date, :time, :action)");
        $req->execute(array('user_id' => $user_id, 'ip' => $ip, 'date' => $date, 'time' => $time, 'action' => $action));
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation! Logging failed</h1>";
      }
    }
  }
