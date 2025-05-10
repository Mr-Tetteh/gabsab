<?php

use Illuminate\Support\Facades\Route;

Route::prefix('users')->group(function () {
    Route::get('/', \App\Livewire\User\Homepage::class)->name('users.home');
    Route::get('about', \App\Livewire\User\About::class)->name('users.about');
    Route::get('contact', \App\Livewire\User\Contact::class)->name('users.contact');
});
