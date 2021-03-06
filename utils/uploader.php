<?php
  class Uploader {
  public static function upload($params, $files, $type){
    require_once(dirname(__DIR__).'/lib/randomStr.php');
    ini_set('upload_tmp_dir', dirname(__DIR__)."/tmp/");
    $target_dir = dirname(__DIR__)."/uploads/";
    $uploadOk = 1;
    $imageFileType = pathinfo($files['image']['name'],PATHINFO_EXTENSION);
    $name = random_str().".".$imageFileType;
    $target_file = $target_dir . $name;

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($files['image']['tmp_name']);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }
    // Check if file already exists
    if(file_exists($target_file)) {
      echo "Exists.";
      $uploadOk = 0;
    }
    // Check file size
    if ($files["image"]["size"] > 100000000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "JPG" && $imageFileType != "JPEG" && $imageFileType != "PNG" ) {
      echo "Sorry, only JPG, JPEG files are allowed.";
      $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
      return 1;
    } else {
      if(class_exists("Imagick")){
        $thumb = new Imagick($files["image"]["tmp_name"]);
        if($thumb->getImageWidth()> 1000){
          $thumb ->resizeImage(0,1000, Imagick::FILTER_LANCZOS, 1);
          $thumb->writeImage($files["image"]["tmp_name"]);
        }
        $thumb->destroy();
      }else{
        echo "Resizing not available";
      }
      if (move_uploaded_file($files["image"]["tmp_name"], $target_file)) {
        $db = Db::getInstance();
        try{
          if(isset($params['o_id'])) {
            $o_id = intval($params['o_id']);
          } else {
            $o_id = intval($params);
          }
          if(!isset($params['comment'])){
            $comment = "";
          }else {
            $comment = $params['comment'];
          }
          $req = $db->prepare("INSERT INTO images (o_id, type, image_path, comment) VALUES (:o_id, :type, :image_path, :comment)");
          $req->execute(array('o_id' => $o_id, 'type' => $type, 'image_path' => $name, 'comment' => $comment));

        }catch (PDOException $e) {
          echo "<h1 class='warning'>Invalid operation!</h1>";
        }

        #echo "The file ". basename( $files["image"]["name"]). " has been uploaded.";

      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
  }
  }
?>
