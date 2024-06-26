<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){


        $student = Student::with('courses')->get();
        return view('students.index', compact('student'));
    }

    public function create()
    {
        $courses = Course::all();
        
        return view('students.create', compact('courses'));
       
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|numeric',
            'phone' => 'required|integer',
            'address' => 'required|string|max:255',
            
        ]);
     
            $student = Student::create($request->except('courses'));

            $student->courses()->attach($request->input('courses'));

    // Student::create([
    //     'name'=> $request->name,
    //     'age'=> $request->age,
    //     'phone'=> $request->phone,
    //     'address'=> $request->address,
    //    ]);
   
  
    

      
    return redirect()->route('student.index');
    }
}
