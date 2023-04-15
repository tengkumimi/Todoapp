<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\TodolistController@index')->name('index');
Route::post('/', 'App\Http\Controllers\TodolistController@store')->name('store');
Route::delete('/{todolist:id}', 'App\Http\Controllers\TodolistController@destroy')->name('destroy');
Route::put('/{todolist:id}', 'App\Http\Controllers\TodolistController@update')->name('update');
