
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
  
   public function Showreports()
   {
      $reports = $this->UserModel->getReports();
      $this->render('admin/reports', ["reports" => $reports]);
   }
   public function Showsettings()
   {
      $this->render('admin/settings');

   }

   public function index() {
      
      if(!isset($_SESSION['user_loged_in_id'])){

         header("Location: /login ");
         exit;
      }
      $statistics =  $this->UserModel->getStatistics();
      $this->renderDashboard('admin/index', ["statistics" => $statistics]);
   }

   public function categories()
   {

      $this->renderDashboard('admin/categories');
   }
   public function testimonials()
   {

      $this->renderDashboard('admin/testimonials');
   }
   public function projects()
   {

      $this->renderDashboard('admin/projects');
   }
   public function updateReport()
   {

      $reportId = $_POST['report_id'];
      $status = $_POST['status'];
      $adminNote = $_POST['admin_note'];

      $success = $this->UserModel->updateReportStatus($reportId, $status, $adminNote);

      if ($success) {
         header('Location: /admin/reports?success=1');
      } else {
         header('Location: /admin/reports?error=1');
      }
      exit;
   }


