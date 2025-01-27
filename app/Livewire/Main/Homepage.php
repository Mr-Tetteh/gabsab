<?php

namespace App\Livewire\Main;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Homepage extends Component
{
    #[Layout('layout.user.partials.website-base-user')]

    public function render()
    {
        return view('livewire.main.homepage');
    }
}
