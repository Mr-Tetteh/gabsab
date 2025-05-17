<?php

namespace App\Livewire\Admin;

use App\Models\Data;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class UserDashboard extends Component
{
    #[Layout('layout.admin.partials.website-base-admin')]

    public function render()
    {
        $data =  Data::where('user_id', Auth::id());
        $all_data = Data::where('user_id', Auth::id())->count();
        $today_data =  Data::where('user_id', Auth::id())->whereDate('created_at', now()->toDateString())->count();
        $user =  User::where('id', Auth::id())->first();
        $data_purchase = \App\Models\Data::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')->where('user_id', Auth::id())
            ->pluck('count', 'date');
        return view('livewire.admin.user-dashboard', compact('data', 'user', 'all_data', 'today_data', 'data_purchase'));
    }
}
