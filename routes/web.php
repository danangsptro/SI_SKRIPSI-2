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
        Route::get('/edit=status/{id}', 'statusController@edit')->name('edit-status');
        Route::post('/update-status/{id}', 'statusController@update')->name('update-status');
        Route::delete('/delete-status/{id}', 'statusController@delete')->name('delete-status');
        // Rak
        Route::get('/rak', 'rakController@index')->name('rak');
        Route::get('/create-rak', 'rakController@create')->name('create-rak');
        Route::post('/store-rak', 'rakController@store')->name('store-rak');
        Route::get('/edit-rak/{id}', 'rakController@edit')->name('edit-rak');
        Route::post('/update-rak/{id}', 'rakController@update')->name('update-rak');
        Route::delete('/delete-rak/{id}', 'rakController@delete')->name('delete-rak');
        // Maplop
        Route::get('/maplop', 'maplopController@index')->name('maplop');
        Route::delete('/maplop/{id}', 'maplopController@delete')->name('maplop-delete');
        Route::get('/maplop-create', 'maplopController@create')->name('maplop-create');
        Route::post('/maplop-store', 'maplopController@store')->name('maplop-store');
        Route::get('/maplop-edit/{id}', 'maplopController@edit')->name('maplop-edit');
        Route::post('/maplop-update/{id}', 'maplopController@update')->name('maplop-update');
        // Jenis Data
        Route::get('/jenis-data', 'jenisDataController@index')->name('jenisData');
        Route::get('/create-jenis-data', 'jenisDataController@create')->name('jenisDataCreate');
        Route::post('/store-jenis-data', 'jenisDataController@store')->name('jenisDataStore');
        Route::get('/edit-jenis-data/{id}', 'jenisDataController@edit')->name('jenisDataEdit');
        Route::post('/update-jenis-data/{id}', 'jenisDataController@update')->name('jenisDataUpdate');
        Route::delete('/delete-jenis-data/{id}', 'jenisDataController@delete')->name('jenisDataDelete');
        // Laporan
        Route::get('/laporan', 'laporanController@index')->name('laporan');
        Route::get('/laporan-ada', 'LaporanController@laporanAda')->name('laporan-ada');
        Route::get('/laporan-sudah-dipusat', 'LaporanController@laporanSudahdipusat')->name('laporan-sudah-dipusat');
        Route::get('/laporan-sudah-dimusnahkan', 'LaporanController@laporanSudahdimusnahkan')->name('laporan-sudah-dimusnahkan');
        Route::get('/laporan-semua-data', 'LaporanController@laporanSeluruhData')->name('laporan-semua-data');
        Route::get('/laporan-print-pdf', 'LaporanController@printPdfAda')->name('laporan-print-pdf');
        Route::get('/laporan-print-pdf-dipusat', 'LaporanController@printPdfdipusat')->name('laporan-print-pdf-pusat');
        Route::get('/laporan-print-pdf-dimusnahkan', 'LaporanController@printPdfdimusnahkan')->name('laporan-print-pdf-musnahkan');
        Route::get('/laporan-print-pdf-keseluruhan', 'LaporanController@printPdfSeluruh')->name('laporan-print-pd-seluruh');
        // Register User
        Route::get('/register-user', 'userRegisterController@index')->name('register-user');
        Route::post('/register-store', 'userRegisterController@store')->name('register-store');
        Route::get('/register-edit/{id}', 'userRegisterController@edit')->name('register-edit');
        Route::delete('/register-delete/{id}', 'userRegisterController@delete')->name('register-delete');
    });
});
