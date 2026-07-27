<?php

namespace App\Livewire\Frontend\Profile;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('Profile')]
#[Layout('layouts.user.user-app')]
class ProfilePage extends Component
{
    public string $username = '';

    public string $name = '';
    public string $email = '';
    public string $phone = '';

    public function mount(string $username): void
    {
        $this->username = $username;
        $user = _getByUsername($username);

        if($user){
            $this->name = $user->name;
            $this->email = $user->email;
            $this->phone = $user->phone ?? '';
        }
    }


    public function updateProfile()
    {
        $this->validate([
            'name' => 'required|string|min:2|max:255',
            'email' => 'required|email|unique:users,email,' . _auth()->id,
            'phone' => 'nullable|string|min:11|max:11',
        ]);

        $user = User::find(_auth()->id);

        if ($user) {
            $user->name = $this->name;
            $user->email = $this->email;
            $user->phone = $this->phone;
            $user->save();
            session()->flash('success', 'Profile updated successfully');
            return redirect()->route('user.profile', $this->username);
        }
    }


    public function render()
    {
        $data = [];
        $data['username'] = $this->username;
        return view('livewire.frontend.profile.profile-page', $data);
    }
}
