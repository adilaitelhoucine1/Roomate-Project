<?php
require_once(__DIR__.'/../config/db.php');

class Message extends Db {
    protected $connection;

    public function __construct() {
        parent::__construct();
        $this->connection = $this->getConnection();
    }

    // Récupérer les conversations d'un utilisateur
    public function getConversations($userId) {
        $sql = "SELECT DISTINCT 
                m.*, u.fullname, u.profile_photo
                FROM messages m 
                JOIN users u ON (
                    CASE 
                        WHEN m.sender_id = :userId THEN m.receiver_id = u.id
                        ELSE m.sender_id = u.id
                    END
                )
                WHERE m.sender_id = :userId OR m.receiver_id = :userId 
                ORDER BY m.send_date DESC";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['userId' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Envoyer un message
    public function sendMessage($senderId, $receiverId, $content, $imageUrl = null) {
        $sql = "INSERT INTO messages (sender_id, receiver_id, content, image_url) 
                VALUES (:senderId, :receiverId, :content, :imageUrl)";
                
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute([
            'senderId' => $senderId,
            'receiverId' => $receiverId,
            'content' => $content,
            'imageUrl' => $imageUrl
        ]);
    }
} 