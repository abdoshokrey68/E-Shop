<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use Exception;
use App\Models\User;

class GoogleController extends Controller
{

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('google_id', $user->id)->first();
            if($finduser){

                Auth::login($finduser);

                return redirect()->route('home');

            } else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('987651324abdoshokrey!@#$%^&*')
                ]);

                Auth::login($newUser);

                return redirect()->route('home');
            }

        } catch (Exception $e) {
            return redirect()->route('login');
        }
    }
}
