<?php 
require_once (__DIR__.'/../models/User.php');

class AdminController extends BaseController {
    private $UserModel ;
    public function __construct(){

        $this->UserModel = new User();
  
        
     }
     public function ShowDashboard(){
      $this->render('admin/dashboard');
     }
     public function Showlistings(){
      $this->render('admin/listings');
     }
     public function Showusers(){
      $AllUsers =  $this->UserModel->getAllUsers();      
      $this->render('admin/users', ["AllUsers" => $AllUsers]);
     }
     public function RemoveUsers(){

      if ($_SERVER["REQUEST_METHOD"] == "POST"){
         if (isset($_POST['deleteuser'])) {
             
             $id = $_POST['user_id'];
     $this->UserModel->removeUsers($id);      

           
             
         }
     }
     header('Location: /admin/users');

     }
     public function blockUsers(){

      if ($_SERVER["REQUEST_METHOD"] == "POST"){
         if (isset($_POST['block_user'])) {
           
             $status = $_POST['status'];
            

             $id = $_POST['id'];

     $this->UserModel->blockUsers($status,$id);      

           
             
         }
     }
     header('Location: /admin/users');

     }
     
     public function Showreports(){
      $this->render('admin/reports');
     }
     public function Showsettings(){
      $this->render('admin/settings');
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

   public function handleUsers(){
  


    
    // Get filter and search values from GET
    $filter = isset($_GET['filter']) ? $_GET['filter'] : 'all'; // Default to 'all' if no filter is selected
    $userToSearch = isset($_GET['userToSearch']) ? $_GET['userToSearch'] : ''; // Default to empty if no search term is provided
    // var_dump($userToSearch);die();

    // Call showUsers with both filter and search term
    $users = $this->UserModel->getAllUsers($filter, $userToSearch);
    $this->renderDashboard('admin/users',["users"=> $users]);
   }

    // function to remove user
    // function removeUser($idUser){
    //     include '../connection.php';
    //     $removeUser = $conn->prepare("DELETE FROM utilisateurs WHERE id_utilisateur=?");
    //     $removeUser->execute([$idUser]);
    // }
    
    // // check the post request to remove the user
    // if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['remove_user'])) {
    //     $idUser = $_POST['remove_user'];
    //     removeUser($idUser);
    //     // Redirect to avoid form resubmission after page reload
    //     header("Location: users.php");
    //     exit();
    // }

    // // function to block user
    // function changeStatus($idUser){
    //     include '../connection.php';

    //     // get the old status
    //     $stmt = $conn->prepare("SELECT is_active FROM utilisateurs WHERE id_utilisateur = ?");
    //     $stmt->execute([$idUser]);
    //     $currentStatus = $stmt->fetchColumn();

    //     $changeStatus = $conn->prepare("UPDATE utilisateurs SET is_active=? WHERE id_utilisateur=?");
    //     $changeStatus->execute([$currentStatus==0?1:0,$idUser]);
    // }
    // // check the post request to block the user
    // if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['block_user_id'])) {
    //     $idUser = $_POST['block_user_id'];
    //     changeStatus($idUser);
    //     // Redirect to avoid form resubmission after page reload
    //     header("Location: users.php");
    //     exit();
    // }





 

}