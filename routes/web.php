<?php

/**
 * The Home Page
 */
Route::get('/', 'PagesController@home');

/**
 * Notices
 */
Route::resource('notices', 'NoticesController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
