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

Route::get('/', function () {
	return view('welcome');
});


// Auth::routes();
Auth::routes(['register' => false]);

Route::middleware(['auth'])->group(function () {
	Route::resource('dhkp','DHKPController');
	Route::get('/test', 'TestController@index');
	Route::get('/home', 'HomeController@index')->name('home');
	Route::post('/data-dhkp/import-excel', 'DhkpImportController@importExcel')->name('excel.dhkp-import');
	Route::get('/data-dhkp/export-excel', 'DhkpExportController@exportExcel')->name('excel.dhkp-export');
	Route::get('/data-dhkp/hapus-semua-data', 'HapusDataController@dhkp')->name('hapus.dhkp-data');
});

