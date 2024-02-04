<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\City;
use App\Models\Apply;
use App\Models\Country;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\JobRequest;
use App\Http\Requests\ApplyRequest;
use App\Models\Testimonial;

class FrontController extends Controller
{
    public function frontHome()
    {
        $categories = Category::all();
        $countries = Country::all();
        $cities = City::all();
        $testimonials = Testimonial::with('company')->get();


        $jobdata = Job::with(['companies','countries','cities'])->get();
        // dd($jobdata);

        return view('welcome',[
            'categories' => $categories,
            'countries' => $countries,
            'cities' => $cities,
            'jobdata' => $jobdata,
            'testimonials' => $testimonials
        ]);

    }

    public function viewJob($id,$title)
    {
        $job = Job::with(['companies','countries','cities'])->Findorfail($id);
        // dd($job);

        return view('frontend.viewJob',[
           'job' => $job,
           'title' => $title
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
