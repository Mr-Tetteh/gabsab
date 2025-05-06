<?php


use App\Livewire\Admin\BuyData;
use App\Livewire\Admin\Data;
use App\Livewire\Admin\UserDashboard;
use Illuminate\Support\Facades\Route;
use phpDocumentor\Reflection\Location;

Route::middleware('auth')->group(function () {
    Route::get('/location', \App\Livewire\Admin\Locations::class)->name('admin.location');
    Route::get('/leaders', \App\Livewire\Admin\Leaders::class)->name('admin.leaders');



});
