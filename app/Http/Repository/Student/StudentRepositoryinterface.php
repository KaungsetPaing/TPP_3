<?php

namespace App\Http\Repository\Student;

interface StudentRepositoryInterface
{
    public function all();

    public function create($data);

    public function findById($id);
}