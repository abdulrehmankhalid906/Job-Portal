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
}
