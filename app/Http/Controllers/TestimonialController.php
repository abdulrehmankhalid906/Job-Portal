<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        validate_user_permission('Manage Feedback');

        return view('testimonials.testimonials',[
            'testimonials' => Testimonial::with('company')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        validate_user_permission('Manage Feedback');

        return view('testimonials.add_testomonials',[
            'user' => User::where('id', Auth::user()->id)->with(['company','testimonials'])->first()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        validate_user_permission('Manage Feedback');

        Testimonial::create([
            'user_id' => auth()->id(),
            'company_id' => $request->company_id,
            'feedback' => $request->feedback,
            'rating' => $request->rating
        ]);

        return redirect()->back()->with('success','Thank you for submitting the feedback');
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
