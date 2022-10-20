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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/webKu', function () {
    return "Apa kabar....";
});

$logic = function () {
    return "Apa kabar Pazrin....";
};

Route::get('/webKu1', $logic);

Route::get('/satu/page', function () {
    return "yang ke satu!";
});

Route::get('/buku/{judul}', function ($judul) {
    return "Buku <b>{$judul}</b> adalah termasuk buku komputer.";
});

Route::get('/coba', function () {
    return '<!doctype html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <title>Coba laravel!</title>
    </head>
    <body>
    <p>SELAMAT ANDA BELAJAR LARAVEL</p>
    </body>
    </html>';
});

Route::get('segi-empat/inputSegiEmpat', 'SegiEmpatController@inputSegiEmpat')
    ->name('segi-empat.inputSegiEmpat');

Route::post('segi-empat/hasil', 'SegiEmpatController@hasil')
    ->name('segi-empat.hasil');

Route::get(
    'segi-empat/inputBalok',
    'SegiEmpatController@inputBalok'
)
    ->name('segi-empat.inputBalok');

Route::post(
    'segi-empat/hasilBalok',
    'SegiEmpatController@hasilBalok'
)
    ->name('segi-empat.hasilBalok');

Route::resource('/mst-pangkat', 'MstPangkatController');

Route::resource('/mst-jabatan', 'MstJabatanController');

Route::resource('/pegawai', 'PegawaiController');

Route::get('/riwayat-pangkat', 'RiwayatPangkatController@index');
Route::get('/riwayat-pangkat/proses/{id}', 'RiwayatPangkatController@proses')
    ->name('riwayat-pangkat.index1');
Route::get('/riwayat-pangkat/cetak/{id}', 'RiwayatPangkatController@cetak')
    ->name('riwayat-pangkat.cetak');
Route::get('/riwayat-pangkat/create/{id}', 'RiwayatPangkatController@create');
Route::post('/riwayat-pangkat/store', 'RiwayatPangkatController@store')
    ->name('riwayat-pangkat.store');
Route::get('/riwayat-pangkat/{id}/edit', 'RiwayatPangkatController@edit')
    ->name('riwayat-pangkat.edit');
Route::patch('/riwayat-pangkat/update/{id}', 'RiwayatPangkatController@update')
    ->name('riwayat-pangkat.update');
Route::get('/riwayat-pangkat/show/{id}', 'RiwayatPangkatController@show')
    ->name('riwayat-pangkat.show');
Route::delete('/riwayat-pangkat/destroy/{id}', 'RiwayatPangkatController@destroy')
    ->name('riwayat-pangkat.destroy');
