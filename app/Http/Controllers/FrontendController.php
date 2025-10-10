<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
   function welcome(){
    $properties =  \App\Models\Property::all();
    return view ('welcome',compact('properties'));
   }
}
