<?php

namespace App\Livewire\Frontend;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('About Us')]
#[Layout('layouts.app')]
class AboutUs extends Component
{
    public function render()
    {
        return view('livewire.frontend.about-us');
    }
}
