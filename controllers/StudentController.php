<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Course;
use App\Models\ExamAnswer;
use App\Models\ExamAttempt;
use App\Models\Name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
   public function __construct(){
        $this->middleware('auth:student');
    }

    public function index(){
        return view('student.index');
    }

    public function courses(){
        $courses = Course::all();

        return view('student.courses', compact('courses'));
    }

    public function profile(){
        return view('student.profile');
    }

    public function results(){
        $exams = Name::with('questions')->get();

        return view('student.results', compact('exams'));
    }

    public function cbt(){
        $courses = Name::all();

        return view('student.cbt', compact('courses'));
    }

    public function exam($id){
        $courses = Name::findOrFail($id);
        $date = date('Y-m-d');

        $attemptCount = ExamAttempt::where(['exam_id' => $courses->id, 'student_id' => auth()->user()->id])->count();
        if($courses->approved == false){
            return view('student.exam', ['success' => false, 'msg' => 'This exam has not been approved by the course coordinator', 'courses' => $courses]);
        }
        else if($attemptCount >= $courses->attempt){
            return view('student.exam', ['success' => false, 'msg' => 'You have already taken this exam', 'courses' => $courses]);
        }
        else if($courses->date > $date){
            return view('student.exam', ['success' => false, 'msg' => 'The date for this exam has passed', 'courses' => $courses]);
        }
        else if($courses->date < $date){
            return view('student.exam', ['success' => false, 'msg' => 'The date for this exam has not reached', 'courses' => $courses]);
        }
        else{
            return view('student.exam', ['success'=>true, 'courses' => $courses]);
        }

        //return view('student.exam', compact('courses'));
    }

    public function submit(Request $request){
        $attempt_id = ExamAttempt::insertGetId([
            'exam_id' => $request->exam_id,
            'student_id' => Auth::user()->id
        ]);

        $qcount = count($request->q);

        if($qcount > 0){
            for($i = 0; $i < $qcount; $i++){
                if(!empty($request->input('ans_'.($i + 1)))){
                    ExamAnswer::insert([
                        'attempt_id' => $attempt_id,
                        'question_id' => $request->q[$i],
                        'answer_id' => request()->input('ans_'.($i + 1)),
                    ]); 
                }
            }
            
        }

        return view('student.thank-you');

        //return $request->all();
    }

    public function logout(Request $request){
        $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }
}
