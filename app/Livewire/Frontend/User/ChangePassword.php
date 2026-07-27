<?php

namespace App\Livewire\Frontend\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('Change Password')]
#[Layout('layouts.user.user-app')]
class ChangePassword extends Component
{
    public string $username;
    public string $current_password;
    public string $new_password;
    public string $confirm_password;

    public function mount(string $username)
    {
        $this->username = $username;
    }

    public function changePassword()
    {
        $this->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        ]);

        $user = User::where('username', $this->username)->first();

        if (!$user) {
            session()->flash('error', 'User not found');
            return redirect()->route('register');
        }


        if (!Hash::check($this->current_password, $user->password)) {
            $this->addError('current_password', 'Current password does not match');
            return;
        }

        User::where('id', $user->id)->update([
            'password' => Hash::make($this->new_password),
        ]);

        session()->flash('success', 'Password changed successfully');
        return redirect()->route('user.settings', $this->username);
    }


    public function render()
    {
        $data = [];
        $data['username'] = $this->username;
        return view('livewire.frontend.user.change-password', $data);
    }
}
