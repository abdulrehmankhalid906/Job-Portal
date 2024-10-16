<?php

use Illuminate\Support\Facades\Auth;

//learning purpose.. 
/*
If we have static funcion we don't create the object of the function
like public static function checkValue()
*/

function validate_user_permission($permission)
{
    $user = Auth::user();
    // dd($user->can($permission));

    if ($user && $user->can($permission)) {
        return true;
    }
    return abort(403, 'Unauthorized action.');
}


function setRoute($route)
{
    return request()->routeIs($route) ? 'active' : '';
}