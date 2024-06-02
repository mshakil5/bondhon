<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Exception;

class SocialLoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
      
            $user = Socialite::driver('google')->user();
       
            // dd($user);
            $finduserbyemail = User::where('email', $user->email)->whereNull('google_id')->first();

            if ($finduserbyemail) {

                $upuser = User::find($finduserbyemail->id); 
                $upuser->google_id = $user->id;
                $upuser->save();
                Auth::login($upuser);
                return redirect()->intended('user/user-profile');
            } else {
                
                $finduser = User::where('google_id', $user->id)->first();
                if($finduser){
                    Auth::login($finduser);
                    return redirect()->intended('user/user-profile');
                }else{
                    $newUser = User::create([
                        'name' => $user->name,
                        'email' => $user->email,
                        'google_id'=> $user->id,
                        'password' => Hash::make('123456')
                    ]);
                    Auth::login($newUser);
                    return redirect()->intended('user/user-profile');
                }
            }
            
       
            
      
        } catch (Exception $e) {
            // dd($e->getMessage());
                return redirect()->intended('home');
        }
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $finduser = User::where('facebook_id', $user->id)->first();
            if($finduser){
                Auth::login($finduser);
                return redirect()->intended('user/user-profile');
            }else{
                $newUser = User::updateOrCreate(['email' => $user->email],[
                        'name' => $user->name,
                        'facebook_id'=> $user->id,
                        'password' => Hash::make('123456')
                    ]);
        
                Auth::login($newUser);
        
                return redirect()->intended('user/user-profile');
            }
       
        } catch (Exception $e) {
            // dd($e->getMessage());
            return redirect()->intended('home');
        }
    }


}
