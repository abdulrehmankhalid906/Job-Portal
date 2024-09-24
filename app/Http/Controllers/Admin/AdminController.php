<?php

namespace App\Http\Controllers\Admin;

use App\Models\Job;
use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $companies = Company::count();
        $jobs = Job::count();
        $users = User::count();


        return view('dashboard.index',[
            'companies' => $companies,
            'jobs' => $jobs,
            'users' => $users
        ]);
    }
}
