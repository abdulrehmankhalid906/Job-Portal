<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\City;
use App\Models\User;
use App\Models\Country;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\JobRequest;
use App\Models\Apply;
use App\Models\Company;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $jobs = Job::where('user_id', $user->id)->count();
        // $company = Apply::where('user_id', $user->id)->count();


        return view('frontdashboard.dashboard',[
            'jobs' => $jobs,
        ]);
    }

    public function companyProfile()
    {
        $user = Auth::user();
        $users = User::with('company')->where('id',$user->id)->first();

        // dd($users);
        $categories = [];
        $countries = [];

        return view('company.profile', [
            'categories' => $categories,
            'countries' => $countries,
            'users' => $users
        ]);
    }

    public function updateCompany(Request $request)
    {

        if($request->hasfile('company_img'))
        {
            $co_img = $request->file('company_img');
            $fileName = time(). '-' .$co_img->getClientOriginalName();
            $co_img->storeAs('public/images/', $fileName);
            $data['company_img'] = $fileName;
        }
    }

    public function postJob()
    {
        $categories = Category::all();
        $countries = Country::all();
        $cities = City::all();

        return view('company.post_job',[
            'categories' => $categories,
            'countries' => $countries,
            'cities' => $cities
        ]);
    }

    public function newPost(JobRequest $request)
    {
        // dd($request->all());

        // Job::create([$request->validated()]);

        // $job = new Job();
        // $job->user_id = auth()->id();
        // $job->company_id = auth()->user()->company->id;
        // $job->title = $request->title;
        // $job->description = $request->description;
        // $job->category_id = $request->category_id;
        // $job->country_id = $request->country_id;
        // $job->city_id = $request->city_id;
        // $job->position_level = $request->position_level;
        // $job->job_type = $request->job_type;
        // $job->salary_range = $request->salary_range;
        // $job->valid_till = $request->valid_till;
        // $job->save();

        $validatedData = $request->validated();

        $data = $validatedData + [
            'user_id' => auth()->id(),
            'company_id' => auth()->user()->company->id,
        ];

        if($request->hasFile('extra_document'))
        {
            $file = $request->file('extra_document');

            // dd($file );

            $fileName = time() . '-' . $file->getClientOriginalName();

            $file->storeAs('public/images/', $fileName);

            $data['extra_document'] = $fileName;
        }

        Job::create($data);

        return redirect()->back()->with('success','The job has been posted');
    }

    public function listing()
    {
        $user = Auth::user();
        $company = Company::with(['jobs','countries','cities'])->where('user_id', $user->id)->first();

        return view('company.job_listing',[
            'company' => $company,
        ]);
    }

    public function applicants()
    {

        return view('company.applicants');
    }



    //Companies Feedback
    public function writeFeedback()
    {
        $users = Auth::user();
        $user = User::where('id',$users->id)->with(['company','testimonials'])->first();

        return view('company.feedback',[
            'user' => $user
        ]);
    }

    public function storeFeedback(Request $request)
    {
        Testimonial::create([
            'user_id' => auth()->id(),
            'company_id' => $request->company_id,
            'feedback' => $request->feedback,
            'rating' => $request->rating
        ]);

        return redirect()->back()->with('success','Thank you for submitting the feedback');
    }

}
