<?php

//use Product;
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

// Route for Homepage - displays all products from the shop
Route::view('/', 'welcome');

Route::get('mens', 'productcontroller@mensproduct');
Route::get('product/{pid}', 'productcontroller@menpage');
Route::view('old', 'old');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
