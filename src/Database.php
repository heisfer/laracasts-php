<?php
class Database
{

  public $connection;

  public function __construct()
  {

    $dsn = "mysql:host=localhost;port=3306;dbname=app;charset=utf8mb4";
    $username = "app";
    $password = "app";

    $this->connection = new PDO($dsn, $username, $password);
  }
  public function query($query,)
  {
    $statement = $this->connection->prepare($query);
    $statement->execute();

    return $statement;
  }
}
