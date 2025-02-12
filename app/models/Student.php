<?php
require_once(__DIR__.'/../config/db.php');
class Student extends Db {
    protected $connection;

    public function __construct() {
        parent::__construct();
        $this->connection = $this->getConnection();
    }

    public function getallanouncesbyuser($user_id) {
        $sql = "SELECT 
                    a.*,
                    oa.price,
                    oa.address,
                    oa.capacity,
                    GROUP_CONCAT(op.photo_url) as photos
                FROM announcements a
                LEFT JOIN offer_announcements oa ON a.id = oa.announcement_id
                LEFT JOIN offer_photos op ON a.id = op.offer_id
                WHERE a.user_id = :user_id
                GROUP BY a.id
                ORDER BY a.creation_date DESC";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['user_id' => $user_id]);
        $announcements = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Convert photo string to array
        foreach ($announcements as &$announcement) {
            $announcement['photos'] = $announcement['photos'] ? explode(',', $announcement['photos']) : [];
        }

        return $announcements;
    }

    public function createAnnouncement($data) {
        try {
            $this->connection->beginTransaction();

            // 1. Insert base announcement
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

            // 2. Insert offer announcement
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

            // 3. Handle photo URLs
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

        } catch (Exception $e) {
            $this->connection->rollBack();
            throw $e;
        }
    }

    public function deleteAnnouncement($id, $user_id) {
        $sql = "DELETE FROM announcements WHERE id = :id AND user_id = :user_id";
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute(['id' => $id, 'user_id' => $user_id]);
    }

    public function getAnnouncementById($id, $user_id) {
        $sql = "SELECT 
                    a.*,
                    oa.price,
                    oa.address,
                    oa.capacity,
                    GROUP_CONCAT(op.photo_url) as photos
                FROM announcements a
                LEFT JOIN offer_announcements oa ON a.id = oa.announcement_id
                LEFT JOIN offer_photos op ON a.id = op.offer_id
                WHERE a.id = :id AND a.user_id = :user_id
                GROUP BY a.id";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['id' => $id, 'user_id' => $user_id]);
        $announcement = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($announcement) {
            $announcement['photos'] = $announcement['photos'] ? explode(',', $announcement['photos']) : [];
        }

        return $announcement;
    }
}
?>