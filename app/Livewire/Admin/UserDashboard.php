<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class UserDashboard extends Component
{
    #[Layout('layout.admin.partials.website-base-admin')]

    public function render()
    {
        $user = Auth::user();

        return view('livewire.admin.user-dashboard', compact('user'));
    }
}
