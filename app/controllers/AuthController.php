<?php 
require_once (__DIR__.'/../models/User.php');


class AuthController extends BaseController {
 
    private $UserModel ;
   public function __construct(){

      $this->UserModel = new User();

      
   }

   public function showRegister() {
      
    $this->render('auth/register');
   }
   public function showleLogin() {
      
    $this->render('auth/login');
   }

   
   public function handleRegister() {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

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
   public function handleLogin() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['login_btn'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $userData = [$email, $password];
            $user = $this->UserModel->login($userData);

            if ($user) {
               

                $_SESSION['user_id'] = $user["id_user"];
                $_SESSION['user_role'] = $user['role'];
                $_SESSION['user_name'] = $user['nom'];
                if ($user['role'] == "Formateur") {
                    header('Location: /Formateur/dashboard');
                } else if ($user['role'] == "Apprenant") {
                    header('Location: /Etudiant/dashboard');
                }
                exit;
            }
            
            // Si échec de connexion
            header('Location: /ss');
            exit;
        }
    }
}

   public function logout() {

      
      // if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["logout"])) {
      //  var_dump($_SESSION);die();
         if (isset($_SESSION['user_id']) && isset($_SESSION['user_role'])) {
             unset($_SESSION['user_id']);
             unset($_SESSION['user_role']);
             session_destroy();
            
             header("Location: /login");
             exit;
         }
   //   }
   }



}