<?php

use Illuminate\Support\Facades\Route;
use GuzzleHttp\Client;

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

Route::view('/','login')->name('home');

Route::view('/login','login')->name('login');

Route::post('/','LoginController');

Route::post('login','LoginController');
Route::get('/form', 'FormController')->name('form');

Route::get('/pdf','PdfController')->name('pdf');
Route::post('pdf','PdfController');

