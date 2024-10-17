<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\CommonRepository;

class ApplicantController extends Controller
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

        $user = Auth::user()->company->id ?? null;
        $applies = Apply::with('jobs')->where('company_id', $user)->get();

        return view('company.applicants',[
            'applies' => $applies
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        validate_user_permission('Manage Jobs');

        $apply = Apply::with('jobs')->where('id', $id)->first();
        
        return view('company.review_job',[
            'apply' => $apply,
            'statuses' => $this->CommonRepository->status(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $apply = Apply::where('id', $id)->first();

        $apply->update($request->all());
        
        return redirect()->back()->with('success', 'Applicant Status updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
