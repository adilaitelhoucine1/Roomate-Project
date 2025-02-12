<?php
require_once(__DIR__.'/../config/db.php');

class Announcement extends Db {

    protected $connection;

    public function __construct()
    {
        parent::__construct();
        $this->connection = $this->getConnection();
    }

    public function create($data, $photos) {
        try {
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
            $stmt->execute($data);
            $announcementId = $this->connection->lastInsertId();

            // Insert into offer_announcements table
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

            // Insert photos
            if (!empty($photos['tmp_name'])) {
                $sqlPhoto = "INSERT INTO offer_photos (offer_id, photo_url) VALUES (:offer_id, :photo_url)";
                $stmtPhoto = $this->connection->prepare($sqlPhoto);

                foreach ($photos['tmp_name'] as $key => $tmp_name) {
                    $fileName = uniqid() . '_' . $photos['name'][$key];
                    $uploadPath = 'uploads/offers/' . $fileName;
                    
                    if (move_uploaded_file($tmp_name, $_SERVER['DOCUMENT_ROOT'] . '/' . $uploadPath)) {
                        $stmtPhoto->execute([
                            'offer_id' => $announcementId,
                            'photo_url' => $uploadPath
                        ]);
                    }
                }
            }

            $this->connection->commit();
            return true;

        } catch (Exception $e) {
            $this->connection->rollBack();
            throw $e;
        }
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
} 