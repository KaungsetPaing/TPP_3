<?php

namespace App\Http\Repository\Course;

interface CourseRepositoryinterface
{
    public function all();

    public function create($data);

    public function findById($id);
}