<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Registration')]
#[Layout('layouts.app')]
class RegistrationPage extends Component
{

    public $name = '';
    public $username = '';
    public $email = '';
    public $phone = '';
    public $password = '';
    public $password_confirmation = '';


    public function register()
    {
        // Registration logic here
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'password_confirmation' => 'required|string|same:password',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'phone' => $this->phone,
            'password' => Hash::make($validated['password']),
        ]);


        $this->dispatch('success-toast', status:'success', title: "Registration successful");

        $this->dispatch('redirect-after', url: route('login'));
    }

    public function render()
    {
        return view('livewire.auth.registration-page');
    }
}
