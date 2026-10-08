<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\Admin\SubmissionAdminController;

Route::get('/', fn () => view('landing'))->name('home');
Route::post('/register', [SubmissionController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('submit');
Route::get('/thanks', fn () => view('thanks'))->name('thanks');

Route::prefix('admin')->group(function () {
    Route::get('login', [SubmissionAdminController::class, 'loginForm'])->name('admin.login');
    Route::post('login', [SubmissionAdminController::class, 'login'])
        ->middleware('throttle:5,1');

    Route::middleware('admin')->group(function () {
        Route::get('/', [SubmissionAdminController::class, 'index'])->name('admin.index');
        Route::post('{submission}/status', [SubmissionAdminController::class, 'updateStatus'])->name('admin.status');
        Route::post('logout', [SubmissionAdminController::class, 'logout'])->name('admin.logout');
    });
});