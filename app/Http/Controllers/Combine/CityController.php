<?php

namespace App\Http\Controllers\Combine;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $cities = City::with('country')->latest()->get();
                return DataTables::of($cities)
                    ->addIndexColumn()
                    ->addColumn('action',function($row){
                        return view('cities.actions', ['row' => $row]);
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('cities.cities');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();
        return view('cities.add_new_cities',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'country_id' => 'required',
            'name' => 'required'
        ]);

        City::create([
            'country_id' => $request->country_id,
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success','Your City is Added!');
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
        $id = City::findorFail($id);
        dd($id);
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
        $city = City::findorFail($id);
        dd($city);
        $city->delete();

        return redirect()->back()->with('success','The Country has been deleted');
    }
}
