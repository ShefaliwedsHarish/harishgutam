<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    

    /* Home  page */
    public  function hs_getindex(Request $request){  
             return view('index');
    }

  /* About us page */

    public function hs_getabout(Request $request){

           return view('about_us');
    }

    /* Contact us page */
    public function hs_getcontact(Request $request){
        return view('contact');
     }

  
}
