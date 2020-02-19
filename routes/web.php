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

Route::get('/','AppController@index');

Route::get('/authentication', function () {
    if (Auth::user()) {
        if (Auth::user()->admin) {
            return redirect('/dashboard');
        } else {
            return redirect('/products');
        }
    }
    return view('authentication');
})->name('login');

Route::post('/register', 'UserController@store');
Route::post('/login', 'UserController@index');

//authentication
Route::group(['middleware' => ['auth']], function () {
    Route::get('/logout', 'UserController@logout');

    //admin
    Route::group(['middleware' => ['admin']], function () {
      Route::get('/dashboard', 'ProductController@index');
      Route::post('/product/create', 'ProductController@create');
      Route::get('/product/delete/{id}', 'ProductController@destroy');
      Route::get('/product/update/{id}', 'ProductController@update');
      Route::post('/product/edit/', 'ProductController@edit');
      Route::get('/orders', 'OrderController@index');
      Route::get('/order/delete/{id}', 'OrderController@destroy');
      Route::get('/order/update/{id}', 'OrderController@edit');
      Route::get('/users', 'UserController@show');
      Route::get('user/delete/{id}','UserController@destroy');
    });
    //user
    Route::group(['middleware' => ['user']], function () {
      Route::get('/home', 'AppController@show');
      Route::get('/item/{id}', 'AppController@buy');
      Route::get('/item/delete/{id}', 'OrderController@delete');
      Route::post('/item/buy', 'OrderController@create');
    });
});
