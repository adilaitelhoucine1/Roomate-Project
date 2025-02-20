<?php 

  
define('DB_HOST', 'localhost');
define('DB_NAME', 'roomate'); 
define('DB_USER', 'root');    
define('DB_PASSWORD', '06database@SM23');    





class Db {

    protected $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO(
                "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
                DB_USER,
                DB_PASSWORD
            );
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    protected function getConnection() {
        return $this->connection;
    }

}