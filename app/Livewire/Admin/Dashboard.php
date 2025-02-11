<?php

namespace App\Livewire\Admin;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Dashboard extends Component
{
    #[Layout('layout.admin.partials.website-base-admin')]

    public function render()
    {
        $user = Auth::user();
        $all_users = User::all()->count();
        $admin_users = User::where('role', 'admin')->count();
        $resellers_users = User::where('role', 'reseller')->count();
        $user_users = User::where('role', 'user')->count();
        $today_users = User::whereDate('created_at', now()->toDateString())->count();
        $all_data = \App\Models\Data::all()->count();
        $today_data = \App\Models\Data::whereDate('created_at', now()->toDateString())->count();


        $data_purchase = \App\Models\Data::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->pluck('count', 'date');

        return view('livewire.admin.dashboard', compact('user', 'all_users',
            'admin_users', 'today_users', 'all_data', 'today_data', 'resellers_users', 'user_users','data_purchase'));
    }
}
