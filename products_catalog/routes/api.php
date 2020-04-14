<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'categories'], function (){
    Route::get('/', 'CategoryController@index')->name('categories');
    Route::get('/{id}', 'CategoryController@show')->name('categories.show');
    Route::post('/', 'CategoryController@store')->name('categories.store');
    Route::put('/{id}', 'CategoryController@update')->name('categories.update');
    Route::delete('/{id}', 'CategoryController@delete')->name('categories.delete');
});


Route::group(['prefix' => 'products'], function (){
    Route::get('/', 'ProductController@index')->name('products');
    Route::get('/{id}', 'ProductController@show')->name('products.show');
    Route::post('/', 'ProductController@store')->name('products.store');
    Route::put('/{id}', 'ProductController@update')->name('products.update');
    Route::delete('/{id}', 'ProductController@delete')->name('products.delete');
});

