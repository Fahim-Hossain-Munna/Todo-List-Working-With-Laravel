<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodolistController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('store_todo', [App\Http\Controllers\TodolistController::class, 'store_todo']);

Route::get('delete/data/{id} ', [App\Http\Controllers\TodolistController::class, 'destroy']);

Route::get('done/data/{id} ', [App\Http\Controllers\TodolistController::class, 'done_actived_data']);

