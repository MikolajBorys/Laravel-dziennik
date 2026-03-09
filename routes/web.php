<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchoolProfileController;
use App\Http\Controllers\CompanyProfileController;

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
    Route::view('/entries/create', 'entries.create')->name('entries.create');
    Route::view('/entries/edit', 'entries.edit')->name('entries.edit');

    Route::view('/print', 'print.index')->name('print.index');


    //Nowe Route'y - podpięte do formularza w widokach
    Route::get('/settings/school', [SchoolProfileController::class, 'edit'])->name('settings.school');
    Route::post('/settings/school', [SchoolProfileController::class, 'update'])->name('settings.school.update');

    Route::get('/settings/account', [ProfileController::class, 'edit'])->name('settings.account');
    Route::get('/settings/company', [CompanyProfileController::class, 'edit'])->name('settings.company');
    Route::post('/settings/company', [CompanyProfileController::class, 'update'])->name('settings.company.update');
});

require __DIR__.'/auth.php';
