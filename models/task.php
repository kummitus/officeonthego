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
      if(!verifyLogin($_SESSION)){
        return;
      }
      $list = [];
      $db = Db::getInstance();
      try{
        $req = $db->query('SELECT tasks.*, groups.id as g_id, groups.name as gname FROM tasks INNER JOIN groups ON tasks.g_id=groups.id');
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation!</h1>";
      }

      foreach($req->fetchAll() as $task) {
        $list[] = new Task($task['id'], $task['gname'], $task['p_id'], $task['name'], $task['info'], $task['active']);
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
        $req = $db->query("SELECT tasks.*, groups.id as g_id, groups.name as gname, places.id as p_id, places.address, places.city FROM tasks INNER JOIN groups ON tasks.g_id=groups.id INNER JOIN places ON tasks.p_id=places.id WHERE tasks.id=$id");
        $task = $req->fetch();
        return new Task($task['id'], $task['gname'], $task['address'], $task['name'], $task['info'], $task['active']);
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation!</h1>";
      }
    }

    public static function findGroupTasks($id) {
      if(!verifyLogin($_SESSION)){
        return;
      }
      $list = [];
      $db = Db::getInstance();
      try{
        $req = $db->query("SELECT * FROM tasks INNER JOIN places ON tasks.p_id=places.id WHERE g_id=$id");
        foreach($req->fetchAll() as $task) {
          $list[] = new Task($task['id'], $task['g_id'], $task['address'], $task['name'], $task['info'], $task['active']);
        }
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation!</h1>";
      }


      return $list;
    }

    public static function create($g_id, $p_id, $name, $info, $active) {
      if(!verifyLogin($_SESSION)){
        return;
      }
      if(!isset($g_id) || !isset($p_id) || !isset($name) || !isset($info)){
        call('pages', 'error');
      }

      $db = Db::getInstance();
      try{
        $req = $db->query("INSERT INTO tasks (g_id, p_id, name, info, active) VALUES ('$g_id', '$p_id', '$name', '$info', true)");
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation!</h1>";
      }
    }

    public static function update($id, $g_id, $p_id, $name, $info, $active) {
      if(!verifyLogin($_SESSION)){
        return;
      }
      if(!isset($g_id) || !isset($p_id) || !isset($name) || !isset($info) || !isset($active) || !isset($id)){
        call('pages', 'error');
      }
      $db = Db::getInstance();
      try{
        $req = $db->query("UPDATE tasks SET g_id=$g_id, p_id=$p_id, name='$name', info='$info', active=$active WHERE id=$id");
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation!</h1>";
      }
    }

    public static function delete($id) {

      $db = Db::getInstance();

      $id = intval($id);
      try{
        $req = $db->query("DELETE FROM tasks WHERE id='$id'");
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation!</h1>";
      }
    }

    public static function current($id) {
      if(!verifyLogin($_SESSION)){
        return;
      }
      $db = Db::getInstance();
      $id = intval($id);
      try{
        $req = $db->query("SELECT places.*, tasks.*, tasks.id as tid FROM tasks INNER JOIN places ON tasks.p_id=places.id WHERE g_id=$id AND active=1 ORDER BY tasks.id ASC LIMIT 1");
        $task = $req->fetch();
        return new Task($task['tid'], $task['g_id'], $task['address'], $task['name'], $task['info'], $task['city']);
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation! In searching current task</h1>";
      }
    }
  }
?>
