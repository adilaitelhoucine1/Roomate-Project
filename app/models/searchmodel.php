<?php 
require_once(__DIR__.'/../config/db.php');

class search_API extends db{

    public function __construct() {
        parent::__construct();
        $this->connection = $this->getConnection();
    }

    public function searchAnnouncements($query){
        try{
            $query = "%$query%";
                $sql = "SELECT 
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
                        WHERE
                            a.title LIKE :query OR a.description LIKE :query";
                
                $stmt = $this->connection->prepare($sql);
                $stmt->bindParam(':query', $query);
                $stmt->execute();
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $results;
            
    } catch(PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
}
// public function filterbycity($query){
//     try{
//         $query = "%$query%";
//             $sql = "SELECT 
//                         a.*, 
//                         oa.price, 
//                         oa.address, 
//                         oa.equipment, 
//                         oa.capacity, 
//                         oa.is_available, 
//                         op.photo_url
//                     FROM 
//                         announcements a
//                     LEFT JOIN 
//                         offer_announcements oa ON a.id = oa.announcement_id
//                     LEFT JOIN 
//                         request_announcements ra ON a.id = ra.announcement_id
//                     LEFT JOIN 
//                         offer_photos op ON op.offer_id = oa.announcement_id
//                     WHERE
//                         a.city = :query";
            
//             $stmt = $this->connection->prepare($sql);
//             $stmt->bindParam(':query', $query);
//             $stmt->execute();
//             $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
//             return $results;
        
// } catch(PDOException $e) {
//     echo json_encode(['error' => $e->getMessage()]);
// }
// }
}
