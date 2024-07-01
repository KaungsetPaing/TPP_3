<?php

namespace App\Http\Controllers;

use App\Http\Repository\Role\RoleRepositoryInterface;
use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    private RoleRepositoryInterface $roleRepository;
   public function __construct(RoleRepositoryInterface $roleRepository)
   {
    $this->roleRepository = $roleRepository;
   }
    public function index(){
        // $roles = Role::get();
        // return view('role-permission.role.index',[ // compact data to index.blade
        //     'roles' => $roles
        // ]);
        $roles=$this->roleRepository->all();
         return view('role-permission.role.index',[ // compact data to index.blade
            'roles' => $roles
        ]);
    }
    public function create(){
        return view('role-permission.role.create');
    }
    public function store(RoleRequest $request){
        // Role::create([
        //     'name' => $request->name,
        // ]);
       $this->roleRepository->create($request);
        return redirect('roles')->with('success','Role created successfully');
    }

    public function edit(Role $role){
//        return ($permission);
        return view('role-permission.role.edit',[
            'role' => $role
        ]);
    }
    public function update(Request $request, $id){
        // $request->validate([
        // //     'name' => [
        // //         'required',
        // //         'string',
        // //         'unique:roles,name,'.$role->id, // ignore
        // //     ]
        // // ]);
        // // $role->update([
        // //     'name' => $request->name,
        // // ]);
        $this->roleRepository->update($request, $id);
        return redirect('roles')->with('success','Role updated successfully');
    }
    public function destroy($id){
        // Role::find($roleId)->delete();
        $this->roleRepository->delete($id);
        return redirect('roles')->with('success','Role deleted successfully');
    }

    public function addPermissionToRole($roleId)
    {
        $permissions = Permission::get();
        $role = Role::findOrFail($roleId);
        // checked db data for checkbox
        $rolePermissions = DB::table("role_has_permissions")
            ->where('role_has_permissions.role_id', $roleId)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        return view('role-permission.role.add-permissions',[
            'role' => $role,
            'permissions' => $permissions,
            'rolePermissions' => $rolePermissions
        ]);
    }
    public function givePermissionToRole(Request $request , $roleId)
    {
        $request->validate([
            'permission' => 'required'
        ]);
        $role = Role::findOrFail($roleId);
        $role->syncPermissions($request->permission);
        return redirect()->back()->with('success','Permission added to role successfully');
    }
}
