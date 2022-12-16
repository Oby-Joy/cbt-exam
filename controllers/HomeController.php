<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Employee;
use App\Models\Name;
use App\Models\Number;
use App\Models\Student;
use App\Models\User;
use App\Models\Worker; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $students = Student::all();
        $workers = Worker::all();

        return view('admin.index', compact('students', 'workers'));
    }

    //Student
    public function createStudent(){
        $courses = Number::all();

        return view('admin.add-students', compact('courses'));
    }

    public function storeStudent(Request $request){
        request()->validate([
            'first_name' => ['required', 'min:3'],
            'last_name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'state_of_origin' => ['required', 'min:3'],
            'command' => ['required', 'min:4'],
            'apf' => ['required', 'min:6'],
            'gender' => 'required',
            'date_of_enlistment' => 'required',
            'qualification' => 'required',
            'year_of_birth' => 'required', 
            'course_number' => ['required'],
        ]);
        $student = new Student();
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->email = $request->email;
        $student->state_of_origin = $request->state_of_origin;
        $student->command = $request->command;
        $student->apf = $request->apf;
        $student->gender = $request->gender;
        $student->date_of_enlistment = $request->date_of_enlistment;
        $student->qualification = $request->qualification;
        $student->year_of_birth = $request->year_of_birth;
        $student->course_number = $request->course_number;
        $student->password = $request->last_name;

        $student->save();

        Session::flash('success', 'Student Added Successfully');

        return redirect('/admin/create-students');
    }

    public function viewStudent(){
        $students = Student::all();

        return view('admin.view-students', compact('students'));
    }

    public function editStudent($id){
        $student = Student::findOrFail($id);

        return view('admin.edit.edit-student', compact('student'));
    }

    public function updateStudent($id){

        $student = Student::findOrFail($id);

        $student->first_name = request('first_name');
        $student->last_name = request('last_name');
        $student->email = request('email');
        $student->state_of_origin = request('state_of_origin');
        $student->command = request('command');
        $student->apf = request('apf');
        $student->gender = request('gender');
        $student->date_of_enlistment = request('date_of_enlistment');
        $student->qualification = request('qualification');
        $student->year_of_birth = request('year_of_birth');
        $student->course_number = request('course_number');
        $student->password = request('last_name');

        $student->save();

        return redirect('/admin/view-students')->with('success', 'Student Updated');

    }

    public function showStudent($id){
        $student = Student::findOrFail($id);

        return view('admin.edit.show-student', compact('student'));
    }

    public function destroyStudent($id){
        Student::findOrFail($id)->delete();

        return redirect('/admin/view-students')->with('success', 'Student Deleted');
    } //----------------------------Student ends-------------------------------

    //Courses
    public function addCourse(){
        return view('admin.add-course');
    }

    public function assignCourse(){
        $courses = Name::all();

        return view('admin.assign-course', compact('courses'));
    }

    public function storeCourse(){
        $attributes = request()->validate([
            'title' => ['required', 'min:3'],
            'lecturer' => ['required', 'min:3'],
        ]);
        
        Course::create($attributes);

        Session::flash('success', 'Course Added Successfully');

        return redirect('/admin/assign-course');
    }

    public function viewCourse(){
        $courses = Course::all();

        return view('admin.view-course', compact('courses'));
    }

    public function addCourseName(){
        $data = request()->validate([
            'course' => ['required', 'min:3'], 
        ]);

        Name::create($data);

        Session::flash('success', 'Course Added Successfully');

        return redirect('/admin/create-course');
    }

    //Staff
    public function createStaff(){
        return view('admin.add-staff');
    }

    public function storeStaff(Request $request){
        request()->validate([
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'email' => 'required|email',
            'state_of_origin' => 'required|min:4',
            'gender' => 'required',
            'qualification' => 'required',
            'year_of_birth' => 'required',
        ]); 

        $worker = new Worker();
        $worker->first_name = $request->first_name;
        $worker->last_name = $request->last_name;
        $worker->user_name = $request->first_name;
        $worker->email = $request->email;
        $worker->state_of_origin = $request->state_of_origin;
        $worker->gender = $request->gender;
        $worker->qualification = $request->qualification;
        $worker->year_of_birth = $request->year_of_birth;
        $worker->password = $request->last_name;

        $worker->save();

        Session::flash('success', 'Staff Added Successfully');

        return redirect('/admin/add-staff');
    }

    public function viewWorkers(){
        $workers = Worker::all();

        return view('admin.view-workers', compact('workers'));
    }

    public function viewWorker($id){
        $worker = Worker::findOrFail($id);

        return view('admin.edit.view-worker', compact('worker'));
    }

    public function editStaff($id){
        $worker = Worker::findOrFail($id);

        return view('admin.edit.edit-staff', compact('worker'));
    }

    public function updateStaff($id){
        $staff = Worker::findOrFail($id);

        $staff->first_name = request('first_name');
        $staff->last_name =  request('last_name');
        $staff->user_name =  request('first_name');
        $staff->email =  request('email');
        $staff->state_of_origin =  request('state_of_origin');
        $staff->gender =  request('gender');
        $staff->qualification =  request('qualification');
        $staff->year_of_birth =  request('year_of_birth');
        $staff->password =  request('password');

        $staff->save();

        return redirect('/admin/view-staff')->with('success', 'Student Updated');
    }

    public function destroyStaff($id){
        Worker::findOrFail($id)->delete();

        return redirect('/admin/view-workers')->with('success', 'Staff Deleted');
    } //-------------------------------Staff ends--------------------------------------------------------------

    public function statistics(){
        return view('admin.charts');
    }

    public function profile(){
        return view('admin.profile');
    }

    public function changePassword(){
        return view('admin.password');
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
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password changed successfully");
    }

    
}
