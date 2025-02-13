<?php 
require_once (__DIR__.'/../models/User.php');
require_once (__DIR__.'/../models/Announcement.php');
require_once (__DIR__.'/../models/Admin.php');

class AdminController extends BaseController {
    private $UserModel ;
    private $AnnouncementModel;
    private $AdminModel;
    public function __construct(){

        $this->UserModel = new User();
        $this->AnnouncementModel = new Announcement();
        $this->AdminModel = new Admin();
        
     }

     public function ShowDashboard(){
      $totalUsers = $this->AdminModel->getTotalUsers();
      $totalAnnouncements = $this->AdminModel->getTotalAnnouncements();
      $totalAnnouncementsActive = $this->AdminModel->getTotalAnnouncementsActive();
      $totalSignals = $this->AdminModel->getTotalSignals();
      $data = [
        'totalUsers' => $totalUsers,
        'totalAnnouncements' => $totalAnnouncements,
        'totalAnnouncementsActive' => $totalAnnouncementsActive,
        'totalSignals' => $totalSignals
      ];
      $this->render('admin/dashboard', $data);
     }
     public function Showlistings(){
      $announcements = $this->AnnouncementModel->getAllAnnacementsAdmin();
      $totalUsers = $this->AdminModel->getTotalUsers();
      $data = [
        'announcements' => $announcements
        
        
      ];
      $this->render('admin/listings', $data);
     }
     public function Showusers(){
      $this->render('admin/users');
     }
     public function Showreports(){
      $this->render('admin/reports');
     }
     public function Showsettings(){
      $this->render('admin/settings');
     }

     public function handleDeleteAnnouncement($id){
      $this->AnnouncementModel->deleteAnnouncementAdmin($id);
      header("Location: /admin/listings");
      exit;
     }
     public function handleActivateAnnouncement($id){
      $this->AnnouncementModel->activateAnnouncement($id);
      header("Location: /admin/listings");
      exit;
     }
     public function handleDeactivateAnnouncement($id){
      $this->AnnouncementModel->deactivateAnnouncement($id);   
      header("Location: /admin/listings");
      exit;
     }


   public function index() {
      
      if(!isset($_SESSION['user_loged_in_id'])){
         header("Location: /login ");
         exit;
      }
     $statistics =  $this->UserModel->getStatistics();      
    $this->renderDashboard('admin/index', ["statistics" => $statistics]);
   }
   
   public function categories() {

    $this->renderDashboard('admin/categories');
   }
   public function testimonials() {
 
    $this->renderDashboard('admin/testimonials');
   }
   public function projects() {
  
    $this->renderDashboard('admin/projects');
   }

   




 

}