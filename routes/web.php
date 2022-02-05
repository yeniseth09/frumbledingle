<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('locations', [App\Http\Controllers\LocationController::class,'index']);
Route::get('items', [App\Http\Controllers\ItemController::class,'index']);
Route::get('categories', [App\Http\Controllers\CategoryController::class,'index']);
Route::get('report', [App\Http\Controllers\ReportController::class,'index']);
