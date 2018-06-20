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
  p(1);
});
Route::get('/lists','TestController@lists')->name('lists');

Route::get('/pass','TestController@pass')->name('pass');
Route::get('/abc','Auth\LoginController@lists');