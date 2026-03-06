<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::view('/entries', 'entries.index')->name('entries.index');
    Route::view('/print', 'print.index')->name('print.index');

    Route::view('/settings/school', 'settings.school')->name('settings.school');
    Route::view('/settings/company', 'settings.company')->name('settings.company');
});

require __DIR__.'/auth.php';
