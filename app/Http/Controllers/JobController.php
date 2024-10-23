<?php

namespace App\Http\Controllers;

use App\Events\JobCreated;
use App\Models\Job;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\JobRequest;
use Illuminate\Support\Facades\Auth;
use App\Repositories\CommonRepository;

class JobController extends Controller
{
    protected $CommonRepository;
    public function __construct(CommonRepository $CommonRepository)
    {
        $this->CommonRepository = $CommonRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        validate_user_permission('Manage Jobs');

        $jobs = Job::with(['companies', 'countries', 'cities'])->where('user_id', Auth::user()->id)->paginate(4);

        return view('jobs.jobs',[
            'jobs' => $jobs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        validate_user_permission('Manage Jobs');
        return view('jobs.add_job', [
            'categories' => Category::get(),
            'countries' => Country::get(),
            'cities' => City::get(),
            'positions' => $this->CommonRepository->positions(),
            'types' => $this->CommonRepository->types(),
            'ranges' => $this->CommonRepository->range()
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

        event(new JobCreated(Auth::user()));

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
    public function edit($id)
    {
        validate_user_permission('Manage Jobs');

        $job = Job::findorFail($id);
        return view('jobs.edit_job', [
            'categories' => Category::get(),
            'countries' => Country::get(),
            'cities' => City::where('country_id', $job->country_id)->get(),
            'job' => $job,
            'positions' => $this->CommonRepository->positions(),
            'types' => $this->CommonRepository->types(),
            'ranges' => $this->CommonRepository->range()
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $company = Job::where('id', $id)->first();

        $data = $request->all();
        $data['highlight_post'] = $request->boost_post == 'Yes' ? 1 : 0;  

        if ($request->hasFile('extra_document')) {
            $co_img = $request->file('extra_document');
            $fileName = time() . '-' . $co_img->getClientOriginalName();
            $co_img->storeAs('public/images/', $fileName);
            $data['extra_document'] = $fileName;
        }

        $company->update($data);
        return redirect()->back()->with('success', 'Job updated successfully');
    } 

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
