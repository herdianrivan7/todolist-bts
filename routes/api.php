<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 * route "/register"
 * @method "POST"
 */

Route::post('/register', App\Http\Controllers\Api\RegisterController::class)->name('register');


/**
 * route "/login"
 * @method "POST"
 */
Route::post('/login', App\Http\Controllers\Api\LoginController::class)->name('login');

/**
 * route "/user"
 * @method "GET"
 */
/**
 * route "/logout"
 * @method "POST"
 */
Route::post('/logout', App\Http\Controllers\Api\LogoutController::class)->name('logout');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('/tasks', 'App\Http\Controllers\Api\TaskController@store')->name('store');
    Route::get('/tasks', 'App\Http\Controllers\Api\TaskController@index')->name('index');
    Route::put('/tasks/complete', 'App\Http\Controllers\Api\TaskController@complete')->name('complete');
    Route::delete('/tasks/{task}', 'App\Http\Controllers\Api\TaskController@delete')->name('delete');
    });


