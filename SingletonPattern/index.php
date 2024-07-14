<?php

class Database
{
  private static $instance = null;
  private $connection;

  private function __construct()
  {
    $this->connection = new PDO('mysql:host=localhost;dbname=test', 'root', '');
  }

  public static function getInstance()
  {
    if (self::$instance == null) {
      self::$instance = new Database();
    }
    return self::$instance;
  }

  private function __clone()
  {
  }

  private function __wakeup()
  {
  }

  public function getConnection()
  {
    return $this->connection;
  }
}


$db = Database::getInstance();

$connection = $db->getConnection();

$query = $connection->query('SELECT * FROM users');

$results = $query->fetchAll(PDO::FETCH_ASSOC);


print_r($results);
