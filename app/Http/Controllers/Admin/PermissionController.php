<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    //
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permission.index', compact('permissions'));

    }

    public function create(){
        return view('admin.permission.create');
    }

    public function store(Request $request){
        $validatedData = $request->validate(['name' => 'required|string']);
        Permission::create($validatedData);
        return to_route('admin.permissions.index');
    }

    public function edit(Permission $permission){
        return view('admin.permission.edit', compact('permission'));

    }

    public function update(Request $request, Permission $permission){
        $validatedData = $request->validate(['name' => 'required|string']);
        $permission->update($validatedData);

        return to_route('admin.permissions.index');
    }

    public function destroy(Permission $permission){
        $permission->delete();
        return to_route('admin.permissions.index');
    }
}
