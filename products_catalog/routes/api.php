<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('categories', 'CategoryController@index');
Route::get('categories/{id}', 'CategoryController@show');
Route::post('categories', 'CategoryController@store');
Route::put('categories/{id}', 'CategoryController@update');
Route::delete('categories/{id}', 'CategoryController@delete');
