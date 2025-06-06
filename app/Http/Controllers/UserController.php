<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        validate_user_permission('Manage Users');

        return view('users.user',[
            'users' => User::with('roles')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        validate_user_permission('Manage Users');

        return view('users.add_user',[
            'roles' => Role::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        validate_user_permission('Manage Users');

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'role' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->syncRoles($request->role);

        return redirect('/users')->with('success', 'Roles Assigned to User Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // $user = User::findorFail($id);
        // return view('users.view',[
        //     'users' => $user,
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        validate_user_permission('Manage Users');

        return view('users.edit_user',[
            'user' => $user,
            'roles' => Role::select('name')->get(),
            'selected_role' => $user->roles()->pluck('name')->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        validate_user_permission('Manage Users');

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $user->syncRoles($request->role_id);

        return redirect('/users')->with('success', 'User Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        validate_user_permission('Manage Users');

        $user->delete();
        return redirect('/users')->with('success', 'User Deleted Successfully!');
    }
}
