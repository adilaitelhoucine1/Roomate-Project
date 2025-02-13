<?php
session_start();



require_once ('../core/BaseController.php');
require_once '../core/Router.php';
require_once '../core/Route.php';
require_once '../app/controllers/HomeController.php';
require_once '../app/controllers/AuthController.php';
require_once '../app/controllers/StudentController.php';
require_once '../app/controllers/AdminController.php';
require_once '../app/config/db.php';



$router = new Router();
Route::setRouter($router);



// Define routes
// auth routes 
Route::get('/', [HomeController::class, 'ShowHome']);


Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/ValidateRegister', [AuthController::class, 'handleRegister']);
Route::get('/login', [AuthController::class, 'showleLogin']);
Route::post('/ValidateLogin', [AuthController::class, 'handleLogin']);
Route::get('/logout', [AuthController::class, 'logout']);

// admin routers
Route::get('/student/dashboard', [StudentController::class, 'ShowDashboard']);
Route::get('/student/announcements', [StudentController::class, 'Showannouncements']);
Route::get('/student/search', [StudentController::class, 'Showsearch']);
Route::get('/student/messages', [StudentController::class, 'Showmessages']);
Route::get('/student/profile', [StudentController::class, 'Showprofile']);

Route::post('/student/announcements/store', [StudentController::class, 'storeAnnouncement']);
Route::post('/student/announcements/delete', [StudentController::class, 'deleteAnnouncement']);
//Route::get('/student/announcements/edit/{id}', [StudentController::class, 'editAnnouncement']);
Route::post('/student/announcements/edit/{id}', [StudentController::class, 'editAnnouncement']);





Route::get('/admin/dashboard', [AdminController::class, 'ShowDashboard']);
Route::get('/admin/listings', [AdminController::class, 'Showlistings']);
Route::get('/admin/users', [AdminController::class, 'Showusers']);
Route::get('/admin/reports', [AdminController::class, 'Showreports']);
Route::get('/admin/settings', [AdminController::class, 'Showsettings']);

Route::get('/admin/delete/{id}', [AdminController::class, 'handleDeleteAnnouncement']);
Route::get('/admin/activate/{id}', [AdminController::class, 'handleActivateAnnouncement']);
Route::get('/admin/deactivate/{id}', [AdminController::class, 'handleDeactivateAnnouncement']);



// end admin routes 

// client Routes 
// Route::get('/client/dashboard', [ClientController::class, 'index']);



// Dispatch the request
$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);



