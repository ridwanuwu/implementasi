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
    return view('beranda');
});
route::view('/home','home');

route::get('/dataCustomer','customerController@indexDataCust');
route::get('/tambahCust1','customerController@tambahCustomer1');
route::get('/tambahCust2','customerController@tambahCustomer2');

Route::get('tambahCustomer/getcities/{id}','customerController@getCities');
Route::get('tambahCustomer/getdistricts/{id}','customerController@getDistricts');
Route::get('tambahCustomer/getsubdistricts/{id}','customerController@getSubdistricts');

Route::post('/tambahCustomer1/store1','customerController@store1');
Route::post('/tambahCustomer2/store2','customerController@store2');
