<?php

namespace App\Http\Repository\Product;


use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductRepository implements ProductRepositoryInterface
{
    public function all()
    {
        return Product::with('images')->get();
    }

   
    
    public function create(Request $request)
    {
        $product = Product::create($request->all());
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
        return $product;
    }

    public function find($id)
    {
        return Product::find($id);
    }
    public function edit($id)
    {
        $product = Product::with('images')->find($id);
        if (!$product) {
            return redirect()->route('productIndex')->withErrors('Product not found.');
        }

       
    }
    public function update(Request $request, $id)
    {
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
        
    }

  

  
}
