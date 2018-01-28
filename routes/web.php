<?php

/**
 * The Home Page
 */
Route::get('/', 'PagesController@home');

/**
 * Notices
 */
Route::resource('notices', 'NoticesController', ['only' => [
    'index', 'create'
]]);
Route::post('/notices/confirm', 'NoticesController@confirm')->name('notices.confirm');

/**
 * Authentication
 */
Auth::routes();

// Will be replaced
Route::get('/home', 'HomeController@index')->name('home');
