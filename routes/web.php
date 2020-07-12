<?php

use Illuminate\Support\Facades\Route;

Auth::routes([
    'register' => false,
    'verify' => false,
    'reset' => false,
]);

#basic routes
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@logout' );

#My profile
Route::get('/profile', 'HomeController@profile');
Route::post('/updateProfile', 'HomeController@updateProfile');

#customer module
Route::get('/customer','CustomersController@index');
Route::post('/customer/ajaxRequest','CustomersController@ajaxRequest');
Route::get('/customer/add-customer','CustomersController@create');
Route::post('/customer/store','CustomersController@store');
Route::get('/customer/edit/{customer}','CustomersController@edit');
Route::put('/customer/update/{customer}','CustomersController@update');
Route::delete('/customer/delete/{customer}','CustomersController@destroy');