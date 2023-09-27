<?php

use App\Http\Controllers\BitlinkController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BitlinkController::class, 'create'])->name('create-bitlink');
Route::get('/list-links', [BitlinkController::class, 'list'])->name('list-bitlink');
Route::get('/{url}', [BitlinkController::class, 'index'])->name('redirect-bitlink');
Route::post('/bitlink', [BitlinkController::class, 'store'])->name('store-bitlink');
