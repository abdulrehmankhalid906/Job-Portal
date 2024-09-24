<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\City;
use App\Models\Apply;
use App\Models\Country;
use App\Models\Category;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Requests\JobRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ApplyRequest;
use App\Models\Package;
use App\Repositories\CommonRepository;

class FrontController extends Controller
{
    protected $CommonRepository;
    public function __construct(CommonRepository $CommonRepository)
    {
        $this->CommonRepository = $CommonRepository;
    }
    
    public function frontHome()
    {
        $categories = Category::withCount('jobs')->get();
        $countries = Country::all();
        $cities = City::all();
        $testimonials = Testimonial::with('company')->get();
        $overall_rating = $this->CommonRepository->feedbackRating();

        $jobdata = Job::with(['applies','companies','countries','cities'])->get();
        return view('welcome',[
            'categories' => $categories,
            'countries' => $countries,
            'cities' => $cities,
            'jobdata' => $jobdata,
            'testimonials' => $testimonials,
            'total_array' => $overall_rating,
            'packages' => Package::all()
        ]);
    }

    public function viewJob($id,$slug)
    {
        $job = Job::with(['companies','countries','cities'])->Findorfail($id);

        return view('frontend.viewJob',[
           'job' => $job,
           'slug' => $slug
        ]);
    }

    public function applyjobs(ApplyRequest $request)
    {
        $email = $request->email;
        $job_id = $request->job_id;

        $applied = Apply::where(['email' => $email, 'job_id'=> $job_id])->first();

        if($applied)
        {
            return redirect()->back()->with('danger','You have already applied for this job.');
        }

        $apply = Apply::create([
            'job_id' => $request->job_id,
            'company_id' => $request->company_id,
            'name' => $request->name,
            'email' => $request->email,
            'portweb' => $request->portweb,
            'coverletter' => $request->coverletter,
            // 'status' => 0
        ]);

        if($request->hasfile('upload_cv'))
        {
            $file = $request->file('upload_cv');

            $fileName = time(). '-' .$file->getClientOriginalName();

            $file->storeAs('public/cv/', $fileName);

            $apply['upload_cv'] = $fileName;
        }

        return redirect()->route('frontHome')->with('success','Thank you for applying this job.');
    }


    public function jobCategories($category)
    {
        $job = DB::table('jobs')
        ->join('categories', 'jobs.category_id', "=", 'categories.id')
        ->select('jobs.*', 'categories.name as category') // Adjust columns as needed
        ->where('categories.name', '=', $category)
        ->get();
    }
}
