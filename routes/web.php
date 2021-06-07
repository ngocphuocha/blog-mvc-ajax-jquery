<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('home-page');
});

Route::resource('categories', 'CategoryController');
Route::get('posts', 'PostController@index')->name('posts.index');
Route::get('posts/{post}', 'PostController@show')->name('posts.show');

// User forgot password view
Route::get('users/forgot-pass', 'UserController@forgotPass')->name('users.forgot-pass');
// User send mail reset password
Route::post('users/forgot-pass', 'UserController@sendEmailResetPass')->name('users.send-mail');

// User reset password
Route::get('users/{id}/password-reset', 'UserController@resetPass')->name('users.reset-pass')->middleware('signed');
// User change password reset
Route::put('users/{id}/password-reset', 'UserController@changePass')->name('users.change-pass');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Products
Route::get('products', 'ProductController@index')->name('products.index');

// Detail product
Route::get('products/{product}', 'ProductController@show')->name('products.show');
// Get carts
Route::get('carts', 'CartController@index')->name('carts.index');

// Add product to cart using session
// TODO: continue change to check in when click 'buy now'
Route::get('carts/product/add', 'CartController@create')->name('carts.create');

// Store cart
Route::post('carts/product', 'CartController@store')->name('carts.store');

// Check out
Route::get('carts/checkout', 'CartController@checkout')->name('carts.checkout');

// Pay
Route::post('carts/checkout', 'CartController@pay')->name('carts.pay');

Route::get('carts/checkout/print-receipt', 'CartController@printReceipt')->name('carts.print-receipt');
