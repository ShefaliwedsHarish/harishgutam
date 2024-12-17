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
use DateTime;

     


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

  

    public function hsuser_forgot(Request $request)
        {
            try {
                $gmail = $request->hs_forgotemail;
                if (!$gmail) {
                    return response()->json(['message' => 'Email is required', 'status' => false], 200);
                }
                $data = User::where('email', $gmail)->first();
                if (!$data) {
                    return response()->json(['message' => 'User not found', 'status' => false], 200);
                }
                $user_id=$data->id; 
                $user_name=md5($data->name);
                $token=$user_name."_".$user_id;
                $resetUrl = url('/auth/reset-password/' . $token);
                Mail::to($gmail)->send(new ForgotPasswordEmail($resetUrl, $gmail));
                $date = date("Y-m-d H:i:s"); 
                $data->remember_token = $token; 
                $data->valid_time=$date;#// Assign token directly
                $data->save(); // Save the changes to the database

             
                return response()->json(['message' => 'Password reset email sent', 'status' => true], 200);
            } catch (\Exception $e) {
                // Log the error for debugging
                \Log::error('Error in hsuser_forgot: ' . $e->getMessage());
                return response()->json(['message' => 'An error occurred', 'status' => false], 500);
            }
        }

    public function hs_showResetForm(Request $request ,$token){
                $parts = explode('_', $token); // Split the string by '_'
                $name = $parts[0]; 
                $id=$parts[1];
                $user=User::find($id);
           
                if(!empty($user)){
                     $time=$user->valid_time;
                    $date = date("Y-m-d H:i:s");  
                    $validTime = new DateTime($time);
                    $currentTime = new DateTime($date);
                    $interval = $validTime->diff($currentTime);          
                     $validite=env('MAIL_VAILD_TIME');
                    if($interval->i>=$validite){
                        return view('password.reset_password',['expire' =>$interval->i ]);
                    }else{
                        $user_name=md5($user->name);
                        if($user_name==$name){
                               return view('password.reset_password', ['user' => $user,'token'=>$name]);
                        }else{
                            return view('password.reset_password');
                        }
                    }
                }else{
                               return view('password.reset_password');

                }   
     
    }
    public function hs_change_password(Request $request){

        $validatedData = $request->validate([
            'hs_password' => 'required|string|min:6',
            'hs_confirmpassword' => 'required|string|min:6|same:hs_password',
            'user_id' => 'required|exists:users,id', // Ensure user_id exists in the users table
        ]);
  
    
        // Find the user by ID
        $user = User::find($request->user_id);
        // $url = url("auth/reset-password/" . $request->token . "_" . $request->user_id);

      
        $user_name=md5($user->name);
      

        // if($user_name==$request->user_token)

        if($user_name==$request->user_token){

            $user->password = $request->hs_password;
            $user->save();
           
            return view('password.reset_password')->with([
                'success' => 'Password updated successfully!',
              ]);
            
        }  else{
           
            return view('password.reset_password')->with([
                'error' => 'Invalid token.',
                'user' => $user,
                'token' => $request->user_token,
            ]);
        }
    }

   



}
