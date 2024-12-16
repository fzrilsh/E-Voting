<?php

use App\Http\Middleware\AdminMiddleware;
use App\Livewire\Admin\AddCandidate as AdminAddCandidate;
use App\Livewire\Admin\AddSchedule as AdminAddSchedule;
use App\Livewire\Admin\AddSerialNumber as AdminAddSerialNumber;
use App\Livewire\Admin\Candidates as AdminCandidates;
use App\Livewire\Admin\Dashboard as AdminDashboard;
use App\Livewire\Admin\EditCandidate as AdminEditCandidate;
use App\Livewire\Admin\EditSchedule as AdminEditSchedule;
use App\Livewire\Admin\EditSerialNumber as AdminEditSerialNumber;
use App\Livewire\Admin\Schedule as AdminSchedule;
use App\Livewire\Admin\SerialNumber as AdminSerialNumber;
use App\Livewire\Candidates;
use App\Livewire\Dashboard;
use App\Livewire\Login;
use App\Livewire\QuickCount;
use App\Livewire\Register;
use App\Livewire\Vote;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

Livewire::setUpdateRoute(function ($handle) {
    $basePath = trim(request()->getBasePath(), '/');
    return Route::post($basePath . '/livewire/update', $handle);
});

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

    Route::group(['prefix' => 'schedules', 'as' => 'schedules'], function () {
        Route::get('/', AdminSchedule::class);
        Route::get('/add', AdminAddSchedule::class)->name('.add');
        Route::get('/{schedule}', AdminEditSchedule::class)->name('.edit');
    });

    Route::group(['prefix' => 'serial-numbers', 'as' => 'serial-numbers'], function () {
        Route::get('/', AdminSerialNumber::class);
        Route::get('/add', AdminAddSerialNumber::class)->name('.add');
        Route::get('/{number}', AdminEditSerialNumber::class)->name('.edit');
    });

    Route::group(['prefix' => 'candidates', 'as' => 'candidates'], function () {
        Route::get('/', AdminCandidates::class);
        Route::get('/add', AdminAddCandidate::class)->name('.add');
        Route::get('/{candidate}', AdminEditCandidate::class)->name('.edit');
    });
});

Route::middleware('auth:web')->group(function () {
    Route::get('/vote', Vote::class)->name('vote');

    Route::get('/logout', function () {
        auth()->guard('web')->logout();

        return redirect()->route('login');
    })->name('logout');
});
