<?php

use App\Http\Controllers\{ProfileController, PanelController, ProjectController,
    InviteController, TaskController};
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\{isProjectMember, isAdmin};

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
        Route::post('/panel/sort', 'sort')->name('panel.sort');
        Route::post('/panel/search', 'search')->name('panel.search');
    });

    Route::controller(ProjectController::class)->group(function () {
        Route::get('/project/new', 'index')->name('project.index');
        Route::get('/project/{id}', 'show')->name('project.show')->middleware(isProjectMember::class);
        Route::post('/project', 'upload')->name('project.upload');
    });

    Route::controller(InviteController::class)->group(function () {
        Route::post('/invite/upload', 'upload')->name('invite.upload');
        Route::patch('/invite/update/{id}', 'update')->name('invite.update');
    });

    Route::controller(TaskController::class)->group(function () {
        Route::get('/task/status/{id}', 'status')->name('task.status');
        Route::post('/task/upload', 'upload')->name('task.upload');
        Route::patch('/task/update/{id}', 'update')->name('task.update');
        Route::delete('/task/delete/{id}', 'delete')->name('task.delete');
    });

    Route::middleware(isAdmin::class)->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('/admin', 'index')->name('admin.index');
        });
    });
});

require __DIR__.'/auth.php';
