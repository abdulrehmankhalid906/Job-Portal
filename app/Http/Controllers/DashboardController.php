<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\City;
use App\Models\User;
use App\Models\Apply;
use App\Models\Company;
use App\Models\Country;
use App\Models\Category;
use App\Models\Testimonial;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\JobRequest;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $jobs = Job::where('user_id', Auth::user()->id)->count();
        // $company = Apply::where('user_id', Auth::user()->id->count();


        return view('frontdashboard.dashboard',[
            'jobs' => $jobs,
        ]);
    }

    public function companyProfile()
    {
        $users = User::with('company')->where('id', Auth::user()->id)->first();
       
        //dd($users);
        return view('company.profile', [
            'categories' => Category::get(),
            'countries' => Country::get(),
            'cities' => City::get(),
            'users' => $users
        ]);
    }

    public function updateCompany(Request $request)
    {
        $company = Company::where('user_id', Auth::user()->id)->first();

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        if ($request->hasFile('company_img')) {
            $co_img = $request->file('company_img');
            $fileName = time() . '-' . $co_img->getClientOriginalName();
            $co_img->storeAs('public/Images/logo', $fileName);
            $data['company_img'] = $fileName;
        }

        if ($company) {
            $company->update($data);
            return redirect()->back()->with('success', 'Company profile updated successfully');
        } else {
            $company = Company::create($data);
            return redirect()->back()->with('success', 'Company profile created successfully');
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
        $validatedData = $request->validated();

        $data = $validatedData + [
            'user_id' => auth()->id(),
            'company_id' => auth()->user()->company->id,
            'slug' => Str::slug($request->title, '-')
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
        $company = Company::with(['jobs','countries','cities'])->where('user_id', Auth::user()->id)->first();

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
        $user = User::where('id', Auth::user()->id)->with(['company','testimonials'])->first();

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
