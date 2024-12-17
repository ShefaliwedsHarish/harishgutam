<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Service;
use Auth;

class ServiceController extends Controller
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
        $service=Service::get(); 
        return view('admin.pages.Service', ['user_data' => $user,'service'=>$service]);
    }

       /*****Function for  Add price ****** */
       public function hs_price(Request $request){

        $id = Auth::user()->id;
        $user = User::find($id);
        $service=Service::get();
        return view('admin.pages.price', ['user_data' => $user,'service'=>$service]);

    }

     /*****Function for  Add price ****** */
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
        
                return response()->json([
                    'status' => 'success',
                    'message' => 'Service saved successfully.',
                    'data' => $service
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
