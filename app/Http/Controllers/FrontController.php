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

        $total_array = [
            'total_rating' => number_format($overall_rating->total_rating / $overall_rating->total_count, 1),
            'total_count' => $overall_rating->total_count,
            'ratings' => [
                '5' => $overall_rating->rat_5,
                '4' => $overall_rating->rat_4,
                '3' => $overall_rating->rat_3,
                '2' => $overall_rating->rat_2,
                '1' => $overall_rating->rat_1
            ],
            'colors' => [
                '5' => 'bg-success',
                '4' => 'bg-primary',
                '3' => 'bg-info',
                '2' => 'bg-warning',
                '1' => 'bg-danger'
            ]
        ];

        $jobdata = Job::with(['applies','companies','countries','cities'])->get();
        return view('welcome',[
            'categories' => $categories,
            'countries' => $countries,
            'cities' => $cities,
            'jobdata' => $jobdata,
            'testimonials' => $testimonials,
            'total_array' => $total_array,
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



}
