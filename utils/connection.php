<?php
  class Db {
    private static $instance = NULL;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {
      if (!isset(self::$instance)) {
        $dsn = 'mysql:host=localhost;dbname=';
        $username = '';
        $password = '';
        $pdo_options = array(
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        );
        self::$instance = new PDO($dsn, $username, $password, $pdo_options);
      }
      return self::$instance;
    }
  }
?>
