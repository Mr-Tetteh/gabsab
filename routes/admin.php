<?php

use App\Http\Middleware\EnsureRoleIsAdmin;
use App\Livewire\Admin\BundlePlans;
use App\Livewire\Admin\Contracts;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Faqs;
use App\Livewire\Admin\HomeService;
use App\Livewire\Admin\PurcahseData;
use App\Livewire\Admin\Users;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', Dashboard::class)->name('admin.dashboard')->middleware(EnsureRoleIsAdmin::class);
        Route::get('purchased_data', PurcahseData::class)->name('admin.purchased-data')->middleware(EnsureRoleIsAdmin::class);
        Route::get('faqs', Faqs::class)->name('admin.faqs')->middleware(EnsureRoleIsAdmin::class);
        Route::get('users', Users::class)->name('admin.users')->middleware(EnsureRoleIsAdmin::class);
        Route::get('bundle_plans', BundlePlans::class)->name('admin.bundle-plans')->middleware(EnsureRoleIsAdmin::class);
        Route::get('home_service_plans', HomeService::class)->name('admin.home-service-plans')->middleware(EnsureRoleIsAdmin::class);
        Route::get('contract', Contracts::class)->name('admin.contracts')->middleware(EnsureRoleIsAdmin::class);
    });


});
