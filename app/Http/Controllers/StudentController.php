<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // public function index(){
    //     $students = Student::latest()->paginate(5);
    //     return view('index', compact('students'));
    // }
    
    
    public function addStudent(){
        return view('add-student');
    }

    public function storeStudent(Request $request){
        $name = $request->name;
        $age = $request->age;
        $profession = $request->profession;
        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'), $imageName);

        $student = new Student();
        $student->name = $name;
        $student->age = $age;
        $student->profession = $profession;
        $student->profile_image = $imageName;
        $student->save();
        return back()->with('student_added', 'Student has been added succesfully!');
    }

    public function students(){
        $students = Student::all();
        return view('all-students', compact('students'));
    }

    public function editStudent($id){
        $student = Student::find($id);
        return view('edit-student', compact('student'));

    }

    public function updateStudent(Request $request){
        $name = $request->name;
        $age = $request->age;
        $profession = $request->profession;
        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'), $imageName);

        $student = Student::find($request->id);
        $student->name = $name;
        $student->age = $age;
        $student->Profession = $profession;
        $student->profile_image = $imageName;
        $student->save();
        
        return back()->with('student_updated', 'Student has been updated succesfully!');
    }

    public function deleteStudent($id){
        $student = Student::find($id);
        unlink(public_path('images').'/'.$student->profile_image);
        $student->delete();
        return back()->with('student_deleted', 'Student has been deleted succesfully!');
    }
}
