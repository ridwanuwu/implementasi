<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\BarangController;
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
    return view('beranda');
});
// Route::get('/barang', function () {
//     return view('barang');
// });
Route::get('/barcode', function () {
    return view('scanbarcode');
});

route::view('/home','home');

route::get('/barang','BarangController@index');
Route::get('/pdf',[BarangController::class,'cetak_pdf']);
Route::get('cetak_barcode', 'BarangController@cetak_pdf')->name('print');

route::get('/dataCustomer','customerController@indexDataCust');
route::get('/tambahCust1','customerController@tambahCustomer1');
route::get('/tambahCust2','customerController@tambahCustomer2');

Route::get('tambahCustomer/getcities/{id}','customerController@getCities');
Route::get('tambahCustomer/getdistricts/{id}','customerController@getDistricts');
Route::get('tambahCustomer/getsubdistricts/{id}','customerController@getSubdistricts');

Route::post('/tambahCustomer1/store1','customerController@store1');
Route::post('/tambahCustomer2/store2','customerController@store2');

Route::resource('barang2', 'Barang2Controller');