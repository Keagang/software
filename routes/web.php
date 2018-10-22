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
Route::get('product/{pid}', 'productcontroller@menpage')->name('page.men');
Route::view('old', 'old');

Route::post('/order','productcontroller@makeorder')->name('order');

Route::post('/review','productcontroller@makereview')->name('review');

Route::view('review','review');




// 'middleware' => 'auth'
Route::group(['prefix' => 'admin', 'middleware' => 'App\Http\Middleware\AdminMiddleware'], function () {           
           Route::get('/',function(){
        Return view('dashboard.admin');
    });
           Route::view('/add','dashboard.add');

           Route::delete('test/delete','AdminController@delete')->name('delete.row');

           // Route::view('/test/home',"dashboard.leave");
           Route::get('/test', 'AdminController@leave')->name('show');
           Route::post('/test/edit', 'AdminController@edit')->name('edit');
           Route::post('/test/edit/Success', 'AdminController@update')->name('update');

           Route::get('test/create/{category}', ['uses' => 'AdminController@create']);
           Route::post('/test/store/{category}', 'AdminController@store')->name('store');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


