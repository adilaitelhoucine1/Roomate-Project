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

public function login($email, $password) {
    try {
        // First check if user exists and is active
        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->execute([$email]);
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user && password_verify($password, $user['password'])) {
            // Start session if not already started
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            
            // Store user data in session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_role'] = $user['role'];
            $_SESSION['user_name'] = $user['fullname'];
            $_SESSION['logged_in'] = true;
            
            return true;
        }
        return false;
    } catch (PDOException $e) {
        return false;
    }
}
public function getAllUsers()
{
    $query = "SELECT * FROM users where role='student'";
    $stmt = $this->connection->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll();
}

public function removeUsers($id){
    $query = "DELETE FROM users WHERE id = :id";
    $stmt = $this->connection->prepare($query);
    $stmt->bindParam(":id" , $id);
    
    try{
        $stmt->execute();
        return 1;
    }catch(PDOException $e){
        die("Erreur Lors de Suppression : " . $e);
    }
}

// public function blockUsers($status,$id){
//     if($status == "inactive"){
//         $query = "UPDATE users SET status = 'active' WHERE id = :id";
//         $stmt = $this->connection->prepare($query);
//         $stmt->bindParam("id", $id);

//     }else{
//         $query = "UPDATE users SET status = 'inactive' WHERE id = :id";
//         $stmt = $this->connection->prepare($query);
//         $stmt->bindParam("id", $id);
//     }
   
        
//         try {
//             $stmt->execute();
//             return 1;
//         }catch(PDOException $e){
//             die("Erreur lors de Update status : " . $e);  
//         }

// }
public function blockUsers($status, $id) {
    $status = trim(strtolower($status));
    try {
        if ($status == "inactive") {
           
            $query = "UPDATE users SET status = 'active' WHERE id = :id";
        } else {
            
            $query = "UPDATE users SET status = 'inactive' WHERE id = :id";
        }

        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(":id", $id); 
        $stmt->execute();  
        
        return 1;
    } catch (PDOException $e) {
        die("Erreur lors de la mise à jour du statut : " . $e->getMessage());
    }
}


}
