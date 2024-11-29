<?php

namespace App\Http\Controllers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPasswordEmail;
use Illuminate\Support\Facades\Password;

     


class authGoogleController extends Controller
{

    // redirect login
    public function hsgoogleLogin(Request $request){

        return Socialite::driver('google')->redirect();

    }

    public function hsValidateLogin(){
        $user = Socialite::driver('google')->user();
   
            $user = User::updateOrCreate([
                'email' => $user->email,
            ], [
                'name' => $user->name,
                'email' => $user->email,
                'password' => bcrypt(uniqid()),
                'remember_token' => $user->token,
                'google_id' => $user->user['sub'],
                'profile_picture' => $user->user['picture'],
            ]);
     
        Auth::login($user);   
        return redirect('/dashboard');
    }

    public function hsuser_register(Request $request)
    {
        try {
            // Validate input
       
            $validatedData = $request->validate([
                'hs_firstname' => 'required|string|max:255',
                'hs_email' => 'required|string|email|max:255|unique:users,email',
                'hs_password' => 'required|string|min:6',
                'hs_confirmpassword' => 'required|string|min:6|same:hs_password',
            ]);


            $user = new User;
            $user->name = $request->hs_firstname;
            $user->email = $request->hs_email;
            $user->password = $request->hs_password;
            $user->save();

            Auth::login($user);   
                  
            // Your logic here if validation passes
            return response()->json(['message' => 'Validation passed','status'=>true], 200);
        
        } catch (ValidationException $e) {
            // Return response with validation error messages
            return response()->json(['errors' => $e->errors()], 422);
        }
 
    }

    public function hsuser_login(Request $request){
      try{
        
        $validatedData = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
           ]);
        if(Auth::attempt($validatedData)){
            return response()->json(['message' => 'Validation passed','status'=>true], 200);
        }else{
            return response()->json(['message' => 'Validation not pass','status'=>false], 200);
        }



      }catch (ValidationException $e) {
        // Return response with validation error messages
        return response()->json(['errors' => $e->errors()], 422);
    }


    }

    public function hs_dashbord(){

        $id = Auth::user()->id;
        $user = User::find($id);
        
        return view('admin.pages.index', ['user_data' => $user]);
    }

    public function hsuser_forgot(Request $request){

        $gmail=$request->hs_forgotemail;
        $data=User::Where('email',$gmail)->first();
        $user_id=$data->id; 
        $user_name=md5($data->name);
        $currentUrl =  url('/');
        $resetUrl = $currentUrl.'/auth/reset-password/' .$user_name."_".$user_id ; // Generate a reset URL dynamically
        Mail::to($request->email)->send(new ForgotPasswordEmail($resetUrl));
    
        return response()->json(['message' => 'Password reset email sent.','status'=>'200']);

    }


    public function hs_showResetForm(Request $request ,$token){
        $parts = explode('_', $token); // Split the string by '_'
        $name = $parts[0]; 
        $id=$parts[1];
        $user=User::find($id);
       
        $user_name=md5($user->name);
       if($user_name==$name){
          dd("show form "); 
       }else{
        dd("show not form"); 
       }
    }
   
}
