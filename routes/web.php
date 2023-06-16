<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\ContactController;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group([
    'prefix' => 'ad',
    'as' => 'ad.',
    'controller' => AdController::class,
], function () {
   Route::get('/', 'index')->name('index');
   Route::get('/show', 'show')->name('show');
});

Route::group([
    'prefix' => 'dashboard',
    'as' => 'dashboard.'
], function () {
    Route::group([
        'prefix' => 'contact',
        'as' => 'contact.',
        'controller' => ContactController::class
    ], function () {
        Route::get('show', 'show')->name('show');
    });
});

require __DIR__.'/auth.php';
