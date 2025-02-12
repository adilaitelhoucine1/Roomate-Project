<?php 
require_once(__DIR__.'/../config/db.php');




class User extends Db {
    protected $connection;

    public function __construct()
    {
        parent::__construct();
        $this->connection = $this->getConnection();
    }

public function register($userData) {
   
    try {
        $query = "INSERT INTO users (
            email, 
            password,
            fullname,
            gender,
            study_year,
            city_origin,
            current_city,
            bio,
            profile_photo,
            smoking,
            pets,
            guests
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->connection->prepare($query);
        
        $stmt->execute([
            $userData['email'],
            $userData['password'],
            $userData['fullname'],
            $userData['gender'],
            $userData['study_year'],
            $userData['city_origin'],
            $userData['current_city'],
            $userData['bio'],
            $userData['profile_photo'],
            $userData['smoking'],
            $userData['pets'],
            $userData['guests']
        ]);

        return $this->connection->lastInsertId();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}


}
