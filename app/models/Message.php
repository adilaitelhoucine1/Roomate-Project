<?php
require_once(__DIR__.'/../config/db.php');

class Message extends Db {
    protected $connection;

    public function __construct() {
        parent::__construct();
        $this->connection = $this->getConnection();
    }

    public function getMessagesBetweenUsers($userId1, $userId2) {
        $sql = "SELECT m.*, 
                       u.fullname as sender_name,
                       u.profile_photo as sender_photo
                FROM messages m
                LEFT JOIN users u ON m.sender_id = u.id
                WHERE (m.sender_id = :user1 AND m.receiver_id = :user2)
                   OR (m.sender_id = :user2 AND m.receiver_id = :user1)
                ORDER BY m.send_date ASC";

        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([
                'user1' => $userId1,
                'user2' => $userId2
            ]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error getting messages: " . $e->getMessage());
            return [];
        }
    }

    public function getConversations($userId) {
        $sql = "SELECT DISTINCT 
                    u.id,
                    u.fullname,
                    u.profile_photo,
                    last_msg.content as last_message,
                    last_msg.send_date
                FROM users u
                JOIN (
                    SELECT 
                        CASE 
                            WHEN sender_id = :userId THEN receiver_id
                            ELSE sender_id
                        END as other_user_id,
                        content,
                        send_date,
                        ROW_NUMBER() OVER (PARTITION BY 
                            CASE 
                                WHEN sender_id = :userId THEN receiver_id
                                ELSE sender_id
                            END 
                        ORDER BY send_date DESC) as rn
                    FROM messages
                    WHERE sender_id = :userId OR receiver_id = :userId
                ) last_msg ON u.id = last_msg.other_user_id
                WHERE last_msg.rn = 1
                ORDER BY last_msg.send_date DESC";

        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->execute(['userId' => $userId]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error getting conversations: " . $e->getMessage());
            return [];
        }
    }

    public function sendMessage($senderId, $receiverId, $content, $imageUrl = null) {
        $sql = "INSERT INTO messages (sender_id, receiver_id, content, image_url, send_date, is_read) 
                VALUES (:senderId, :receiverId, :content, :imageUrl, NOW(), 0)";

        try {
            $stmt = $this->connection->prepare($sql);
            return $stmt->execute([
                'senderId' => $senderId,
                'receiverId' => $receiverId,
                'content' => $content,
                'imageUrl' => $imageUrl
            ]);
        } catch (PDOException $e) {
            error_log("Error sending message: " . $e->getMessage());
            return false;
        }
    }

    public function markAsRead($messageId, $userId) {
        $sql = "UPDATE messages 
                SET is_read = TRUE 
                WHERE id = :messageId 
                AND receiver_id = :userId";

        $stmt = $this->connection->prepare($sql);
        return $stmt->execute([
            'messageId' => $messageId,
            'userId' => $userId
        ]);
    }
} 