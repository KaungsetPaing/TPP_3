<?php

namespace App\Http\Controllers;

use App\Http\Repository\Student\StudentRepositoryInterface;
use App\Http\Repository\Course\CourseRepositoryinterface;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    private StudentRepositoryInterface $studentRepository;
    private CourseRepositoryinterface $CourseRepository;

    public function __construct(StudentRepositoryInterface $studentRepository,CourseRepositoryinterface $CourseRepository)
        {
            $this->studentRepository = $studentRepository;
            $this->CourseRepository = $CourseRepository;
        }
        
        
    public function index()
    {
        // $student = Student::with('courses')->get();
        $student = $this->studentRepository->all();
        return view('students.index', compact('student'));
    }

    public function create()
    {
        // $courses = Course::all();
        $courses = $this->CourseRepository->all();
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
     
            // $student = Student::create($request->all);
            $student = $this->studentRepository->create($request->all());

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
