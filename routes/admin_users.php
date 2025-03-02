<?php


use App\Livewire\Admin\BuyData;
use App\Livewire\Admin\Data;
use App\Livewire\Admin\UserDashboard;
use Illuminate\Support\Facades\Route;
use phpDocumentor\Reflection\Location;

Route::middleware('auth')->group(function () {
    Route::get('/user-dashboard', UserDashboard::class)->name('admin.user-dashboard');
    Route::get('admin_by_data', BuyData::class)->name('admin.buy-data');
    Route::get('buy-data', Data::class)->name('admin.data');
    Route::get('/location', \App\Livewire\Admin\Locations::class)->name('admin.location');



});
