<?php

namespace App\Http\Controllers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use App\Models\User;

class authGoogleController extends Controller
{
     
    // redirect login
    public function hsgoogleLogin(Request $request){

        return Socialite::driver('google')->redirect();

    }

    public function hsValidateLogin(){
        $user = Socialite::driver('google')->user();
        // echo "<pre>";
        // print_r($user); 
        // dd($user->user['sub']);


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
     
        // Auth::login($user);
     
        // return redirect('/dashboard');

    }
   
}
