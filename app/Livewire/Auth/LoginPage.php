<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Login')]
#[Layout('layouts.app')]
class LoginPage extends Component
{
    public $authIdentity = '';
    public $password = '';
    public $remember = false;

    public function login()
    {
        // Login logic here
        $this->validate([
            'authIdentity' => 'required',
            'password' => 'required',
        ]);

        // Filter the user data email or username
        $filte = filter_var($this->authIdentity, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        // get the user by email or username
        $user = User::where($filte, $this->authIdentity)->where('status', 'active')->first();

        // check if user exists
        if(!$user) {
            return $this->addError('authIdentity', 'User not found');
        }else{

            // check if password matches
            $passwordMatch = Hash::check($this->password, $user->password);

            if(!$passwordMatch) {
                return $this->addError('password', 'Invalid password');
            }else{

                $credentials = [
                    $filte => $this->authIdentity,
                    'password' => $this->password,
                ];


                // attempt to login
                if(!Auth::attempt($credentials, $this->remember)) {
                    return $this->addError('password', 'Invalid credentials');
                }

                request()->session()->regenerate();

                $this->dispatch('success-toast', status:'success', title: "Login successful");

                // redirect to dashboard
                if($user->role === 'admin') {
                    $this->dispatch('redirect-after', url: route('admin.dashboard'));
                }else{
                    $this->dispatch('redirect-after', url: route('user.home', ['username' => $user->username]));
                }


            }



        }



    }


    public function render()
    {
        return view('livewire.auth.login-page');
    }
}
