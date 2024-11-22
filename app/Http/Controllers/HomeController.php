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

 /* online service us page */
     public function hs_onlineservice(Request $request){
    
      $services = [
        ['name' => 'PF Filing', 'description' => 'Help with Provident Fund Filing' ,'link_text1'=>'EPFO','link_url1'=>'Balance check'],
        ['name' => 'ITR Filing', 'description' => 'Assistance with Income Tax Returns'],
        ['name' => 'Testing', 'description' => 'Testing of this'],
        // Add more services as needed
    ];

    return view('online', compact('services'));
}

     }
  

