<?php
require_once(__DIR__ . '/../config/db.php');




class User extends Db
{
    protected $connection;

    public function __construct()
    {
        parent::__construct();
        $this->connection = $this->getConnection();
    }

    public function register($userData)
    {
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

    public function login($email, $password)
    {
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

    public function getReports()
    {
        $query = "SELECT 
            r.*,
            u.fullname as user_name,
            u.profile_photo as user_image,
            a.title as announcement_title,
            COALESCE(r.admin_note, 'Non renseigné') as admin_note
        FROM reports r
        LEFT JOIN users u ON r.reporter_id = u.id
        LEFT JOIN announcements a ON r.announcement_id = a.id
        ORDER BY r.creation_date DESC";

        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function updateReportStatus($reportId, $status, $adminNote)
    {
        try {
            $query = "UPDATE reports SET status = ?, admin_note = ? WHERE id = ?";
            $stmt = $this->connection->prepare($query);
            return $stmt->execute([$status, $adminNote, $reportId]);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getUserById($userId) {
        $sql = "SELECT id, fullname, email, profile_photo, role 
                FROM users 
                WHERE id = :userId";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['userId' => $userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
