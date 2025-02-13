<?php
require_once(__DIR__.'/../config/db.php');

class Announcement extends Db {

    protected $connection;

    public function __construct()
    {
        parent::__construct();
        $this->connection = $this->getConnection();
    }

    public function getAllAnnacementsAdmin(){
        $sql = "
        SELECT 
            u.profile_photo, 
            u.fullname, 
            ann.id, 
            ann.city, 
            ann.status, 
            ann.type, 
            off.price, 
            req.budget,
            req.move_in_date,
            ann.creation_date
        FROM announcements ann
        JOIN users u ON u.id = ann.user_id
        LEFT JOIN offer_announcements off ON off.announcement_id = ann.id
        LEFT JOIN request_announcements req ON req.announcement_id = ann.id
    ";
    $resultat = $this->connection->query($sql);
    $announcements = $resultat->fetchAll(PDO::FETCH_ASSOC);
    return $announcements;
    
    }

    public function deleteAnnouncement($id){
        $sql = "DELETE FROM announcements WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$id]);
    }

    public function activateAnnouncement($id){
        $sql = "UPDATE announcements SET status = 'active' WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$id]);
    }

    public function deactivateAnnouncement($id){
        $sql = "UPDATE announcements SET status = 'inactive' WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$id]);
    }
    
    
    

   
} 