<?php

use App\Livewire\Admin\UserDashboard;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', \App\Livewire\Admin\Dashboard::class)->name('admin.dashboard');
    Route::get('buy-data', \App\Livewire\Admin\Data::class)->name('admin.data');
    Route::get('top-up', \App\Livewire\Admin\TopUps::class)->name('admin.top-up');
    Route::get('user-dashboard', UserDashboard::class)->name('admin.user-dashboard');
});
