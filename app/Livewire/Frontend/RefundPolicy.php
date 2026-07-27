<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Refund Policy')]
#[Layout('layouts.app')]
class RefundPolicy extends Component
{
    public function render()
    {
        return view('livewire.frontend.refund-policy');
    }
}
