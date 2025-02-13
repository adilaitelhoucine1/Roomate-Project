<?php
require_once(__DIR__ . '/User.php');
class Admin extends User
{
    protected $connection;

    public function __construct()
    {
        parent::__construct();
        $this->connection = $this->getConnection();
    }

    public function getTotalUsers()
    {
        $sql = "SELECT COUNT(*) as total_users FROM users";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total_users'];
    }

    public function getTotalAnnouncements()
    {
        $sql = "SELECT COUNT(*) as total_announcements FROM announcements";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total_announcements'];
    }
    public function getTotalAnnouncementsActive()
    {
        $sql = "SELECT COUNT(*) as total_announcements FROM announcements WHERE status = 'active'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total_announcements'];
    }

    public function getPendingSignals()
    {
        $sql = "SELECT COUNT(*) as pending_signals FROM reports where status = 'pending'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['pending_signals'];
    }
    public function getTotalSignals()
    {
        $sql = "SELECT COUNT(*) as total_signals FROM reports";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total_signals'];
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
}
