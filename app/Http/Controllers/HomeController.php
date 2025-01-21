<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\SliderImages; 

class HomeController extends Controller
{
    
  

public function emailtest(Request $request)
{
    $to_email = "hariom1gyan@gmail.com";
    Mail::raw('Heelo my name is harish gautam .', function ($message) use ($to_email) {

        $message->to($to_email)
                ->subject('Forgot password');
    });

    dd("Simple Email Sent Successfully!");
}




    /* Home  page */
    public  function hs_getindex(Request $request){  
        $slider=SliderImages::where('status',1)->get(); 
        return view('index',['slider_image'=>$slider]);
            
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
  

