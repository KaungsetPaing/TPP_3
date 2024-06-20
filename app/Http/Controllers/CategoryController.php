<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){


        $data = Category::all();
        return view('categories.index', compact('data'));
    }

    public function create()
    {
        return view('categories.create');
    }
    public function store(Request $request)
    {
       Category::create([
        'name'=> $request->name,
       ]);
      return redirect()->route('categoryIndex');
    }

    public function edit($id)
    {

        $data = Category:: where('id', $id)->first();
        return view('categories.edit', compact('data'));
    }


    public function update(Request $request, $id)
{
    $data = Category::where('id', $id)->first();
    $data->update([
        'name' => $request->name,
    ]);

    return redirect()->route('categoryIndex');
}

public function delete($id)

{
  $data = Category::where('id', $id)->first();
  $data->delete();
  return redirect()->route('categoryIndex');
}



}
