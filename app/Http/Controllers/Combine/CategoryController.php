<?php

namespace App\Http\Controllers\Combine;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.categories',compact('categories'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.add_new_categories');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
            // 'stat' => 'required'
        ]);

        Category::create([
            'name' => $request->name,
            // 'shortcode' => $request->shortcode
        ]);

        return redirect()->back()->with('success','Your Category is Added!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
