<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
        return response()->json($data);
    }



//     public function create()
//     {
//         return view('categories.create');
//     }

    public function store(Request $request)
    {
      $data=$this->categoryRepository->create($request->all());
      return response()->json($data);
    }

    public function show($id)
    {
        // $data = Category:: where('id', $id)->first();
        $data = $this->categoryRepository->find($id);
        return response()->json($data);
        
    }


public function update(Request $request, $id)
{
    // $data = Category::where('id', $id)->first();
    $data = $this->categoryRepository->find($id);
   $category=$this->categoryRepository->update( $data, $request->all());
   return response()->json($category);
}

public function delete($id)

{
    $data = $this->categoryRepository->find($id);
  $category=$this->categoryRepository->delete($data);
  return response()->json($category);
}



}
