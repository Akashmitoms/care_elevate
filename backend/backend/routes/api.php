<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/admin/data', [AdminController::class, 'getData']);
Route::post('/admin/update-logo', [AdminController::class, 'updateLogo']);
Route::post('/admin/update-content', [AdminController::class, 'updateContent']);
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


