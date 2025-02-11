<?php 
require_once(__DIR__.'/../config/db.php');

class User extends Db {
    protected $conn;

    public function __construct() {
        parent::__construct();
        $this->conn = $this->connection;
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

            $stmt = $this->conn->prepare($query);
            
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

            return $this->conn->lastInsertId();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function login($userData){
        
        try {
            $result = $this->conn->prepare("SELECT * FROM utilisateurs WHERE email=?");
            $result->execute([$userData[0]]);
            $user = $result->fetch(PDO::FETCH_ASSOC);

            if($user && password_verify($userData[1], $user["mot_de_passe"])){
               

               return  $user ;
            
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }


  
}