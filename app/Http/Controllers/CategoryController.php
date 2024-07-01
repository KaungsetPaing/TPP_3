<?php

namespace App\Http\Controllers;

use App\Http\Repository\Category\CategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Http\Request;
class CategoryController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    private CategoryRepositoryInterface $categoryRepository;
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {

        $data = $this->categoryRepository->all();
        return view('categories.index', compact('data'));
    }

    public function create()
    {
        return view('categories.create');
    }
    public function store(Request $request)
    {
      $this->categoryRepository->create($request->all());
      return redirect()->route('categoryIndex');
    }

    public function edit($id)
    {
        // $data = Category:: where('id', $id)->first();
        $data = $this->categoryRepository->find($id);
        return view('categories.edit', compact('data'));
    }


public function update(Request $request, $id)
{
    // $data = Category::where('id', $id)->first();
    $data = $this->categoryRepository->find($id);
   $this->categoryRepository->update( $data, $request->all());
    return redirect()->route('categoryIndex');
}

public function delete(Category $category)

{
  $this->categoryRepository->delete($category);
  return redirect()->route('categoryIndex');
}



}
