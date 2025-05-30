<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', \App\Livewire\Portal\Profile\Index::class)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





Route::get('/', \App\Livewire\Portal\Home\Index::class)->name('home');
Route::get('/pricing', \App\Livewire\Portal\Pricing\Index::class)->name('pricing');
Route::get('/resume', \App\Livewire\Portal\Resume\Index::class)->name('resume');


Route::get('builder/{template}/template/{resume?}', \App\Livewire\Portal\Builder\Index::class)->name('builder');

require __DIR__ . '/auth.php';
