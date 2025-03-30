<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use App\Livewire\Images\Image;
use App\Livewire\Images\ImageIndex;
use App\Livewire\Tasks\TaskIndex;
use App\Livewire\Tasks\TaskShow;
use Illuminate\Routing\RouteAction;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::middleware('guest')->group(function () {
    Volt::route('register', 'pages.auth.register')
        ->name('register');

    Volt::route('login', 'pages.auth.login')
        ->name('login');

    Volt::route('forgot-password', 'pages.auth.forgot-password')
        ->name('password.request');

    Volt::route('reset-password/{token}', 'pages.auth.reset-password')
        ->name('password.reset');
});

Route::middleware('auth')->group(function () {
    Volt::route('verify-email', 'pages.auth.verify-email')
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Volt::route('confirm-password', 'pages.auth.confirm-password')
        ->name('password.confirm');

    Route::get('tasks', TaskIndex::class)->name('tasks.index');
    Route::get('task/{task}' ,TaskShow::class)->name('tasks.show');

    Route::get('image',ImageIndex::class)->name('images.index');
});
