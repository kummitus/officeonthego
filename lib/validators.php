<?php
  function printerrors($errors){
    if(count($errors) > 0){
      echo "<h1 class='warning'>";
      foreach($errors as $error){
        echo $error;
        echo "<br>";
      }
      echo "</h1>";
      return;
    }
  }

  function testWordLength($word, $length, $type){
    if(strlen($word) < $length){
      return true;
    }
    return false;
  }

  function testDifficultPassword($password){
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);

    if(!$uppercase || !$lowercase || !$number) {
      return true;
    }
    return false;
  }

  function testTime($time){
    $a_time = explode(':', $time);
    intval($a_time[0]);
    intval($a_time[1]);
    if(!($a_time[0] >= 0 && $a_time[0] <= 23)){
      return true;
    }
    if(!($a_time[1] >= 0 && $a_time[1] <= 59)){
      return true;
    }
    return false;
  }

?>
