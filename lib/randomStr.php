<?php
function random_str(){
  require_once(dirname(__DIR__)."/lib/random.php");
  $length = 25;
  $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $str = '';
  $max = mb_strlen($keyspace, '8bit') - 1;
  for ($i = 0; $i < $length; ++$i) {
      $str .= $keyspace[random_int(0, $max)];
  }
  return $str;
}
?>
