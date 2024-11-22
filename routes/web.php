<?php

use App\Http\Controllers\{ProfileController, PanelController, ProjectController,
    InviteController, TaskController, AdminController};
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\{isProjectMember, isAdmin, isBan};

Route::get('/', function () {
    return view('index');
})->name('index');

Route::middleware('auth', isBan::class)->group(function () {
Route::controller(App\Http\Controllers\ProfileController::class)->group(function () {
        Route::get('/profile/edit', 'edit')->name('profile.edit');
        Route::post('/profile/search', 'search')->name('profile.search');
        Route::patch('/profile/edit', 'update')->name('profile.update');
        Route::get('/profile/{user?}', 'index')->name('profile.index');
    });

    Route::controller(PanelController::class)->group(function () {
        Route::get('/panel', 'index')->name('panel.index');
        Route::post('/panel/search', 'search')->name('panel.search');
    });

    Route::controller(ProjectController::class)->group(function () {
        Route::get('/project/new', 'index')->name('project.index');
        Route::get('/project/{id}', 'show')->name('project.show')->middleware(isProjectMember::class);
        Route::get('/project/exel/{id}', 'exel')->name('project.exel')->middleware(isProjectMember::class);
        Route::post('/project', 'upload')->name('project.upload');
        Route::delete('/project/delete/{id}', 'delete')->name('project.delete');
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

});

Route::middleware(isAdmin::class)->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin', 'index')->name('admin.index');
        Route::post('/admin/search', 'search')->name('admin.search');
        Route::get('/user/{id}/ban', 'banUser')->name('user.ban');
    });
});

require __DIR__.'/auth.php';
