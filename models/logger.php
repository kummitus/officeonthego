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
      date_default_timezone_set('Europe/Helsinki');
      if(!isset($user_id)){
        $user_id = 1;
      }
      if(!isset($ip)){
        $ip = "127.0.0.1";
      }
      if(!isset($action)){
        $action = "Unknon action";
      }
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
