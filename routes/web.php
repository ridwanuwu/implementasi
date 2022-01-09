<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\API\MoviesController;
// use App\Http\Controllers\movieController;
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
// Route::get('/excel', 'ExcelController@show');
// Route::post('/excel', 'ExcelController@store');
Route::get('/beranda', function () {
    return view('beranda');
})->name('beranda');
// Route::get('/barang', function () {
//     return view('barang');
// });
Route::get('/barcode', function () {
    return view('scanbarcode');
})->name('scanbarcode');

route::view('/home','home');

route::get('/dataCustomer','customerController@indexDataCust')->name('dataCustomer');
route::get('/tambahCust1','customerController@tambahCustomer1')->name('tambahCust1');
route::get('/tambahCust2','customerController@tambahCustomer2')->name('tambahCust2');

Route::get('tambahCustomer/getcities/{id}','customerController@getCities');
Route::get('tambahCustomer/getdistricts/{id}','customerController@getDistricts');
Route::get('tambahCustomer/getsubdistricts/{id}','customerController@getSubdistricts');

Route::post('/tambahCustomer1/store1','customerController@store1');
Route::post('/tambahCustomer2/store2','customerController@store2');

//scan barcode
Route::get('/barcode-scanner', 'scanBarcodeController@index');
Route::get('/scan-kunjungan-toko','scanBarcodeController@scanKunjungan')->name('scan-kunjungan-toko');
Route::post('/scan-kunjungan-toko/getLocationToko','scanBarcodeController@getLocationToko');
Route::post('/scan-kunjungan-toko/hasil','scanBarcodeController@getDistanceFromLatLonInKm');

//kujungan toko
Route::get('/kunjungan-toko','tokoController@index')->name('kunjungan-toko');
Route::post('/kunjungan-toko/create', 'tokoController@store');
Route::get('/kunjungan-toko/export/{id}', 'tokoController@export');

Route::get('/toko/tokoform', 'tokController@formToko')->name('formToko');
Route::post('/toko/tambahToko', 'tokController@tambahToko')->name('tambahToko');
Route::get('/scannertoko', 'tokController@scanner')->name('scannertoko');
Route::get('/getAllFields', 'tokController@getAllFields')->name('getAllFields');

//barang
Route::get('/barang', 'BarangController@index')->name('barang');
Route::get('/barang/formBarang', 'BarangController@formBarang')->name('formBarang');
Route::post('/barang/tambahBarang', 'BarangController@tambahBarang')->name('tambahBarang');

Route::get('generate-pdf', 'PDFController@generatePDF');
Route::get('cetakpdf/{id_barang}/{col}/{row}', 'PDFController@generatePDF');

Route::get('/excel', 'cobaController@create')->name('import-excel');
Route::post('/excel', 'cobaController@store');
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/auth/redirect', 'Auth\LoginController@redirectToProvider');
Route::get('/auth/callback', 'Auth\LoginController@handleProviderCallback');

//scoreboard
Route::get('/scoreboard-view','ScoreboardController@index')->name('viewsc');
Route::get('/scoreboard-sse','ScoreboardController@sse');
Route::get('/scoreboard-console','ScoreboardController@console')->name('consolesc');
Route::post('/scoreboard-console/update-home-name','ScoreboardController@updateHomeName');
Route::post('/scoreboard-console/update-home-score','ScoreboardController@updateHomeScore');
Route::post('/scoreboard-console/reset-home-score','ScoreboardController@resetHomeScore');
Route::post('/scoreboard-console/update-home-foul','ScoreboardController@updateHomeFoul');
Route::post('/scoreboard-console/reset-home-foul','ScoreboardController@resetHomeFoul');
Route::post('/scoreboard-console/update-away-name','ScoreboardController@updateAwayName');
Route::post('/scoreboard-console/update-away-score','ScoreboardController@updateAwayScore');
Route::post('/scoreboard-console/reset-away-score','ScoreboardController@resetAwayScore');
Route::post('/scoreboard-console/update-away-foul','ScoreboardController@updateAwayFoul');
Route::post('/scoreboard-console/reset-away-foul','ScoreboardController@resetAwayFoul');
Route::post('/scoreboard-console/update-home-status','ScoreboardController@updateHomeStatus');
Route::post('/scoreboard-console/update-timer','ScoreboardController@updateTimer');
Route::post('/update-menit-detik','ScoreboardController@update_menit_detik');


Route::resource('/api/mobiles','API\MobileController');
//movie
Route::resource('/uploud-movie','movieController');
Route::get('/api/moviesnowplaying', 'API\MoviesController@getMoviesNP'); 
Route::get('/api/moviesbrowse', 'API\MoviesController@getMoviesBrowse'); 
Route::get('/api/moviescomingsoon', 'API\MoviesController@getMoviesCS');
Route::get('/api/moviestiket', 'API\MoviesController@getTiket');