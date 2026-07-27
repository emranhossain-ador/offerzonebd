<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function googleLogin()
    {
        return Socialite::driver('google')->redirect();
    }


    public function googleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::where('google_id', $googleUser->id)->first();

            if ($user) {
                Auth::login($user);
                return redirect()->route('user.home', ['username' => $user->username]);
            }else{

                $userdata = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'username' => Str::slug($googleUser->name) . rand(1000,9999),
                    'images' => $googleUser->avatar,
                    'google_id' => $googleUser->id,
                    'password' => Hash::make('password@123'),
                ]);

                if($userdata){
                    Auth::login($userdata);
                    return redirect()->route('user.home', ['username' => $userdata->username]);
                }

            }

        } catch (\Exception $e) {
            dd($e);
        }

    }



    public function logout(Request $request) {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
