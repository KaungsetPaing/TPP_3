<?php

namespace App\Http\Controllers;

use App\Http\Repository\Course\CourseRepositoryinterface;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    private CourseRepositoryinterface $CourseRepository;

    public function __construct(CourseRepositoryinterface $CourseRepository)
    {
        $this->CourseRepository = $CourseRepository;
    }

    public function index()
    {
        $course = $this->CourseRepository->all();
        return view('courses.index', compact('course'));
    }
    public function create()
    {
        return view('courses.create');
    }
    public function store(Request $request)
    {
      $this->CourseRepository->create($request->all());
      return redirect()->route('course.index');
    }
}
