<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    //
    public function index()
    {
        $roles = Role::whereNotIn('name', ['admin'])->get();
        return view('admin.roles.index', compact('roles'));
    }

    public function create(){
        return view('admin.roles.create');
    }

    public function store(Request $request){
        $validatedData = $request->validate(['name' => 'required|string']);
        Role::create($validatedData);
        return to_route('admin.roles.index');
    }

    public function edit(Role $role){
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role', 'permissions'));

    }

    public function update(Request $request, Role $role){
        $validatedData = $request->validate(['name' => 'required|string']);
        $role->update($validatedData);

        return to_route('admin.roles.index');
    }


    public function destroy(Role $role){
        $role->delete();
        return to_route('admin.roles.index');

    }

    public function givePermission(Request $request, Role $role){
        if ($role->hasPermissionTo($request->permission)){
            return back()->with('menssage', 'ya existe el permiso');
        }
        $role->givePermissionTo($request->permission);
        return back()->with('menssage', 'Permiso asigando');

    }

    public function deletePermission(Role $role, Permission $permission){

        if ($role->hasPermissionTo($permission)){
            $role->revokePermissionTo($permission);
            $permission->removeRole($role);
            return back()->with('menssage', 'ya existe el permiso');
        }
        return back()->with('menssage', 'Permiso no existe');

    }
}
