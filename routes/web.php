<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('home', [\App\Http\Controllers\HomeController::class, 'dashboard'])->name('home');
    Route::resource('user', \App\Http\Controllers\UserController::class);
    Route::resource('samsat', \App\Http\Controllers\SamsatController::class);
    Route::resource('stnk', \App\Http\Controllers\StnkController::class);
    Route::resource('lokasi', \App\Http\Controllers\LokasiController::class);
    Route::resource('rak', \App\Http\Controllers\RakController::class);
    Route::get('rc/download/template-excel', [\App\Http\Controllers\RcController::class, 'downloadTemplateExcel'])->name('rc.download.template-excel');
    Route::post('rc/import/excel', [\App\Http\Controllers\RcController::class, 'importExcel'])->name('rc.import.excel');
    Route::resource('rc', \App\Http\Controllers\RcController::class);
    Route::resource('dpa', \App\Http\Controllers\DpaController::class);

    Route::get('laporan', [\App\Http\Controllers\LaporanController::class, 'index'])->name('laporan.index');
    Route::get('laporan/cetak', [\App\Http\Controllers\LaporanController::class, 'cetak'])->name('laporan.cetak');

    // Account
    Route::get('/account/profile', [\App\Http\Controllers\AccountController::class, 'profile'])->name('account.profile');
    Route::get('/account/setting', [\App\Http\Controllers\AccountController::class, 'setting'])->name('account.setting');
});
