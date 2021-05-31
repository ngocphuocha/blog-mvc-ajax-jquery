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
