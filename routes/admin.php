<?php

use App\Livewire\Admin\UserDashboard;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', \App\Livewire\Admin\Dashboard::class)->name('admin.dashboard');
        Route::get('buy-data', \App\Livewire\Admin\Data::class)->name('admin.data');
        Route::get('user-dashboard', UserDashboard::class)->name('admin.user-dashboard');
        Route::get('purchased_data', \App\Livewire\Admin\PurcahseData::class)->name('admin.purchased-data');
        Route::get('faqs', \App\Livewire\Admin\Faqs::class)->name('admin.faqs');
        Route::get('users', \App\Livewire\Admin\Users::class)->name('admin.users');
        Route::get('bundle_plans', \App\Livewire\Admin\BundlePlans::class)->name('admin.bundle-plans');
    });


});
