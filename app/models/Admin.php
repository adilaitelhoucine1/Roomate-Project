<?php
require_once(__DIR__.'/User.php');
class Admin extends User {
    protected $connection;

    public function __construct() {
        parent::__construct();
        $this->connection = $this->getConnection();
    }

    public function getTotalUsers(){
        $sql = "SELECT COUNT(*) as total_users FROM users";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total_users'];
    }

    public function getTotalAnnouncements(){
        $sql = "SELECT COUNT(*) as total_announcements FROM announcements";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total_announcements'];
    }
   public function getTotalAnnouncementsActive(){
    $sql = "SELECT COUNT(*) as total_announcements FROM announcements WHERE status = 'active'";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['total_announcements'];
   }

   public function getTotalSignals(){
    $sql = "SELECT COUNT(*) as total_signals FROM reports where status = 'pending'";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['total_signals'];
   }
    
}
?>