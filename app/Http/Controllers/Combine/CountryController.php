<?php

namespace App\Http\Controllers\Combine;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = Country::with('city')->get();
        $cities = City::all();
        return view('countries.countries',compact('countries','cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('countries.add_new_countries');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'shortcode' => 'required'
        ]);

        Country::create([
            'name' => $request->name,
            'shortcode' => $request->shortcode
        ]);

        return redirect()->back()->with('success','Your country is Added!');
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
