<?php

namespace App\Livewire\Admin;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class UserDashboard extends Component
{
    #[Layout('layout.admin.partials.website-base-admin')]

    public function render()
    {
        $user = Auth::user();
        $user_id = Auth::id();

        $logged_in_user_data = \App\Models\Data::where('user_id',$user_id)->count();
        $today_purchase = \App\Models\Data::whereDate('created_at',  now()->toDateString())->where('user_id', $user_id)->count();

        return view('livewire.admin.user-dashboard', compact('user' , 'logged_in_user_data', 'today_purchase'));
    }
}
