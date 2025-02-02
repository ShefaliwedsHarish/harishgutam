<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SliderImages;
use App\Models\User;
// use App\Http\Controllers\GloballyController;
use Auth;

class SettingController extends Controller
{
 
 
    /*** Slider Part ***/

 public function hs_slider(Request $request){

    $id = Auth::user()->id;
    $user = User::find($id);
    $slider=SliderImages::where('status',1)->get(); 
     return view('admin.pages.slider', ['user_data' => $user,'slider_image'=>$slider]);


 }


 /*** Slider Part ***/
 public function hs_save_slider_image(Request $request){

    $validated = $request->validate([
        'images' => 'required',
    ]);
    try {

        if ($validated) {
            $uploadPath = public_path('slider');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
    // Store the image
    if ($request->file('images')) {
        $date=date('d-m-Y'); 
         $fulldate = str_replace("-", "", $date);
         $imageName = time() .'-'.$fulldate.'.' . $request->images->extension();
         $request->images->move($uploadPath, $imageName);
         if(isset($request->status)){
            $status=1;
         }else{
            $status=0; 
         }
  
         $slider = new SliderImages();
         $slider->folder_name= 'slider';
         $slider->image_name =$imageName;
         $slider->image_description = $request->details;
         $slider->status =$status;
         $slider->save();
   
        }    
        $slider=SliderImages::where('status',1)->get(); 
        $config = env('APP_ENV') == 'live' ? config('live_path.craousal') : config('path.craousal');
            return response()->json([
                'status' => 'success',
                'message' => 'Images saved successfully.',
                'data' => $slider,
                'images_path'=>$config
            ], 200);
    
        }
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'There was an error saving the service: ' . $e->getMessage()
        ], 500); // HTTP 500 Internal Server Error
    }
    
 
    // If validation fails, Laravel will automatically handle it and return the validation errors as JSON response.
    return response()->json([
        'status' => 'error',
        'message' => 'Validation failed.',
        'errors' => $validated
    ], 422); // HTTP 422 Unprocessable Entity   
 }

 public function hs_homepage(Request $request){
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('admin.pages.home', ['user_data' => $user]);

 }

 public function hs_booking(Request $request){
    return view('booking.booking'); 
 }

}
