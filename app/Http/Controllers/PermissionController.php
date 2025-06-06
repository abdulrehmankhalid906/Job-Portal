<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        validate_user_permission('Manage Permissions');

        return view('permissions.permissions',[
            'permissions' => Permission::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        validate_user_permission('Manage Permissions');
        return view('permissions.add_permissions');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required,unique:permissions,name'
        ]);

        Permission::create([
            'name' => $request->name
        ]);

        return redirect('permissions')->with('success','Permission Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        validate_user_permission('Manage Permissions');

        return view('permissions.edit_permissions', [
            'permissions' => Permission::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Permission $permission, Request $request)
    {
        $request->validate([
            'name' => 'required,unique:permissions,name' .$permission->id
        ]);

        $permission->update([
            'name' => $request->name
        ]);

        return redirect('permissions')->with('success','Permission Updated Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permission = Permission::findorFail($id);
        $permission->delete();

        return redirect('permissions')->with('success','Permission Deleted Successfully!');
    }
}
