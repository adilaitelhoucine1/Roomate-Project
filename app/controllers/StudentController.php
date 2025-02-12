
<?php 
require_once (__DIR__.'/../models/User.php');

require_once (__DIR__.'/../models/Student.php');


class StudentController extends BaseController {
    private $UserModel ;
   
    private $StudentModel;
    public function __construct(){

        $this->UserModel = new User();
      
        $this->StudentModel = new Student();
  
        
     }
     public function ShowDashboard() {

     

        // if ($_SESSION['user_role'] !== 'Apprenant') {
        //     header("Location: /login");
        //     exit;
        // }
      //  $user_status = $this->UserModel->getUserStatus($_SESSION['user_id']);
   
    //    if($user_status === "inactif"){
    //     header("Location: /account_inactive");
    //     exit;
    //    }

        // $user_id = $_SESSION['user_id'];
        // $user_name = $_SESSION['user_name'];
      
        
        $this->render('student/dashboard');
    }
     public function Showannouncements() { 
        $this->render('student/announcements');
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




}
?>