<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Service;
use App\Models\service_price;
use App\Models\SliderImages;
// use App\Http\Controllers\GloballyController;
use Auth;

class ServiceController extends GloballyController
{
    

    /*****Function for KST Service ****** */
    public function hs_kst(Request $request){

        $id = Auth::user()->id;
        $user = User::find($id);
        $service=Service::get(); 
        return view('admin.pages.kst', ['user_data' => $user,'service'=>$service]);

    }
   
    /*****Function for  Service Add****** */
    public function hs_service(Request $request){

        $id = Auth::user()->id;
        $user = User::find($id);
        $services = Service::with('price')->get();
        // $services = Service::get();
        // dd($services['0']->price);

        return view('admin.pages.Service', ['user_data' => $user,'service'=>$services]);
    }

       /*****Function for  Add price ****** */
       public function hs_price(Request $request){

       
        $id = Auth::user()->id;
        $user = User::find($id);
        $service=Service::get();
        return view('admin.pages.price', ['user_data' => $user,'service'=>$service]);

    }

     /*****Function for  Add Service ****** */
     public function hs_save_service_submit(Request $request){
        $validated = $request->validate([
            'service_name' => 'required|unique:service,name',
            'department' => 'required',
        ]);
        
        try {
            if ($validated) {
                $status = isset($request->status) ? 1 : 0;
        
                $service = new Service();
                $service->name = $request->service_name;
                $service->depart = $request->department;
                $service->description = $request->description;
                $service->duration = $request->duration;
                $service->status = $status;
                $service->save();
                $all_Serive = Service::with('price')->get();
        
                return response()->json([
                    'status' => 'success',
                    'message' => 'Service saved successfully.',
                    'data' => $all_Serive
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
        
    

    /*****Function for  Add price ****** */

    public function hs_save_price_submit(Request $request){
       
    
        $validated = $request->validate([
            'service_id' => 'required',
            'total_price' => 'required',
            'apc'=>'required',
        ]);
        
        try {
            if ($validated) {
                $grand_total=$request->apc+$request->total_price;
                $price = new service_price();
                $price->service_id= $request->service_id;
                $price->price = $request->total_price;
                $price->total_price = $request->apc;
                $price->grand_price =$grand_total;
                $price->save();
        
                return response()->json([
                    'status' => 'success',
                    'message' => 'Price saved successfully.',
                    'data' => $price
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

    /** Delete Function  **/
    public function hs_delete(Request $request, $id, $tag)
       {
                
          if ($tag == "Service") {
                $data = Service::find($id);
                   } elseif ($tag == "Price") {
                     $data = service_price::find($id);
                } elseif ($tag == "Slider") {
                    $data = SliderImages::find($id);
               }else {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Invalid tag specified.',
                    ], 400); // Bad Request
                    }
                    if (!$data) {
                        return response()->json([
                            'status' => 'error',
                            'message' => 'Data not found.',
                        ], 404);
                    }
                    $data->delete();
                    return response()->json([
                        'status' => 200,
                        'message' => ucfirst($tag) . ' deleted successfully.',
                        'data' => $id,
                    ], 200);
          }




          /*** Edit Form ***/
        public function hs_service_edit (Request $request, $eid, $tag){

            if ($tag == "Service") {
                $data = Service::with('price')->find($eid);
                // $data = Service::find($eid);
               
                $html = $this->service_form($data);
                // $this->create_form($data);
                      } elseif ($tag == "Price") {
                     

                } else {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Invalid tag specified.',
                    ], 400); // Bad Request
                    }

                    
                    return response()->json([
                        'status' => 200,
                        'html' => $html,
                    ], 200);

        }

 /*** Slider Part ***/

 public function hs_slider(Request $request){

    $id = Auth::user()->id;
    $user = User::find($id);
    $slider=SliderImages::where('status',1)->get(); 
    // dd($slider);
    return view('admin.pages.slider', ['user_data' => $user,'slider_image'=>$slider]);


 }
 public function hs_save_slider_image(Request $request){

    // dd('heelo this is testing'); 
    // dd($request->all());
    
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

  

}
