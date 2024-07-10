<?php


class Database
{
  private static $instance = null;
  private $connection;

  //private constructor to prevent direct creation of objects
  private function __construct()
  {
    $this->connection = new PDO('mysql:host=localhost;dbname=test', 'root', '');
  }

  //public static method to provide access to the single instance
  public static function getInstance()
  {
    if (self::$instance == null) {
      self::$instance = new Database();
    }
    return self::$instance;
  }

  //prevent cloning of the instance
  private function __clone()
  {
  }

  //prevent unserializtion of the instance
  private function __wakeup()
  {
  }

  public function getConnection()
  {
    return $this->connection;
  }
}


//get the single instance of the Database class
$db = Database::getInstance();

//get PDO connection
$connection = $db->getConnection();

//use the connection to execute queries
$query = $connection->query('SELECT * FROM users');

$result = $query->fetchAll(PDO::FETCH_ASSOC);


print_r($result);
