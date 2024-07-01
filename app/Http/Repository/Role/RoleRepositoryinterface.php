<?php

namespace App\Http\Repository\Role;

use App\Models\Role;
use Illuminate\Http\Request;

interface RoleRepositoryInterface
{
    public function all();
    public function create(Request $request);

    public function update(Request $request,  $id);
    public function delete($id);
   
}