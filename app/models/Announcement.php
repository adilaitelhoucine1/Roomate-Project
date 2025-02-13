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

    public function deleteAnnouncementAdmin($id){
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
    
  

    public function getallanouncesbyuser()
{
        $stmt = $this->connection->prepare("SELECT 
    a.*, 
    oa.price, 
    oa.address, 
    oa.equipment, 
    oa.capacity, 
    oa.is_available, 
    op.photo_url
FROM 
    announcements a
LEFT JOIN 
    offer_announcements oa ON a.id = oa.announcement_id
LEFT JOIN 
    request_announcements ra ON a.id = ra.announcement_id
LEFT JOIN 
    offer_photos op ON op.offer_id = oa.announcement_id
WHERE user_id = :user_id;
");
        $stmt->bindParam(':user_id',$_SESSION['user_id']);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function getallanounces()
    {
        $stmt = $this->connection->prepare("SELECT 
    a.*, 
    oa.price, 
    oa.address, 
    oa.equipment, 
    oa.capacity, 
    oa.is_available, 
    op.photo_url
FROM 
    announcements a
LEFT JOIN 
    offer_announcements oa ON a.id = oa.announcement_id
LEFT JOIN 
    request_announcements ra ON a.id = ra.announcement_id
LEFT JOIN 
    offer_photos op ON op.offer_id = oa.announcement_id;
");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteAnnouncement($announcementId, $userId) {
 
            $this->connection->beginTransaction();

            $stmt = $this->connection->prepare("SELECT id FROM announcements WHERE id = :id AND user_id = :user_id");
            $stmt->execute(['id' => $announcementId, 'user_id' => $userId]);
            
                        $stmt = $this->connection->prepare("DELETE FROM offer_photos WHERE offer_id = :announcement_id");
            $stmt->execute(['announcement_id' => $announcementId]);

            $stmt = $this->connection->prepare("DELETE FROM offer_announcements WHERE announcement_id = :announcement_id");
            $stmt->execute(['announcement_id' => $announcementId]);

            $stmt = $this->connection->prepare("DELETE FROM announcements WHERE id = :id AND user_id = :user_id");
            $stmt->execute(['id' => $announcementId, 'user_id' => $userId]);

            $this->connection->commit();
            return true;
       
    }

    public function getAnnouncementById($id, $userId) {
        $stmt = $this->connection->prepare("
            SELECT 
                a.*, 
                oa.price, 
                oa.address, 
                oa.capacity,
                op.photo_url
            FROM announcements a
            LEFT JOIN offer_announcements oa ON a.id = oa.announcement_id
            LEFT JOIN offer_photos op ON op.offer_id = a.id
            WHERE a.id = :id AND a.user_id = :user_id
        ");
        $stmt->execute(['id' => $id, 'user_id' => $userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateAnnouncement($data) {

            $this->connection->beginTransaction();

            $sql = "UPDATE announcements SET 
                title = :title,
                description = :description,
                city = :city,
                type = :type,
                search_type = :search_type,
                cohabitation_rules = :cohabitation_rules,
                preferred_roommate_criteria = :preferred_roommate_criteria
                WHERE id = :id AND user_id = :user_id";
            
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([
                'id' => $data['id'],
                'title' => $data['title'],
                'description' => $data['description'],
                'city' => $data['city'],
                'type' => $data['type'],
                'search_type' => $data['search_type'],
                'cohabitation_rules' => $data['cohabitation_rules'],
                'preferred_roommate_criteria' => $data['preferred_roommate_criteria'],
                'user_id' => $data['user_id']
            ]);

            $sqlOffer = "UPDATE offer_announcements SET
                price = :price,
                address = :address,
                capacity = :capacity
                WHERE announcement_id = :announcement_id";

            $stmtOffer = $this->connection->prepare($sqlOffer);
            $stmtOffer->execute([
                'announcement_id' => $data['id'],
                'price' => $data['price'],
                'address' => $data['address'],
                'capacity' => $data['capacity']
            ]);

            $this->connection->commit();
            return true;
    
    }


    public function createAnnouncement($data) {

   
        $this->connection->beginTransaction();

  
        $sql = "INSERT INTO announcements (
            title, 
            description, 
            city, 
            type, 
            search_type, 
            cohabitation_rules, 
            preferred_roommate_criteria, 
            status, 
            user_id
        ) VALUES (
            :title, 
            :description, 
            :city, 
            :type, 
            :search_type, 
            :cohabitation_rules, 
            :preferred_roommate_criteria, 
            :status, 
            :user_id
        )";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            'title' => $data['title'],
            'description' => $data['description'],
            'city' => $data['city'],
            'type' => $data['type'],
            'search_type' => $data['search_type'],
            'cohabitation_rules' => $data['cohabitation_rules'],
            'preferred_roommate_criteria' => $data['preferred_roommate_criteria'],
            'status' => 'pending',
            'user_id' => $data['user_id']
        ]);

        $announcementId = $this->connection->lastInsertId();

      
        $sqlOffer = "INSERT INTO offer_announcements (
            announcement_id,
            price,
            address,
            capacity
        ) VALUES (
            :announcement_id,
            :price,
            :address,
            :capacity
        )";

        $stmtOffer = $this->connection->prepare($sqlOffer);
        $stmtOffer->execute([
            'announcement_id' => $announcementId,
            'price' => $data['price'],
            'address' => $data['address'],
            'capacity' => $data['capacity']
        ]);


        if (!empty($data['photos'])) {
            $sqlPhoto = "INSERT INTO offer_photos (offer_id, photo_url) VALUES (:offer_id, :photo_url)";
            $stmtPhoto = $this->connection->prepare($sqlPhoto);

            $photoUrls = explode(',', $data['photos']);
            foreach ($photoUrls as $photoUrl) {
                if (!empty(trim($photoUrl))) {
                    $stmtPhoto->execute([
                        'offer_id' => $announcementId,
                        'photo_url' => trim($photoUrl)
                    ]);
                }
            }
        }

        $this->connection->commit();
        return true;
}

} 
