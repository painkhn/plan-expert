<?php

use App\Http\Controllers\{ProfileController, PanelController, ProjectController,
    InviteController};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::middleware('auth')->group(function () {
    Route::controller(App\Http\Controllers\ProfileController::class)->group(function () {
        Route::get('/profile/{user?}', 'index')->name('profile.index');
        Route::post('/profile/search', 'search')->name('profile.search');
        Route::get('/profile/edit', 'edit')->name('profile.edit');
        Route::patch('/profile/edit', 'update')->name('profile.update');
        Route::delete('/profile/edit', 'destroy')->name('profile.destroy');
    });

    Route::controller(PanelController::class)->group(function () {
        Route::get('/panel', 'index')->name('panel.index');
    });

    Route::controller(ProjectController::class)->group(function () {
        Route::get('/project/new', 'index')->name('project.index');
        Route::get('/project/{id}', 'show')->name('project.show');
        Route::post('/project', 'upload')->name('project.upload');
    });

    Route::controller(InviteController::class)->group(function () {
        Route::post('/invite/upload', 'upload')->name('invite.upload');
        Route::patch('/invite/update/{id}', 'update')->name('invite.update');
    });
});

require __DIR__.'/auth.php';
