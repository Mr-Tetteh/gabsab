<?php

use App\Http\Middleware\EnsureRoleIsAdmin;
use App\Livewire\Admin\DailyBundle;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Faqs;
use App\Livewire\Admin\HomeService;
use App\Livewire\Admin\PurcahseData;
use App\Livewire\Admin\Users;
use App\Livewire\Admin\Weekly;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', Dashboard::class)->name('admin.dashboard')->middleware(EnsureRoleIsAdmin::class);
        Route::get('purchased_data', PurcahseData::class)->name('admin.purchased-data')->middleware(EnsureRoleIsAdmin::class);
        Route::get('faqs', Faqs::class)->name('admin.faqs')->middleware(EnsureRoleIsAdmin::class);
        Route::get('users', Users::class)->name('admin.users')->middleware(EnsureRoleIsAdmin::class);
        Route::get('agents', \App\Livewire\Admin\Agents::class)->name('admin.agents')->middleware(EnsureRoleIsAdmin::class);
        Route::get('daily_bundle', DailyBundle::class)->name('admin.bundle-plans')->middleware(EnsureRoleIsAdmin::class);
        Route::get('weekly_bundle', HomeService::class)->name('admin.home-service-plans')->middleware(EnsureRoleIsAdmin::class);
        Route::get('monthly_bundle', \App\Livewire\Admin\MonthlyBundles::class)->name('admin.monthly')->middleware(EnsureRoleIsAdmin::class);
        Route::get('weekly', Weekly::class)->name('admin.weekly')->middleware(EnsureRoleIsAdmin::class);
        Route::get('agents_history', \App\Livewire\Admin\AgentsHistory::class)->name('admin.agent_history')->middleware(EnsureRoleIsAdmin::class);
    });

});
