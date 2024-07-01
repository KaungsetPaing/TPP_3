<?php

namespace App\Http\Controllers;

use App\Http\Repository\Product\ProductRepositoryInterface;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    private ProductRepositoryInterface $productRepository;
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
        $this->middleware('auth');
    }
    public function index(){


        // $product_item = Product::with('images')->get();
        $product_item = $this->productRepository->all();
        return view('products.product', compact('product_item'));
    }

    public function create()
    {
        return view('products.create');
    }
    public function store(Request $request)
    {
        $this->productRepository->create($request);
        return redirect()->route('productIndex');

        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'price' => 'required|numeric',
        //     'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        // ]);
        // $product = Product::create($request->only('name','price'));
        // // $product = Product::create($request->all());
        // // $product = Product::create($request->validated());

        // if ($request->hasFile('images')) {
        //     foreach ($request->file('images') as $image) {
        //         $filename = time() . '_' . $image->getClientOriginalName();
        //         $path = $image->move(public_path('images'), $filename);
        //         ProductImage::create([
        //             'product_id' => $product->id,
        //             'image_path' => $filename,
        //         ]);
        //     }
        // }

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
 
    }
    public function edit($id)
    {

        // $product = Product::with('images')->find($id);
        // if (!$product) {
        //     return redirect()->route('productIndex')->withErrors('Product not found.');
        // }
        $product = $this->productRepository->find($id);
        return view('products.edit', compact('product'));
    }


    public function update(Request $request, $id)
{

    $this->productRepository->update( $request, $id);

    return redirect()->route('productIndex');

    // $request->validate([
    //     'name' => 'required|string|max:255',
    //     'price' => 'required|numeric',
    //     'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    // ]);

    // $product = Product::findOrFail($id);
    // $product->update($request->only('name', 'price'));

    // if ($request->hasFile('images')) {
    //     foreach ($product->images as $image) {
    //         $imagePath = public_path($image->image_path);
    //         if (file_exists($imagePath)) {
    //             unlink($imagePath);
    //         }
    //         $image->delete();
    //     }

    //     foreach ($request->file('images') as $image) {
    //         $filename = time() . '_' . $image->getClientOriginalName();
    //         $path = $image->move(public_path('images'), $filename);
    //         ProductImage::create([
    //             'product_id' => $product->id,
    //             'image_path' => $filename,
    //         ]);
    //     }
    // }
  
}

public function delete(Product $productdelete)

{
//     foreach ($productdelete->images as $image) {
//         $imagePath = public_path($image->image_path);
//         if (file_exists($imagePath)) {
//             unlink($imagePath);
//         }
//         $image->delete();
//     }

//   $productdelete->delete();
$this->productRepository->delete($productdelete);
  return redirect()->route('productIndex');
}

}
