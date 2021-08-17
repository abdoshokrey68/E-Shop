<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Validator;
use Socialite;
use Exception;
use Auth;

class FbController extends Controller
{
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookSignin()
    {
        try {


            $user = Socialite::driver('facebook')->user();

            // return $user;

            $facebookId = User::where('facebook_id', $user->id)->first();

            if($facebookId){
                // dd(3);
                Auth::login($facebookId);
                return redirect()->route('home');
            }else{
                // dd(1);
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'facebook_id' => $user->id,
                    'password' => encrypt('987651234abdoshokrey!@#$%^&*')
                ]);
                return $createUser;
                Auth::login($createUser);
                return redirect()->route('home');
            }

        } catch (Exception $exception) {
            // dd(2);
            return redirect()->route('login');
        }
    }
}
