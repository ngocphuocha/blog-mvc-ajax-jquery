<?php

use Illuminate\Support\Facades\Route;
// Show view create product
Route::get('staffs/products/create', 'StaffController@createProduct')->name('products.create');

// Store new product to resource
Route::post('staffs/products', 'StaffController@storeProduct')->name('products.store');
