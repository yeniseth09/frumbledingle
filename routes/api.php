<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('locations', App\Http\Controllers\Api\LocationController::class)->only(['index', 'store', 'destroy']);
Route::resource('items', App\Http\Controllers\Api\ItemController::class)->only(['index', 'store', 'destroy']);
Route::resource('categories', App\Http\Controllers\Api\CategoryController::class)->only(['index', 'store', 'destroy']);
Route::resource('report', App\Http\Controllers\Api\ReportController::class)->only(['index', 'store', 'destroy']);



