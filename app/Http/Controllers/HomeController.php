<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    

    public  function hs_getindex(Request $request){
       
             return view('index');

    }

}
