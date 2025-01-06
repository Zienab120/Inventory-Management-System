<?php

namespace App\Http\Controllers;
use Exception;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Laravel\Socialite\SocialiteServiceProvider;

class SocialiteController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function HandleGoogleCallback()
    {
        try {
            $social_id = Socialite::driver('google')->user();
            $user = User::where('social_id', $social_id)->first();
            if($user)
            {
                Auth::login($user);
                return response()->json($user);
            }
            else
            {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => Hash::make('password'),
                    'social_id' => $user->id,
                    'social_type' => 'google'
                ]);
                Auth::login($newUser);
                return response()->json($user);
            }

        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }

    public function HandleFacebookCallback()
    {
        try {
            $social_id = Socialite::driver('facebook')->user();
            $user = User::where('social_id', $social_id)->first();
            if($user)
            {
                Auth::login($user);
                return response()->json($user);
            }
            else
            {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => Hash::make('password'),
                    'social_id' => $user->id,
                    'social_type' => 'facebook'
                ]);
                Auth::login($newUser);
                return response()->json($user);
            }

        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }
}
