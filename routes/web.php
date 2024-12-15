<?php

use App\Http\Middleware\AdminMiddleware;
use App\Livewire\Admin\AddSchedule as AdminAddSchedule;
use App\Livewire\Admin\Dashboard as AdminDashboard;
use App\Livewire\Admin\Schedule as AdminSchedule;
use App\Livewire\Candidates;
use App\Livewire\Dashboard;
use App\Livewire\Login;
use App\Livewire\QuickCount;
use App\Livewire\Register;
use App\Livewire\Vote;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'web'])->group(function () {
    Route::group(['prefix' => 'admin', 'middleware' => [AdminMiddleware::class]], function () {});

    Route::get('/vote', Vote::class)->name('vote');
    Route::get('/logout', function () {
        auth()->guard('web')->logout();

        return redirect()->route('login');
    });
});

Route::get('/', Dashboard::class)->name('dashboard');
Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');
Route::get('/candidates', Candidates::class)->name('candidates');
Route::get('/quick-count', QuickCount::class)->name('quick-count');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth:web', AdminMiddleware::class]], function () {
    Route::get('/', AdminDashboard::class)->name('dashboard');

    Route::get('/schedules', AdminSchedule::class)->name('schedules');
    Route::get('/add-schedule', AdminAddSchedule::class)->name('schedules.add');
});

Route::middleware('auth:web')->group(function(){
    Route::get('/logout', function(){
        auth()->guard('web')->logout();
        return redirect()->route('login');
    })->name('logout');
});