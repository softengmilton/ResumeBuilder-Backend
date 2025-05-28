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
});





Route::get('/home', \App\Livewire\Portal\Home\Index::class)->name('home');
Route::get('/pricing', \App\Livewire\Portal\Pricing\Index::class)->name('pricing');
Route::get('/resume', \App\Livewire\Portal\Resume\Index::class)->name('resume');




require __DIR__ . '/auth.php';
