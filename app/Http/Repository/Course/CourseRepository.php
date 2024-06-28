<?php

namespace App\Http\Repository\Course;

use App\Models\Course;


class CourseRepository implements CourseRepositoryInterface
{
    public function all()
    {
        return Course::all();
    }

    public function create($data)
    {
        return Course::create($data);
    }

    public function findById($id)
    {
        return Course::find($id);
    }

  

  
}
