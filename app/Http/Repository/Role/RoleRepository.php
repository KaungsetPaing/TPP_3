<?php 
namespace App\Http\Repository\Role;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class RoleRepository implements RoleRepositoryInterface
{
    public function all()
    {
        return Role::get();
    }
    public function create(Request $request)
    {
        return Role::create($request->all());
    }
    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        $role->update($request->all());
    }
    public function delete($id)
    {
        $role = Role::find($id);
        $role->delete();
    }
   

}