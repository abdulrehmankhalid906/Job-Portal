<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TestApiController extends Controller
{
    //
    // public function RetriveUserDate($id=null)
    public function RetriveUserDate()
    {
        $user = User::all();
        // $user = User::find($id) ?? User::all();

        return($user);
        // [
        //     [
        //         'name' => 'Irene',
        //         'phone'=> '+370 615 93 560',
        //         'message'=> 'I am angry with Vicky'
        //     ],
        //     [
        //         'name' => 'Vicky',
        //         'phone'=> '+92341 599212994',
        //         'message'=> 'I love Irene so much'
        //     ]
        // ];
    }
}
