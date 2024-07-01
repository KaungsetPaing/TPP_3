<?php

namespace App\Http\Repository\Student;


use App\Models\Student;

class StudentRepository implements StudentRepositoryInterface
{
    public function all()
    {
        return Student::with('courses')->get();
    }

    public function create($data)
    {
       return Student::create($data); 
    }
    

    public function findById($id)
    {
        return Student::find($id);
    }

  

  
}
