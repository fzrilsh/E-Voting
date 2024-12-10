<?php

use App\Http\Middleware\AdminMiddleware;
use App\Livewire\Dashboard;
use App\Livewire\Login;
use App\Livewire\Register;
use App\Livewire\Vote;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'web'])->group(function () {
    Route::group(['prefix' => 'admin', 'middleware' => [AdminMiddleware::class]], function(){
        
    });

    Route::get('/vote', Vote::class)->name('vote');
});

Route::get('/', Dashboard::class)->name('dashboard');
Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');
