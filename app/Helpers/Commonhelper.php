<?php

//learning purpose.. 
/*
If we have static funcion we don't create the object of the function
like public static function checkValue()
*/


function setRoute($route)
{
    return request()->routeIs($route) ? 'active' : '';
}