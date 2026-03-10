<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchoolProfileController;
use App\Http\Controllers\CompanyProfileController;
use App\Http\Controllers\DailyEntryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile',[ProfileController::class,'edit'])->name('profile.edit');
    Route::patch('/profile',[ProfileController::class,'update'])->name('profile.update');
    Route::delete('/profile',[ProfileController::class,'destroy'])->name('profile.destroy');

    Route::view('/print','print.index')->name('print.index');

    // SETTINGS
    Route::get('/settings/school',[SchoolProfileController::class,'edit'])->name('settings.school');
    Route::post('/settings/school',[SchoolProfileController::class,'update'])->name('settings.school.update');

    Route::get('/settings/account',[ProfileController::class,'edit'])->name('settings.account');

    Route::get('/settings/company',[CompanyProfileController::class,'edit'])->name('settings.company');
    Route::post('/settings/company',[CompanyProfileController::class,'update'])->name('settings.company.update');

    // ENTRIES
    Route::get('/entries',[DailyEntryController::class,'index'])->name('entries.index');
    Route::get('/entries/create',[DailyEntryController::class,'create'])->name('entries.create');
    Route::post('/entries',[DailyEntryController::class,'store'])->name('entries.store');
    Route::get('/entries/{id}/edit',[DailyEntryController::class,'edit'])->name('entries.edit');
    Route::put('/entries/{id}',[DailyEntryController::class,'update'])->name('entries.update');
    Route::delete('/entries/{id}',[DailyEntryController::class,'destroy'])->name('entries.destroy');

});

require __DIR__.'/auth.php';