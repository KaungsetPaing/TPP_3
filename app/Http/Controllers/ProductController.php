<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Faker\Provider\Lorem;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){


        $product_item = Product::with('images')->get();
        return view('products.product', compact('product_item'));
    }

    public function create()
    {
        return view('products.create');
    }
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $product = Product::create($request->only('name','price'));

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $path = $image->move(public_path('images'), $filename);
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $filename,
                ]);
            }
        }

        // if($request->file('image'))
        // {
        //     $image = $request->file('image');
        //     $filename = time() .'.'. $image->getClientOriginalExtension();
        //     $image->move('images', $filename);

        //     Product::create([
        //         'name'=> $request->name,
        //         'price'=> $request->price,
        //         'image'=> $filename,
        //        ]);
        // }else
        // {
        //     Product::create([
        //         'name'=> $request->name,
        //         'price'=> $request->price,
               
        //        ]);
        // }
      return redirect()->route('productIndex');
    }
    public function edit($id)
    {

        $product = Product::with('images')->find($id);
        if (!$product) {
            return redirect()->route('productIndex')->withErrors('Product not found.');
        }

        return view('products.edit', compact('product'));
    }


    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);

    $product = Product::findOrFail($id);
    $product->update($request->only('name', 'price'));

    if ($request->hasFile('images')) {
        foreach ($product->images as $image) {
            $imagePath = public_path($image->image_path);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $image->delete();
        }

        foreach ($request->file('images') as $image) {
            $filename = time() . '_' . $image->getClientOriginalName();
            $path = $image->move(public_path('images'), $filename);
            ProductImage::create([
                'product_id' => $product->id,
                'image_path' => $filename,
            ]);
        }
    }

    return redirect()->route('productIndex');
}

public function delete(Product $productdelete)

{
    foreach ($productdelete->images as $image) {
        $imagePath = public_path($image->image_path);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $image->delete();
    }

  $productdelete->delete();
  return redirect()->route('productIndex');
}

}
