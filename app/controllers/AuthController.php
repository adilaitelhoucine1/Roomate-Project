<?php 
require_once (__DIR__.'/../models/User.php');

class AuthController extends BaseController {
 
    private $UserModel;

    public function __construct() {
        $this->UserModel = new User();
    }

    public function showRegister() {
        $this->render('auth/register');
    }

    public function handleRegister() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get all form inputs
            $userData = [
                'email' => $_POST['email'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                'fullname' => $_POST['fullname'],
                'gender' => $_POST['gender'],
                'study_year' => $_POST['study_year'],
                'city_origin' => $_POST['city_origin'],
                'current_city' => $_POST['current_city'],
                'bio' => $_POST['bio'],
                'profile_photo' => $_POST['profile_photo'],
                'smoking' => $_POST['smoking'],
                'pets' => $_POST['pets'],
                'guests' => $_POST['guests']
            ];

            $userId = $this->UserModel->register($userData);
            
            if ($userId) {
                header('Location: /login');
                exit();
            } else {
                header('Location: /register');
                exit();
            }
        }
    }

    public function showleLogin() {
        $this->render('auth/login');
    }
   
   public function handleLogin(){


      if ($_SERVER["REQUEST_METHOD"] == "POST"){
          if (isset($_POST['login'])) {
              $email = $_POST['email'];
              $password = $_POST['password'];
              $userData = [$email,$password];
              $user = $this->UserModel->login($userData);
              $role = $user['role'] ; 
            // var_dump($user);die();
              $_SESSION['user_loged_in_id'] = $user["id_utilisateur"];
              $_SESSION['user_loged_in_role'] = $role;
              $_SESSION['user_loged_in_nome'] = $user['nom_utilisateur'];
  
              if ($user && $role == 1) {
                  header('Location: /admin/dashboard');
              } else if ($user && $role == 2) {
                  header('Location: Client/dashboard.php');
              } else if ($user && $role == 3) {
                  header('Location: Freelancer/dashboard.php');
              } 
             
          }
      }
 

   }

   public function logout() {

      
      // if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["logout"])) {
      //  var_dump($_SESSION);die();
         if (isset($_SESSION['user_loged_in_id']) && isset($_SESSION['user_loged_in_role'])) {
             unset($_SESSION['user_loged_in_id']);
             unset($_SESSION['user_loged_in_role']);
             session_destroy();
            
             header("Location: /login");
             exit;
         }
   //   }
   }



}