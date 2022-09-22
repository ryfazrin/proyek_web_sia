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
