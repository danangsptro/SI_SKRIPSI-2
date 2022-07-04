<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    if (!Auth::check()) {
        return view('auth.login');
    }
    return redirect(url('/dashboard'));
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', 'dashboardController@index')->name('dashboard');
        // Status
        Route::get('/status', 'statusController@index')->name('status');
        Route::get('/create-status',  'statusController@create')->name('create-status');
        Route::post('/store-status', 'statusController@store')->name('store-status');
    });
});
