<?php

namespace App\Http\Repository\Category;

use App\Models\Category;




class CategoryRepository implements CategoryRepositoryInterface
{
    public function all()
    {
        return Category::all();
    }

    public function create($data)
    {
        return Category::create($data);
    }

    public function find($id)
    {
        return Category::find($id);
    }
    public function update(Category $category, array $data)
    {
       return $category->update($data);
       
    }
    public function delete(Category $category)
    {
        return $category->delete();
        
    }

  

  
}
