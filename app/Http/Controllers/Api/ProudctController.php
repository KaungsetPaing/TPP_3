<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Repository\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProudctController extends Controller
{
    /**
     * Display a listing of the resource.
     */


     private ProductRepositoryInterface $productRepository;
     public function __construct(ProductRepositoryInterface $productRepository)
     {
         $this->productRepository = $productRepository;
       
     }

    public function index()
    {
        $product = $this->productRepository->all();
        return response()->json($product);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product=$this->productRepository->create($request);
        return response()->json($product); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = $this->productRepository->find($id);
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $this->productRepository->find($id);
        $product=$this->productRepository->update( $data, $request->all());
        return response()->json($product);

    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = $this->productRepository->find($id);
        $product=$this->productRepository->delete($data);
        return response()->json($product);
    }
}
