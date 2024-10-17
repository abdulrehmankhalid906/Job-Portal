<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        validate_user_permission('Manage Packages');

        $packages = Package::all();

        return view('package.packages',[
            'packages' => $packages,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        validate_user_permission('Manage Packages');

        return view('package.create_package');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['features'] = json_encode($request->features);
        $package = Package::create($data);

        //dd($package);

        return redirect('packages')->with('success','The package has been created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        validate_user_permission('Manage Packages');

        $package = Package::findorFail($id);

        // dd($package);
        return view('package.update_package',[
            'package' => $package
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $package = Package::findOrFail($id);

        $data = $request->all();
        $data['features'] = json_encode($request->features);
        $package->update($data);

        return redirect('packages')->with('success','Package updated successfully.');        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Package $package, $id)
    {
        $package = Package::findorFail($id);
        $package->delete();

        return redirect('packages')->with('success','The package has been deleted');
    }
}
