<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CVProfileController;

// Nonaktifkan route bawaan yang memanggil langsung view welcome
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [CVProfileController::class, 'index'])->name('cv.profile');
Route::get('/portofolio/{slug}', [CVProfileController::class, 'showPortofolio'])->name('portofolio.show');

Route::get('/profile/edit', [CVProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update', [CVProfileController::class, 'store'])->name('profile.update');
