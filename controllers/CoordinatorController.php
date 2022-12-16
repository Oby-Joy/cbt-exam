<?php

namespace App\Http\Controllers;

use App\Models\Coordinator;
use App\Models\Course;
use App\Models\Name;
use App\Models\Question;
use App\Models\Student;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CoordinatorController extends Controller
{
    public function __construct(){
        $this->middleware('auth:coordinator');
    }
    
    public function index(){
        return view('coordinator.index');
    }

    public function students(){
        $students = Student::all();

        return view('coordinator.students', compact('students')); 
    }

    public function showStudent($id){
        $student = Student::findOrFail($id);
        return view('coordinator.show-student', compact('student'));
    }

    public function courses(){
        $courses = Course::all();

        return view('coordinator.courses', compact('courses'));
    }

    public function staff(){
        $workers = Worker::all();

        return view('coordinator.staff', compact('workers'));
    }

    public function examReview(){ 
        $courses = Name::all();

        return view('coordinator.exam-review', compact('courses'));
    }

    public function viewExam($id){
        $course = Name::findOrFail($id);

        return view('coordinator.view-exam', compact('course'));
    }

    public function updateQuestion($id){
        request()->validate([
            'date' => 'required',
            'duration' => 'required',
            'attempt' => 'required',
            'marks' => 'required',
        ]);

        $course = Name::findOrFail($id);

        $course->approved = true;;
        $course->date = request('date');
        $course->duration = request('duration');
        $course->attempt = request('attempt');
        $course->marks = request('marks');

        $course->update();

        Session::flash('success', 'Questions for '. $course->course. ' have been approved and the date for exam has been set');

        return redirect('/coordinator/exam-review');
    }

    public function examScores(){
        return view('coordinator.exam-scores');
    }

    public function profile(){
        return view('coordinator.coordinator-profile');
    }

    public function changePassword(){
        return view('coordinator.change-password');
    }

    public function updatePassword(Request $request){
        //Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        //Match the old password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't Match");
        }

        //Update the new  password
        Coordinator::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password changed successfully");
    }

    //Making changes to vendor/laravel/illuminate/contracts/auth/statefulguard.php changes the authentications
}
