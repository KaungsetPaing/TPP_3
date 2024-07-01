<?php

namespace App\Http\Repository\Product;


use App\Models\Product;
use Illuminate\Http\Request;

interface ProductRepositoryInterface
{
    public function all();
    public function create(Request $request);

  

    public function find($id);

    public function update(Request $request, $id);
    public function delete(Product $productdelete);
}