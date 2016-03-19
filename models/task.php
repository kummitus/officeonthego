<?php
  class Task {

    public $id;
    public $name;
    public $info;
    public $p_id;
    public $g_id;
    public $active;

    public function __construct($id, $g_id, $p_id, $name, $info, $active) {
      $this->id = $id;
      $this->name = $name;
      $this->info = $info;
      $this->p_id = $p_id;
      $this->g_id = $g_id;
      $this->active = $active;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM tasks');

      foreach($req->fetchAll() as $task) {
        $list[] = new Task($task['id'], $task['g_id'], $task['p_id'], $task['name'], $task['info'], $task['active']);
      }

      return $list;
    }

    public static function find($id) {
      $db = Db::getInstance();

      $id = intval($id);
      $req = $db->prepare('SELECT * FROM tasks WHERE id = :id');

      $req->execute(array('id' => $id));
      $task = $req->fetch();

      return new Task($task['id'], $task['g_id'], $task['p_id'], $task['name'], $task['info'], $task['active']);
    }

    public static function create($g_id, $p_id, $name, $info, $active) {
      $db = Db::getInstance();

      $req = $db->query("INSERT INTO tasks (g_id, p_id, name, info, active) VALUES ('$g_id', '$p_id', '$name', '$info', true)");
    }

    public static function update($id, $g_id, $p_id, $name, $info, $active) {
      $db = Db::getInstance();

      $req = $db->query("UPDATE tasks SET g_id=$g_id, p_id=$p_id, name='$name', info='$info', active='$active' WHERE id=$id");
    }

    public static function delete($id) {
      $db = Db::getInstance();

      $id = intval($id);
      $req = $db->query("DELETE FROM tasks WHERE id='$id'");
    }
  }
?>
