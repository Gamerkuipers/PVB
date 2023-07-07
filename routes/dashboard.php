<?php

use App\Http\Controllers\Dashboard\AboutController;
use App\Http\Controllers\Dashboard\AdvertisementController;
use App\Http\Controllers\Dashboard\ContactController;
use App\Models\Advertisement;
use App\Models\Contact;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', fn() => to_route('dashboard.advertisement.index'))
        ->name('dashboard');

    Route::group([
        'prefix' => 'dashboard',
        'as' => 'dashboard.'
    ], function () {

        Route::group([
            'prefix' => 'ad',
            'as' => 'advertisement.',
            'controller' => AdvertisementController::class,
        ], function () {
            Route::get('/', 'index')
                ->name('index')
                ->can('viewAny', Advertisement::class);

            Route::get('/create', 'create')
                ->name('create')
                ->can('create', Advertisement::class);

            Route::prefix('/{advertisement}')->group(function () {
                Route::get('/', 'show')
                    ->name('show')
                    ->can('view', 'advertisement');

                Route::get('/edit', 'edit')
                    ->name('edit');
            });
        });

        Route::group([
            'prefix' => 'about',
            'as' => 'about.',
            'controller' => AboutController::class,
        ], function () {
            Route::get('/', 'index')
                ->name('index');

            Route::get('/edit', 'edit')
                ->name('edit');
        });


        Route::group([
            'prefix' => 'contact',
            'as' => 'contact.',
            'controller' => ContactController::class
        ], function () {
            Route::get('/', 'index')
                ->name('index')
                ->can('viewAny', Contact::class);

            Route::get('/edit', 'edit')
                ->name('edit')
                ->can('update', Contact::class);
        });
    });
});
