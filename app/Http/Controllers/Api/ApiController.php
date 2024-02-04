<?php

namespace App\Http\Controllers\Api;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function fetchCc(Request $request)
    {
        $city = $request->input('country_id');

        $checkData = City::where('country_id',$city)->get();

        return response()->json($checkData);
    }
}
