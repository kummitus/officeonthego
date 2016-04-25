<?php
  class Time {

    public $id;
    public $u_id;
    public $date;
    public $start_time;
    public $end_time;
    public $t_id;

    public function __construct($id, $u_id, $date, $start_time, $end_time, $t_id) {
      $this->id = $id;
      $this->u_id = $u_id;
      $this->date = $date;
      $this->start_time = $start_time;
      $this->end_time = $end_time;
      $this->t_id = $t_id;
    }

    public static function all() {
      if(!verifyLogin($_SESSION)){
        echo "<h1 class'warning'>Not logged in</h1>";
        return;
      }
      $list = [];
      $db = Db::getInstance();
      try{
        $req = $db->query('SELECT times.*, times.id as tid, users.id, users.name AS uname, tasks.*, tasks.name as tname, places.* FROM times INNER JOIN users ON times.u_id=users.id INNER JOIN tasks ON times.t_id=tasks.id INNER JOIN places ON tasks.p_id=places.id ORDER BY times.date, times.end_time DESC');
        foreach($req->fetchAll() as $time) {
          $info = $time['tname'].", ".$time['address'];
          $list[] = new Time($time['tid'], $time['uname'], $time['date'], $time['start_time'], $time['end_time'], $info);
        }
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation!</h1>";
      }
    return $list;
  }

  public static function find($id) {
    if(!verifyLogin($_SESSION)){
      echo "<h1 class'warning'>Not logged in</h1>";
      return;
    }
    $db = Db::getInstance();

    $id = intval($id);
    $req = $db->prepare("SELECT times.*, times.id as tid, users.id, users.name AS uname, tasks.*, tasks.name as tname, places.* FROM times INNER JOIN users ON times.u_id=users.id INNER JOIN tasks ON times.t_id=tasks.id INNER JOIN places ON tasks.p_id=places.id WHERE times.id=:id");
    try{
      $req->execute(array('id' => $id));
      $time = $req->fetch();
      $info = $time['tname'].", ".$time['address'];
      return new Time($time['tid'], $time['uname'], $time['date'], $time['start_time'], $time['end_time'], $info );
    }catch (PDOException $e) {
      echo "<h1 class='warning'>Invalid operation!</h1>";
    }
  }

  public static function create($u_id, $date, $start_time, $end_time, $t_id) {
    if(!verifyLogin($_SESSION)){
      echo "<h1 class'warning'>Not logged in</h1>";
      return;
    }
    require_once($_SERVER['DOCUMENT_ROOT'].'lib/validators.php');
    $errors = [];
    $date1 = date_create($date);
    $date = date_format($date1, 'Y-m-d');
    if(!checkdate($date)){
      $errors[] = "Check date format";
    }
    if(testTime($start_time)){
      $errors[] = "Check start time";
    }
    if(testTime($end_time)){
      $errors[] = "Check end time";
    }


    $db = Db::getInstance();
    try{
      $req = $db->prepare("INSERT INTO times (u_id, date, start_time, end_time, t_id) VALUES (:u_id, :date, :start_time, :end_time, :t_id)");
      $req->execute(array('u_id' => $u_id, 'date' => $date, 'start_time' => $start_time, 'end_time' => $end_time, 't_id' => $t_id));
    }catch (PDOException $e) {
      echo "<h1 class='warning'>Invalid operation creating time!</h1>";
    }
  }

  public static function update($id, $u_id, $date, $start_time, $end_time, $t_id) {
    if(!verifyLogin($_SESSION)){
      echo "<h1 class'warning'>Not logged in</h1>";
      return;
    }
    $db = Db::getInstance();
    $id = intval($id);
    try{
      $req = $db->prepare("UPDATE times SET u_id=:u_id, date=:date, start_time=:start_time, end_time=:end_time, t_id=:t_id WHERE id=:id");
      $req->execute(array('u_id' => $u_id, 'date' => $date, 'start_time' => $start_time, 'end_time' => $end_time, 't_id' => $t_id, 'id' => $id));
    }catch (PDOException $e) {
      echo "<h1 class='warning'>Invalid operation!</h1>";
    }
  }

  public static function delete($id) {
    if(!verifyLogin($_SESSION)){
      echo "<h1 class'warning'>Not logged in</h1>";
      return;
    }else if(!hasAdminRights($_SESSION)){
      echo "<h1 class='warning'>Unallowed operation</h1>";
      return;
    }
    $db = Db::getInstance();

    $id = intval($id);
    try{
      $req = $db->prepare("DELETE FROM times WHERE id=:id");
      $req->execute(array('id' => $id));
    }catch (PDOException $e) {
      echo "<h1 class='warning'>Invalid operation!</h1>";
    }
  }

  public static function getTaskHours($id) {
    if(!verifyLogin($_SESSION)){
      echo "<h1 class'warning'>Not logged in</h1>";
      return;
    }

    $db = Db::getInstance();
    try{
      $req = $db->prepare("SELECT TIMEDIFF(end_time, start_time) as diff FROM times WHERE t_id=:id");
      $req->execute(array('id' => $id));
    }catch (PDOException $e) {
      echo "<h1 class='warning'>Invalid operation!</h1>";
    }
    $total = 0;;
    foreach($req->fetchAll() as $time) {
      $total += $time['diff'];
    }

    return $total;


  }
}

?>
