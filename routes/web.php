<?php

/**
 * The Home Page
 */
Route::get('/', 'PagesController@home');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
