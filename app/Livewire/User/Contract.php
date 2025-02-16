<?php

namespace App\Livewire\User;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Contract extends Component
{
    #[Layout('layout.user.partials.website-base-user')]





    public function render()
    {
        return view('livewire.user.contract');
    }
}
