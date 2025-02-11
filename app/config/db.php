<?php

class Db
{
  private $host = "roommate.mysql.database.azure.com";
  private $port = "3306";
  private $user = "team";
  private $password = "Pfmtj5xuXSq;u'#";
  private $database = "room-mate";
  private $ssl_ca = "/DigiCertGlobalRootCA.crt.pem";
  public $connection;

  public function __construct()
  {
    $dsn = "mysql:host=$this->host;port=$this->port;dbname=$this->database;charset=utf8mb4";

    $options = [
      PDO::MYSQL_ATTR_SSL_CA      => $this->ssl_ca, // Enable SSL
      PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false, // Set to true for stronger security
      PDO::ATTR_ERRMODE           => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES  => false,
    ];

    try {
      $this->connection = new PDO($dsn, $this->user, $this->password, $options);
    } catch (PDOException $e) {
      die("Connection failed: " . $e->getMessage());
    }
  }
}