<?php

use App\Http\Controllers\VaultController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Foundation\Http\Middleware\HandlePrecognitiveRequests;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register')
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/cofrinho', [VaultController::class, 'index'])->name('cofrinho');
    Route::post('/cofrinho', [VaultController::class, 'store'])->name('store.vault')->middleware([HandlePrecognitiveRequests::class]);
});
