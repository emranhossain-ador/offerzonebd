<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Privacy Policy')]
#[Layout('layouts.app')]
class PrivacyPolicy extends Component
{
    public function render()
    {
        return view('livewire.frontend.privacy-policy');
    }
}
