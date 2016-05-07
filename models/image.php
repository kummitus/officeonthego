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

    public static function getImages($o_id, $type){
      if(!verifyLogin($_SESSION)){
        return;
      }
      $list = [];
      $db = Db::getInstance();
      try{
        $req = $db->prepare('SELECT * FROM images WHERE o_id=:o_id AND type=:type ');
        $req->execute(array('o_id' => $o_id, 'type' => $type));
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation fetching images!</h1>";
      }

      foreach($req->fetchAll() as $image) {
        $list[] = new Image($image['id'], $image['o_id'], $image['type'], $image['image_path'], $image['comment']);
      }

      return $list;
    }

    public static function insertpictask($params, $files){
      require_once('utils/uploader.php');
      Uploader::upload($params, $files, 0);

    }

    public static function insertpicplace($params, $files){
      require_once('utils/uploader.php');
      Uploader::upload($params, $files, 1);

    }

    public static function insertpicbill($params, $files){
      require_once('utils/uploader.php');
      Uploader::upload($params, $files, 2);
    }

    public static function removepic($id){
      if(!verifyLogin($_SESSION)){
        return;
      }
      $db = Db::getInstance();
      $db2 = Db::getInstance();

      $id = intval($id);

      try{
        $req = $db->prepare("SELECT * FROM images WHERE id=:id");
        $req->execute(array('id' => $id));
        $name = $req->fetch();
        $req2 = $db2->prepare("DELETE FROM images WHERE id=:id");
        $req2->execute(array('id' => $id));
      }catch (PDOException $e) {
        echo "<h1 class='warning'>Invalid operation!</h1>";
      }finally {
        $path = dirname(__DIR__)."/uploads/".$name['image_path'];
        if(file_exists($path)){
          unlink($path);
        }
      }
    }
  }
  ?>
