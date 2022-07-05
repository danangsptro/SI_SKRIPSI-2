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
        Route::delete('/delete-status/{id}', 'statusController@delete')->name('delete-status');
        // Rak
        Route::get('/rak', 'rakController@index')->name('rak');
        Route::get('/create-rak', 'rakController@create')->name('create-rak');
        Route::post('/store-rak', 'rakController@store')->name('store-rak');
        Route::delete('/delete-rak/{id}', 'rakController@delete')->name('delete-rak');
        // Maplop
        Route::get('/maplop', 'maplopController@index')->name('maplop');
        // Jenis Data
        Route::get('/jenis-data', 'jenisDataController@index')->name('jenisData');
        Route::get('/create-jenis-data', 'jenisDataController@create')->name('jenisDataCreate');
        Route::post('/store-jenis-data', 'jenisDataController@store')->name('jenisDataStore');
        Route::delete('/delete-jenis-data/{id}', 'jenisDataController@delete')->name('jenisDataDelete');
    });
});
