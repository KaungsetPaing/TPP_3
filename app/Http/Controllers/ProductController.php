<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Faker\Provider\Lorem;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){


        $product_item = Product::all();
        return view('products.product', compact('product_item'));
    }

    public function create()
    {
        return view('products.create');
    }
    public function store(Request $request)
    {
       Product::create([
        'name'=> $request->name,
        'price'=> $request->price,
        'image'=> $request->image,

       ]);
      return redirect()->route('productIndex');
    }
    public function edit($id)
    {

        $product = Product:: where('id', $id)->first();
        return view('products.edit', compact('product'));
    }


    public function update(Request $request, $id)
{
    $product = Product::where('id', $id)->first();
    $product->update([
        'name' => $request->name,
        'price' => $request->price,
        'image' => $request->image,
    ]);

    return redirect()->route('productIndex');
}

public function delete($id)

{
  $data = Product::where('id', $id)->first();
  $data->delete();
  return redirect()->route('productIndex');
}

}
