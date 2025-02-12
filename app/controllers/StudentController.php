<?php 
require_once (__DIR__.'/../models/User.php');
require_once (__DIR__.'/../models/Student.php');
require_once (__DIR__.'/../models/Announcement.php');

class StudentController extends BaseController {
    private $UserModel;
    private $StudentModel;
    private $AnnouncementModel;

    public function __construct(){
        $this->UserModel = new User();
        $this->StudentModel = new Student();
        $this->AnnouncementModel = new Announcement();
    }
    public function ShowDashboard() {
        $data = $this->AnnouncementModel->getallanounces();
        $this->render('student/dashboard',$data);
    }

     public function Showsearch() { 
        $this->render('student/search');
    }
     public function Showmessages() { 
        $this->render('student/messages');
    }
     public function Showprofile() { 
        $this->render('student/profile');
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

            try {
                if ($this->StudentModel->createAnnouncement($data)) {
                    header('Location: /student/announcements?success=true');
                    exit;
                }
            } catch (Exception $e) {
                header('Location: /student/announcements?error=true');
                exit;
            }
        }
    }

    public function Showannouncements() { 
        $announcements = $this->AnnouncementModel->getallanouncesbyuser();
        $this->render('student/announcements', $announcements);
    }
}
?>