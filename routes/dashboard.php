<?php

use App\Http\Controllers\Dashboard\AboutController;
use App\Http\Controllers\Dashboard\AdController;
use App\Http\Controllers\Dashboard\ContactController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'dashboard',
    'as' => 'dashboard.'
], function () {

    Route::group([
        'prefix' => 'contact',
        'as' => 'contact.',
        'controller' => ContactController::class
    ], function () {
        Route::get('/', 'index')->name('index');
    });

    Route::group([
        'prefix' => 'ad',
        'as' => 'ad.',
        'controller' => AdController::class,
    ], function () {
        Route::get('/', 'index')->name('index');
        Route::get('/show', 'show')->name('show');
        Route::get('/create', 'create')->name('create');
    });

    Route::group([
        'prefix' => 'about',
        'as' => 'about.',
        'controller' => AboutController::class,
    ], function () {
        Route::get('/', 'index')->name('index');
    });
});
