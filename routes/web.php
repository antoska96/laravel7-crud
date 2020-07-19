<?php

use Illuminate\Support\Facades\Auth;
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
Route::get('/', 'PostController@index')->middleware('auth');

Route::get('posts/first', 'PostController@first')->name('posts.first')->middleware('auth');

Route::get('posts/second', 'PostController@second')->name('posts.second')->middleware('auth');

Route::get('posts/third', 'PostController@third')->name('posts.third')->middleware('auth');

Route::resource('posts', 'PostController')->middleware('auth');

Auth::routes();

Route::get('help', function () {
    return view('posts.help');
});
Route::get('send', 'PostController@send')->middleware('auth')->name('send');
