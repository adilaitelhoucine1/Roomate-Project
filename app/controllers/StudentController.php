<?php 
require_once (__DIR__.'/../models/User.php');
require_once (__DIR__.'/../models/Student.php');
require_once (__DIR__.'/../models/Announcement.php');
require_once (__DIR__.'/../models/searchmodel.php');

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
        $data = $this->AnnouncementModel->getallanounces();
        $this->render('student/search',$data);
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

   
}
?>