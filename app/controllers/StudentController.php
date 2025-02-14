<?php 
require_once (__DIR__.'/../models/User.php');
require_once (__DIR__.'/../models/Student.php');
require_once (__DIR__.'/../models/Announcement.php');
require_once (__DIR__.'/../models/searchmodel.php');
require_once (__DIR__.'/../models/Message.php');

class StudentController extends BaseController {
    private $UserModel;
    private $StudentModel;
    private $AnnouncementModel;
    private $MessageModel;

    public function __construct(){
        $this->UserModel = new User();
        $this->StudentModel = new Student();
        $this->AnnouncementModel = new Announcement();
        $this->MessageModel = new Message();
    }
    public function ShowDashboard() {
        $data = $this->AnnouncementModel->getallanounces();
        $this->render('student/dashboard',$data);
    }

     public function Showsearch() { 
        $data = $this->AnnouncementModel->getallanounces();
        $this->render('student/search',$data);
    }
     public function Showmessages() { 
        $userId = $_GET['user'] ?? null;
        $announcementId = $_GET['announcement'] ?? null;
        
        $conversations = $this->MessageModel->getConversations($_SESSION['user_id']);
        $activeConversation = null;
        $messages = [];
        
        if ($userId) {
            $activeConversation = $this->UserModel->getUserById($userId);
            $messages = $this->MessageModel->getMessagesBetweenUsers($_SESSION['user_id'], $userId);
        }
        
        $this->render('student/messages', [
            'conversations' => $conversations,
            'activeConversation' => $activeConversation,
            'messages' => $messages,
            'announcementId' => $announcementId
        ]);
    }
     public function Showprofile() { 
        $user = $this->StudentModel->GetinfoUSer($_SESSION['user_id']);
        $this->render('student/profile', ['user' => $user]);
    }

    public function storeAnnouncement() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'title' => htmlspecialchars($_POST['title']),
                'description' => htmlspecialchars($_POST['description']),
                'city' => htmlspecialchars($_POST['city']),
                'type' => htmlspecialchars($_POST['type']),
                'search_type' => htmlspecialchars($_POST['search_type']),
                'cohabitation_rules' => htmlspecialchars($_POST['cohabitation_rules']),
                'preferred_roommate_criteria' => htmlspecialchars($_POST['preferred_roommate_criteria']),
                'user_id' => $_SESSION['user_id'],
                'status' => 'pending',
                'price' => htmlspecialchars($_POST['price']),
                'address' => htmlspecialchars($_POST['address']),
                'capacity' => htmlspecialchars($_POST['capacity']),
                'photos' => htmlspecialchars($_POST['photos'])
            ];

    
                if ($this->AnnouncementModel->createAnnouncement($data)) {
                    header('Location: /student/announcements');
                    exit;
                }
         
        }
    }

    public function Showannouncements() { 
        $announcements = $this->AnnouncementModel->getallanouncesbyuser();
        $this->render('student/announcements', $announcements);
    }

    public function deleteAnnouncement() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['announcement_id'])) {
            $announcementId = $_POST['announcement_id'];
                if ($this->AnnouncementModel->deleteAnnouncement($announcementId, $_SESSION['user_id'])) {
                    header('Location: /student/announcements');
                    exit;
                }
           
        }
    }

    public function editAnnouncement($id) {
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'id' => $id,  
                'title' =>$_POST['title'],
                'description' =>$_POST['description'],
                'city' =>$_POST['city'],
                'type' =>$_POST['type'],
                'search_type' =>$_POST['search_type'],
                'cohabitation_rules' =>$_POST['cohabitation_rules'],
                'preferred_roommate_criteria' =>$_POST['preferred_roommate_criteria'],
                'user_id' => $_SESSION['user_id'],
                'price' =>$_POST['price'],
                'address' =>$_POST['address'],
                'capacity' =>$_POST['capacity'],
                'photos' =>$_POST['photos']
            ];

            $this->AnnouncementModel->updateAnnouncement($data);
               
        }

        header('Location: /student/announcements');
        exit;
    }

    public function updateProfile() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'id' => $_SESSION['user_id'],
                'fullname' => $_POST['fullname'],
                'email' => $_POST['email'],
                'gender' => $_POST['gender'],
                'city_origin' => $_POST['city_origin'],
                'current_city' => $_POST['current_city'],
                'bio' => $_POST['bio'],
                'smoking' => $_POST['smoking'],
                'pets' => $_POST['pets'],
                'guests' => $_POST['guests']
            ];

            if ($this->StudentModel->updateProfileUser($data)) {
                header('Location: /student/profile?success=true');
                exit;
            } else {
                header('Location: /student/profile?error=true');
                exit;
            }
        }
    }

    public function DesactiverAccoutStudent($id) {
        //if ($id == $_SESSION['user_id']) {
            $this->StudentModel->desactivateUserStudent($id);
                session_destroy();
                header('Location: /login?deactivated=true');
                exit;
           // }
    
    }

    // Envoyer un nouveau message
    public function sendMessage() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $senderId = $_SESSION['user_id'];
            $receiverId = $_POST['receiver_id'];
            $content = $_POST['content'];
            $imageUrl = null;

            // Handle image upload if present
            if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                $imageUrl = $this->handleImageUpload($_FILES['image']);
            }

            // Send message
            if ($this->MessageModel->sendMessage($senderId, $receiverId, $content, $imageUrl)) {
                // Redirect back to the conversation
                header("Location: /student/messages?user=" . $receiverId);
                exit;
            } else {
                // Handle error
                header("Location: /student/messages?user=" . $receiverId . "&error=1");
                exit;
            }
        }
    }

    private function handleImageUpload($file) {
        $uploadDir = 'uploads/messages/';
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $fileName = uniqid() . '_' . basename($file['name']);
        $targetPath = $uploadDir . $fileName;

        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            return $targetPath;
        }
        return null;
    }
}
?>