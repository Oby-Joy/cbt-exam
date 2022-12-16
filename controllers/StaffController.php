<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Course;
use App\Models\Name;
use App\Models\Question;
use App\Models\Student;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class StaffController extends Controller
{
    public function __construct(){
        $this->middleware('auth:worker'); 
    }

    public function index(){
        return view('staff.index');
    }

    public function students(){
        $students = Student::all();

        return view('staff.students', compact('students'));
    }

    public function chooseCourse(){
        $titles = Name::all();

        return view('staff.choose-course', compact('titles'));
    }

    public function addQuestions($id){
        $course = Name::findOrFail($id);

        return view('staff.add-questions', compact('course'));
    }

    public function storeQuestions(){
        $attributes = request()->validate([
            'name_id' => ['required'],
            'question' => ['required', 'min:10'],
        ]);
        
        Question::create($attributes);

        return back()->with("status", "Question Added successfully");
    }

    public function selectCourse(){
        $titles = Name::all();

        return view('staff.select-course', compact('titles'));
    }

    public function showQuestions($id){
        $courses = Name::findOrFail($id);

        return view('staff.show-questions',compact('courses'));
    }

    public function addAnswers($id){
        $question = Question::findOrFail($id);

        return view('staff.add-answers', compact('question'));
    }

    public function storeAnswers(){
        $attributes = request()->validate([
            'question_id' => ['required'],
            'answers' => ['required'],
            'is_correct' => ['required'],
        ]);

        Answer::create($attributes);

        return back()->with("status", "Option Added successfully");
    }

    public function reviewQuestions(){
        $questions = Question::all();

        return view('staff.review-questions', compact('questions')); 
    }

    public function examScores(){
        return view('staff.exam-scores');
    }

    public function profile(){
        return view('staff.profile');
    }

    public function changePassword(){
        return view('staff.password');
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
        Worker::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password changed successfully");
    }
}
