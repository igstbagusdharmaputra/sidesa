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

Route::group(['middleware' => ['auth']], function(){
	Route::group(['middleware' => ['checkroleuserlogin:1']], function(){
		Route::get('/control-panel', 'AdminDashboardController@index')->name('admin.dashboard');
		Route::get('/control-panel/user/', 'AdminDashboardController@profile')->name('admin.dashboard.profile');
		Route::put('/control-panel/user/update', 'AdminDashboardController@profileUpdate')->name('admin.dashboard.profile_update');

		//route untuk pengguna
		Route::get('/control-panel/pengguna','PenggunaController@index')->name('pengguna.index');
		Route::get('/control-panel/pengguna/data','PenggunaController@showdata')->name('pengguna.showdata');
		Route::get('/control-panel/pengguna/create','PenggunaController@create')->name('pengguna.create');		
		Route::post('/control-panel/pengguna/store','PenggunaController@store')->name('pengguna.store');
		Route::get('/control-panel/pengguna/{id}/edit','PenggunaController@edit')->name('pengguna.edit');
		Route::put('/control-panel/pengguna/{id}','PenggunaController@update')->name('pengguna.update');
		Route::delete('/control-panel/pengguna/{id}', 'PenggunaController@destroy')->name('pengguna.destroy');

		//route untuk bidang
		Route::get('/control-panel/bidang','BidangController@index')->name('bidang.index');
		Route::get('/control-panel/bidang/data','BidangController@showdata')->name('bidang.showdata');
		Route::get('/control-panel/bidang/create','BidangController@create')->name('bidang.create');		
		Route::post('/control-panel/bidang/store','BidangController@store')->name('bidang.store');
		Route::get('/control-panel/bidang/{id}/edit','BidangController@edit')->name('bidang.edit');
		Route::put('/control-panel/bidang/{id}','BidangController@update')->name('bidang.update');
		Route::delete('/control-panel/bidang/{id}', 'BidangController@destroy')->name('bidang.destroy');

		//route untuk sumber dana
		Route::get('/control-panel/dana','SumberDanaController@index')->name('dana.index');
		Route::get('/control-panel/dana/data','SumberDanaController@showdata')->name('dana.showdata');
		Route::get('/control-panel/dana/create','SumberDanaController@create')->name('dana.create');		
		Route::post('/control-panel/dana/store','SumberDanaController@store')->name('dana.store');
		Route::get('/control-panel/dana/{id}/edit','SumberDanaController@edit')->name('dana.edit');
		Route::put('/control-panel/dana/{id}','SumberDanaController@update')->name('dana.update');
		Route::delete('/control-panel/dana/{id}', 'SumberDanaController@destroy')->name('dana.destroy');

		//route untuk pelaporan
		Route::get('/control-panel/laporan/keuangan', 'LaporanController@keuangan')->name('laporan.keuangan');
		// Route::get('/control-panel/laporan/keuangan/export', 'LaporanController@keuanganexport')->name('laporan.keuangan.export');
		Route::get('/control-panel/laporan/keuangan/data', 'LaporanController@keuanganshowdata')->name('laporan.keuangan.showdata');
	});
	Route::group(['middleware' => ['checkroleuserlogin:2']], function(){
		Route::get('/my-panel', 'PenggunaDashboardController@index')->name('pengguna.dashboard');
        Route::get('/my-panel/profile', 'PenggunaDashboardController@profile')->name('pengguna.dashboard.profile');
		Route::put('/my-panel/profile', 'PenggunaDashboardController@profileupdate')->name('pengguna.dashboard.profile_update');
		Route::get('/my-panel/laporan/keuangan', 'PenggunaDashboardController@laporan')->name('pengguna.dashboard.laporan');
		Route::post('/my-panel/laporan/keuangan/store','PenggunaDashboardController@store')->name('laporan.store');
	});
});


Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
