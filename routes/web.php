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

Route::get('/detail-barang','DetailBarangMasukController@index');
Route::post('/detail-barang/save','DetailBarangMasukController@save');
Route::post('/detail-barang/update/{id}','DetailBarangMasukController@update');
Route::get('/detail-barang/delete/{id}','DetailBarangMasukController@delete');



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
Route::post('barang-masuk/update/{id}','BarangMasukController@update');
Route::get('barang-masuk/delete/{id}','BarangMasukController@delete');



Route::get('/penjualan','PenjualanController@index');
Route::post('/penjualan/save','PenjualanController@save');
Route::post('/penjualan/update/{id}','PenjualanController@update');
Route::get('/penjualan/delete/{id}','PenjualanController@delete');


Route::get('/detail-penjualan','DetailPenjualanController@index');
Route::post('/detail-penjualan/save','DetailPenjualanController@save');
Route::post('/detail-penjualan/update/{id}','DetailPenjualanController@update');
Route::get('/detail-penjualan/delete/{id}','DetailPenjualanController@delete');



Route::get('/jenis','JenisController@index');
Route::post('/jenis/save','JenisController@save');
Route::post('jenis/update/{id}','JenisController@update');
Route::get('jenis/delete/{id}','JenisController@delete');


Route::get('/barang','BarangController@index');
Route::post('/barang/save','BarangController@save');
Route::Get('/barang/delete/{id}','BarangController@delete');
Route::post('/barang/update/{id}','BarangController@update');