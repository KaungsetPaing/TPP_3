<?php

namespace App\Http\Repository\Category;

use App\Models\Category;
use Illuminate\Http\Request;

interface CategoryRepositoryInterface
{
    public function all();

    public function create($data);

    public function find($id);

    public function update(Category $category, array $data);
    public function delete(Category $category);
}