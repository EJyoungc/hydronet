<?php

use App\Livewire\Dashboard\DashboardLivewire;
use App\Livewire\Hydrophonics\GrowthSessionLivewire;
use App\Livewire\Hydrophonics\HydrophonicsLivewire;
use App\Livewire\Hydrophonics\HydrophonicsReadingsLivewire;
use App\Livewire\Hydrophonics\HydrophonicsTypeLivewire;
use App\Livewire\Root\WelcomeLivewire;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', WelcomeLivewire::class)->name('welcome');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', DashboardLivewire::class)->name('home');
    Route::get('/hydrophonics', HydrophonicsLivewire::class)->name('hydrophonics');
    Route::get('/hydrophonics/{hydrophonic}/readings', HydrophonicsReadingsLivewire::class)->name('readings');
    Route::get('/hydrophonics/types', HydrophonicsTypeLivewire::class)->name('types');
    Route::get('/hydrophonics/{hydrophonic}/Session/types', GrowthSessionLivewire::class)->name('session');
    Route::get('/hydrophonics/{hydrophonic}/Session/{session_id}', HydrophonicsReadingsLivewire::class)->name('hydrophonics.session.readings');
});
