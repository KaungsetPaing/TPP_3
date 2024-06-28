<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function index()
    {
        $course = Course::all();
        return view('courses.index', compact('course'));
    }
    public function create()
    {
        return view('courses.create');
    }
    public function store(Request $request)
    {
       Course::create([
        'name'=> $request->name,
       ]);
      return redirect()->route('course.index');
    }
}
