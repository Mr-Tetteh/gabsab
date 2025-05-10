<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/location', \App\Livewire\Admin\Locations::class)->name('admin.location');
    Route::get('/leaders', \App\Livewire\Admin\Leaders::class)->name('admin.leaders');

});
