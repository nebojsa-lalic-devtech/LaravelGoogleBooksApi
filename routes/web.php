<?php

use Illuminate\Support\Facades\Input;

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
    return view('book.index');
});

Route::get('/search', function () {
    return view('book.search');
})->name('book.search');

Route::get('status', function () {
    return view('book.status');
});

Route::get('/database', 'BooksController@getBook');
Route::get('/google', 'BooksController@getGoogleBookApiInfo');
