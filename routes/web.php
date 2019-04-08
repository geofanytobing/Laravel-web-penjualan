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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/barang_masuk', function () {
    return view('barang-masuk');
});

Route::get('/detail-barang','DetailBarangController@index');



Route::get('/petugas/delete/{id}','PetugasController@delete');
Route::post('/petugas/save','PetugasController@save');
Route::post('/petugas/update/{id}','PetugasController@update');
Route::get('/petugas','PetugasController@index');




Route::get('/distributor','DistributorController@index');
Route::post('/distributor/save','DistributorController@save');
Route::post('/distributor/update/{id}','DistributorController@update');
Route::get('/distributor/delete/{id}','DistributorController@delete');




Route::get('barang-masuk','BarangMasukController@index');
Route::post('barang-masuk/save','BarangMasukController@save');



Route::get('/penjualan','PenjualanController@index');






Route::get('/barang','BarangController@index');
Route::post('/barang/save','BarangController@save');
Route::Get('/barang/delete/{id}','BarangController@delete');
Route::post('/barang/update/{id}','BarangController@update');