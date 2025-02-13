<?php 
require_once (__DIR__.'/../models/User.php');
require_once (__DIR__.'/../models/Announcement.php');

class AdminController extends BaseController {
    private $UserModel ;
    private $AnnouncementModel;
    public function __construct(){

        $this->UserModel = new User();
        $this->AnnouncementModel = new Announcement();
        
     }

     public function ShowDashboard(){
      $this->render('admin/dashboard');
     }
     public function Showlistings(){
      $announcements = $this->AnnouncementModel->getAllAnnacementsAdmin();
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
      $this->AnnouncementModel->deleteAnnouncement($id);
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