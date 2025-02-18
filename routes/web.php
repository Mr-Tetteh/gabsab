<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', \App\Livewire\Main\Homepage::class)->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/sms', function () {
    return sendWithSMSONLINEGH('233559724772', 'hello World', sender: 'GABSAB');

});

require __DIR__.'/auth.php';
require __DIR__.'/users.php';
require __DIR__.'/admin.php';
require __DIR__.'/admin_users.php';
