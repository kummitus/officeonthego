<?php
  class Time {

    public $id;
    public $start_time;
    public $end_time;
    public $user_id;
    public $task_id;

    public function __construct($id, $start_time, $end_time, $user_id, $task_id) {
      $this->id = $id;
      $this->start_time = $start_time;
      $this->end_time = $end_time;
      $this->user_id = $user_id;
      $this->task_id = $task_id;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM times');
    }

    foreach($req->fetchAll() as $time) {
      $list[] = new Time($time['id'], $time['start_time'], $time['end_time'], $time['user_id'], $time['task_id']);
    }

    return $list;
  }

  public static function find($id) {
    $db = Db::getInstance();

    $id = intval($id);
    $req = $db->prepare('SELECT * FROM times WHERE id = :id');

    $req->execute(array('id' => $id));
    $time = $req->fetch();

    return new Time($time['id'], $time['start_time'], $time['end_time'], $time['user_id'], $time['task_id']);
  }

?>
