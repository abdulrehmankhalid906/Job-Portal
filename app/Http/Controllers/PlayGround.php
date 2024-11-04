<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class PlayGround extends Controller
{
    public function index()
    {
        //
        // $session = session();
        $a = EncryptId(1200);
        $b = DecryptId('X6UT0MMM1PWSW7T2423');

        dd($a,$b);
    }
}
