<?php
  Class Image {

    public $id;
    public $o_id;
    public $type;
    public $image_path;
    public $comment;

    public function __construct($id, $o_id, $type, $image_path, $comment){
      $this->id = $id;
      $this->o_id = $o_id;
      $this->type = $type;
      $this->image_path = $image_path;
      $this->comment = $comment;
    }

    public function getImages($o_id, $type){
      if(!verifyLogin($_SESSION)){
        return;
      }
      $list = [];
      $db = Db::getInstance();
      try{
        $req = $db->prepare('SELECT * FROM images WHERE o_id=:o_id AND type=:type ');
        $req->execute(array('o_id' => $o_id, 'type' => $type));
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation!</h1>";
      }

      foreach($req->fetchAll() as $image) {
        $list[] = new Image($image['id'], $image['o_id'], $image['type'], $image['image_path'], $image['comment']);
      }

      return $list;
    }

    public function insertpictask($params, $files){
      require_once('utils/uploader.php');
      Uploader::upload($params, $files, 0);

    }

    public function insertpicbill($params, $files){
      require_once('utils/uploader.php');
      Uploader::upload($params, $files, 1);
    }

    public function removepic($id){
      if(!verifyLogin($_SESSION)){
        return;
      }
      $db = Db::getInstance();
      $db2 = Db::getInstance();

      $id = intval($id);

      try{
        $req = $db->query("SELECT * FROM images WHERE id='$id'");
        $name = $req->fetch();
        $db2->query("DELETE FROM images WHERE id='$id'");
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation!</h1>";
      }finally {
        $path = $_SERVER['DOCUMENT_ROOT']."uploads/".$name['image_path'];
        if(file_exists($path)){
          unlink($path);
        }
      }
    }
  }
  ?>
