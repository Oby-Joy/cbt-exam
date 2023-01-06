<?php
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CoordinatorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { 
    return redirect('/login');
});

Route::get('/admin/home', [HomeController::class, 'index']);

//Admin

//Courses
Route::get('/admin/view-courses', [HomeController::class, 'viewCourse']);

Route::get('/admin/create-course', [HomeController::class, 'addCourse']);

Route::post('/admin/create-course', [HomeController::class, 'addCourseName']);

Route::get('/admin/assign-course', [HomeController::class, 'assignCourse']);

Route::post('/admin/assign-course', [HomeController::class, 'storeCourse']);

//Staff
Route::get('/admin/view-workers', [HomeController::class, 'viewWorkers']);

Route::get('/admin/add-staff', [HomeController::class, 'createStaff']);

Route::post('/admin/create-staff', [HomeController::class, 'storeStaff']);

Route::post('/admin', [HomeController::class, 'storeStaff']);

//Students
Route::get('/admin/view-students', [HomeController::class, 'viewStudent']);

Route::get('/admin/create-students', [HomeController::class, 'createStudent']);

Route::post('/admin/create-students', [HomeController::class, 'storeStudent']);

//Wildcards
Route::get('/admin/{staff}', [HomeController::class, 'viewWorker']);

Route::get('/admin/student/{student}', [HomeController::class, 'showStudent']);

Route::get('/admin/{staff}/edit-staff', [HomeController::class, 'editStaff']);

Route::patch('/admin/{staff}', [HomeController::class, 'updateStaff']);

Route::delete('/admin/{staff}', [HomeController::class, 'destroyStaff']);

Route::get('/admin/student/{student}/edit-student', [HomeController::class, 'editStudent']);

Route::patch('/admin/student/{student}', [HomeController::class, 'updateStudent']);

Route::delete('/admin/student/{student}', [HomeController::class, 'destroyStudent']);

//Statistics, Profile, and Password
Route::get('/statistics', [HomeController::class, 'statistics']);

Route::get('/profile', [HomeController::class, 'profile']);

Route::get('/change-password', [HomeController::class, 'changePassword']);

Route::post('/change-password', [HomeController::class, 'updatePassword']);



//Coordinator
//Authentication
//Login Routes
Route::get('/coordinator/login', [LoginController::class, 'showCoordinatorLoginForm']);

Route::post('/coordinator/login', [LoginController::class, 'CoordinatorLogin']);

Route::get('/coordinator/logout', [CoordinatorAuthController::class, 'logout']);

//Registration Routes
Route::get('/coordinator/register', [RegisterController::class, 'showCoordinatorRegisterForm']);

Route::post('/coordinator/register', [RegisterController::class, 'createCoordinator']);

Route::get('/coordinator/home', [CoordinatorController::class, 'index']);

//Pages
Route::get('/coordinator/students', [CoordinatorController::class, 'students']);

Route::get('/coordinator/courses', [CoordinatorController::class, 'courses']);

Route::get('/coordinator/staff', [CoordinatorController::class, 'staff']);

Route::get('/coordinator/exam-review', [CoordinatorController::class, 'examReview']);

Route::get('/coordinator/exam-scores', [CoordinatorController::class, 'examScores']);

Route::get('/coordinator/profile', [CoordinatorController::class, 'profile']);

Route::get('/coordinator/change-password', [CoordinatorController::class, 'changePassword']);

Route::post('/coordinator/change-password', [CoordinatorController::class, 'updatePassword']);

Route::get('/coordinator/{student}', [CoordinatorController::class, 'showStudent']);

Route::get('/coordinator/view-exam/{course}', [CoordinatorController::class, 'viewExam']);

Route::patch('/coordinator/view-exam/{course}', [CoordinatorController::class, 'updateQuestion']);

//Staff
//Authentication
Route::get('/staff/login', [LoginController::class, 'showStaffLoginForm']);

Route::post('/staff/login', [LoginController::class, 'staffLogin']);

Route::get('/staff/home', [StaffController::class, 'index']);

//Pages
Route::get('/staff/students', [StaffController::class, 'students']);

Route::get('/staff/choose-course', [StaffController::class, 'chooseCourse']);

Route::get('/staff/select-course', [StaffController::class, 'selectCourse']);

Route::post('/staff/store-questions/{course}', [StaffController::class, 'storeQuestions']);

Route::get('/staff/review-questions', [StaffController::class, 'reviewQuestions']);

Route::get('/staff/exam-scores', [StaffController::class, 'examScores']);

Route::get('/staff/profile', [StaffController::class, 'profile']);

Route::get('/staff/change-password', [StaffController::class, 'changePassword']);

Route::post('/staff/change-password', [StaffController::class, 'updatePassword']);

Route::get('/staff/add-questions/{course}', [StaffController::class, 'addQuestions']);

Route::get('/staff/add-answers/{course}', [StaffController::class, 'addAnswers']);

Route::get('/staff/show-questions/{course}', [StaffController::class, 'showQuestions']);

Route::post('/staff/store-answers/{course}', [StaffController::class, 'storeAnswers']);


//Student
//Authentication
Route::get('/student/login', [LoginController::class, 'showStudentLoginForm']);

Route::post('/student/login', [LoginController::class, 'studentLogin']);

Route::get('/student/home', [StudentController::class, 'index']);

//Pages
Route::get('/student/courses', [StudentController::class, 'courses']);

Route::get('/student/profile', [StudentController::class, 'profile']);

Route::get('/student/results', [StudentController::class, 'results']);

Route::get('/student/cbt', [StudentController::class, 'cbt']);

Route::get('/student/cbt-exam/{course}', [StudentController::class, 'exam']);

Route::post('/student/exam-submit', [StudentController::class, 'submit']);

Route::get('/logout', [StudentController::class, 'logout']);



Auth::routes();


