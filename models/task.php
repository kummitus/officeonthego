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
        $list[] = new Task($task['id'], $task['gname'], Time::getTaskHours($task['id']), $task['name'], $task['info'], $task['active']);
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
        $req = $db->prepare("SELECT tasks.*, groups.id as g_id, groups.name as gname, places.id as p_id, places.address, places.city FROM tasks INNER JOIN groups ON tasks.g_id=groups.id INNER JOIN places ON tasks.p_id=places.id WHERE tasks.id=:id");
        $req->execute(array('id' => $id));
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
        $req = $db->prepare("SELECT * FROM tasks INNER JOIN places ON tasks.p_id=places.id WHERE g_id=:id");
        $req->execute(array('id' => $id));
        foreach($req->fetchAll() as $task) {
          $list[] = new Task($task['id'], $task['g_id'], $task['address'], $task['name'], $task['info'], $task['active']);
        }
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation in findGroupTasks!</h1>";
      }


      return $list;
    }

    public static function findGroupTasksActive($id) {
      if(!verifyLogin($_SESSION)){
        return;
      }
      $list = [];
      $db = Db::getInstance();
      try{
        $req = $db->prepare("SELECT * FROM tasks INNER JOIN places ON tasks.p_id=places.id WHERE g_id=:id AND active=1");
        $req->execute(array('id' => $id));
        foreach($req->fetchAll() as $task) {
          $list[] = new Task($task['id'], $task['g_id'], $task['address'], $task['name'], $task['info'], $task['active']);
        }
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation in findGroupTasks!</h1>";
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
        $req = $db->prepare("INSERT INTO tasks (g_id, p_id, name, info, active) VALUES (:g_id, :p_id, :name, :info, true)");
        $req->execute(array('g_id' => $g_id, 'p_id' => $p_id, 'name' => $name, 'info' => $info));
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
        $req = $db->prepare("UPDATE tasks SET g_id=:g_id, p_id=:p_id, name=:name, info=:info, active=:active WHERE id=:id");
        $req->execute(array('g_id' => $g_id, 'p_id' => $p_id, 'name' => $name, 'info' => $info, 'active' => $active, 'id' => $id));
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation!</h1>";
      }
    }

    public static function delete($id) {

      $db = Db::getInstance();

      $id = intval($id);
      try{
        $req = $db->prepare("DELETE FROM tasks WHERE id=:id");
        $req->execute(array('id' => $id));
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation!</h1>";
      }
    }

    public static function toggleactive($id) {
      if(!verifyLogin($_SESSION)){
        return;
      }
      $db = Db::getInstance();
      $id = intval($id);
      try{
        $req = $db->prepare("UPDATE tasks SET active=1 WHERE id=:id");
        $req->execute(array('id' => $id));
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation! In toggleactive</h1>".$e;
      }
    }

    public static function toggleinactive($id) {
      if(!verifyLogin($_SESSION)){
        return;
      }
      $db = Db::getInstance();
      $id = intval($id);
      try{
        $req = $db->prepare("UPDATE tasks SET active=0 WHERE id=:id");
        $req->execute(array('id' => $id));
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation! In toggleinactive</h1>".$e;
      }
    }

    public static function findPlaceId($id){
      return self::find($id)->p_id;
    }
  }
?>
