<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
        return view('users.user',[
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        $user = User::findorFail($id);

        // dd($user);
        return view('users.view',[
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findorFail($id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return redirect()->route('users.index')->with('success', 'User is updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //simple user delete
        //$user = User::findOrFail($id);

        // Delete everything associated with this user
        // $user = User::with('posts')->findOrFail($id);

        // foreach($user->posts as $users)
        // {
        //     $users->delete();
        // }

        // $user->delete();

        // return redirect()->back()->with('success','User and his posts deleted successfully!');
    }
}
