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
    return view('welcome');
});

Auth::routes();

    Route::get('/home', 'HomeController@index')->name('Home');

    Route::group(['middleware' => ['isAdmin', 'auth']], function() {
        Route::resource('users', 'UserController');
        Route::resource('roles', 'RoleController');
        Route::resource('permissions', 'PermissionController');
        Route::resource('keywords', 'KeywordController');
        Route::resource('industry', 'IndustryController');
      });

      Route::resource('blogs', 'BlogController')->middleware('auth');
      Route::get('/blogs/list', 'BlogController@show')->name('blogs.bloglist')->middleware('auth');
      Route::post('/blogs/searchresult','BlogController@blog_search')->name('blogs.searchresult');
      Route::post('/blogs/add_to_cart','BlogController@add_to_cart')->name('blogs.add_to_cart');
      Route::post('/blogs/add_to_cart_update','BlogController@add_to_cart_update')->name('blogs.add_to_cart_update');
      Route::get('/cart','BlogController@cart')->name('blog.cart')->middleware('auth');
      Route::post('/cart_update','BlogController@cart_update')->name('blog.cart_update');
      Route::post('/cart_delete','BlogController@cart_delete')->name('blog.cart_delete');
      Route::get('/checkout','BlogController@checkout')->name('blog.checkout')->middleware('auth');
      
      Route::resource('orders', 'OrderController')->middleware('auth');
    //   Route::post('/orders/update/{id}', 'OrderController@update')->name('orders.update');



