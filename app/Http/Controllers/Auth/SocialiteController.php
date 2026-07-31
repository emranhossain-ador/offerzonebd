<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
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

            if (empty($googleUser->email)) {
                return redirect()->route('login')
                    ->with('error', 'Google account has no email address.');
            }

            // 1. Try to find the user by google_id
            $user = User::where('google_id', $googleUser->id)->first();

            if (!$user) {

                $user = User::where('email', $googleUser->email)->first();

                // Link Google account
                if ($user) {

                    $user->google_id = $googleUser->id;

                    if (is_null($user->email_verified_at)) {
                        $user->email_verified_at = now();
                    }

                    $user->save();
                }
            }
            

            if ($user) {
                Auth::login($user, true);
                return redirect()->route('user.home', ['username' => $user->username]);
            } else {
                // 3. Create a new user
                $userdata = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'username' => $this->_username($googleUser->name),
                    'google_id' => $googleUser->id,
                    'password' => Hash::make('123456'),
                    'email_verified_at' => now(),
                    'status' => 'active',
                    'role' => 'user',
                ]);

                if ($userdata) {
                    Auth::login($userdata, true);
                    return redirect()->route('user.home', ['username' => $userdata->username]);
                }
            }

        } catch (\Exception $e) {
            Log::error('Google Login Error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return redirect()->route('login')
                ->with('error', 'Google login failed. Please try again.');
        }
    }



    public function _username(string $name){
        do {
            $username = Str::slug($name) . '-' . random_int(1000, 9999);
        } while (User::where('username', $username)->exists());
        return $username;
    }



    public function logout(Request $request) {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
