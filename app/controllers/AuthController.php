<?php
require_once(__DIR__ . '/../models/User.php');
require_once(__DIR__ . '/../../vendor/autoload.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class AuthController extends BaseController
{

    private $UserModel;
    public function __construct()
    {

        $this->UserModel = new User();
    }


    public function showRegister()
    {

        $this->render('auth/register');
    }
    public function showleLogin()
    {

        $this->render('auth/login');
    }


    public function handleRegister()
    {

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
                'guests' => $_POST['guests'],
                'verified' => 1,
                'verification_code' => $_POST['verification_code']
            ];
            // die(json_encode($userData));


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
    public function handleLogin()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            $password = $_POST['password'];

            if ($this->UserModel->login($email, $password)) {
                // echo $_SESSION['user_role'];
                // die();
                if (isset($_SESSION['user_role'])) {
                    if ($_SESSION['user_role'] == "admin") {
                        header('Location: /admin/dashboard');
                    } else if ($_SESSION['user_role'] == "student") {
                        header('Location: student/dashboard');
                    }
                } else {
                    header('Location: /dashboard'); // Default redirect
                }
                exit();
            } else {

                header('Location: /login');
                exit();
            }
        }
    }

    public function  StudentDashboard()
    {
        $this->render("/student/dashboard");
    }

    public function logout()
    {


        if (isset($_SESSION['user_id']) && isset($_SESSION['user_role'])) {
            unset($_SESSION['user_id']);
            unset($_SESSION['user_role']);
            session_destroy();

            header("Location: /");
            exit;
        }
    }
    public function sendVerificationCode()
    {
        ob_start();

        header('Content-Type: application/json');

        try {
            $data = json_decode(file_get_contents('php://input'), true);
            $email = $data['email'] ?? null;

            if (!$email) {
                throw new Exception('Email required');
            }

            // Email validation
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new Exception('Invalid email format');
            }

            // Generate code
            $verificationCode = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
            $_SESSION['verification_code'] = $verificationCode;
            $_SESSION['verification_email'] = $email;

            // Configure PHPMailer
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->SMTPDebug = 0; // Disable debug output
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'youcoderooommate@gmail.com';
            $mail->Password = 'lbwxtocgpkhzmfyf';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            $mail->setFrom('youcoderooommate@gmail.com', 'RoomMate');
            $mail->addAddress($email);
            $mail->isHTML(true);

            $mail->Subject = 'Verification Code';
            $mail->Body = '
                <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f9fafb; border-radius: 10px;">
                    <div style="text-align: center; padding: 20px;">
                        <h1 style="color: #1f2937; margin-bottom: 20px;">Email Verification</h1>
                        <p style="color: #4b5563; margin-bottom: 30px;">Thank you for registering. Please use the verification code below to complete your registration:</p>
                        <div style="background-color: #ffffff; padding: 20px; border-radius: 8px; margin-bottom: 30px; border: 1px solid #e5e7eb;">
                            <h2 style="color: #1f2937; letter-spacing: 5px; font-size: 32px; margin: 0;">' . $verificationCode . '</h2>
                        </div>
                        <p style="color: #6b7280; font-size: 14px;">If you did not request this verification code, please ignore this email.</p>
                    </div>
                </div>';
            $mail->AltBody = 'Your verification code is: ' . $verificationCode;

            // Send email
            $mail->send();

            // Clear any output buffers
            ob_clean();

            // Send JSON response
            echo json_encode([
                'status' => 'success',
                'email' => $email
            ]);
        } catch (Exception $e) {
            ob_clean();
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }

        exit();
    }
    public function verifyCode()
    {
        header('Content-Type: application/json');

        // Get the JSON data from the request
        $data = json_decode(file_get_contents('php://input'), true);

        if (!$data || !isset($data['code']) || !isset($data['email'])) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Missing required data'
            ]);
            exit();
        }

        $code = $data['code'];
        $email = $data['email'];

        // Verify the code
        if ($this->validateVerificationCode($email, $code)) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Code verified successfully'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Invalid verification code'
            ]);
        }
        exit();
    }

    private function validateVerificationCode($email, $code)
    {

        $storedCode = $_SESSION['verification_code'] ?? null;
        $storedEmail = $_SESSION['verification_email'] ?? null;


        return $storedCode === $code && $storedEmail === $email;
    }
}
