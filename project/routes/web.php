<?php

use App\Http\Controllers\{ProfileController, PanelController, ProjectController};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/profile', function () {
    return view('profile');
})->middleware(['auth'])->name('profile.index');

Route::middleware('auth')->group(function () {
    Route::controller(App\Http\Controllers\ProfileController::class)->group(function () {
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
});

require __DIR__.'/auth.php';
