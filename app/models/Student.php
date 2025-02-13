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