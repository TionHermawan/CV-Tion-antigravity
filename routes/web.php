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

// Helper route untuk shared hosting
Route::get('/symlink-storage', function () {
    $targetFolder = storage_path('app/public');
    $linkFolder = public_path('storage');
    // Jika tidak bisa pakai symlink(), alternatif lain copas dari artisan
    if (!file_exists($linkFolder)) {
        symlink($targetFolder, $linkFolder);
        return 'Storage Link Configured Successfully! The symlink has been created.';
    }
    return 'Storage Link already exists!';
});
