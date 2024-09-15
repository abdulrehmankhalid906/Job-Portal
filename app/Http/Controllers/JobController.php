<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\JobRequest;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company = Company::with(['jobs','countries','cities'])->where('user_id', Auth::user()->id)->first();

        return view('company.job_listing',[
            'company' => $company,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company.post_job', [
            'categories' => Category::get(),
            'countries' => Country::get(),
            'cities' => City::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobRequest $request)
    {
        $validatedData = $request->validated();

        $data = $validatedData + [
            'user_id' => auth()->id(),
            'company_id' => auth()->user()->company->id,
            'slug' => Str::slug($request->title, '-')
        ];

        if($request->hasFile('extra_document'))
        {
            $file = $request->file('extra_document');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->storeAs('public/images/', $fileName);
            $data['extra_document'] = $fileName;
        }

        Job::create($data);

        return redirect()->back()->with('success','The job has been posted');
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
