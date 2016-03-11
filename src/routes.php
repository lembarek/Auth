<?php

Route::group(['middleware' => ['web']], function () {

    Route::get('/register', [
    'as' => 'user:register',
    'uses' => 'Lembarek\Auth\Controllers\AuthController@register',
    ]);

    Route::post('/register', [
    'as' => 'user:register',
    'uses' => 'Lembarek\Auth\Controllers\AuthController@postRegister',
    ]);

    Route::get('/login', [
    'as' => 'user:login',
    'uses' => 'Lembarek\Auth\Controllers\AuthController@login',
    ]);

    Route::post('/login', [
    'as' => 'user:login',
    'uses' => 'Lembarek\Auth\Controllers\AuthController@postLogin',
    ]);


    Route::get('/logout', [
        'as' => 'logout',
        'uses' => 'Lembarek\Auth\Controllers\AuthController@logout',
        ]);


    Route::get('/reset_password', [
        'as' => 'auth::reset.showEmail',
        'uses' => 'Lembarek\Auth\Controllers\PasswordController@showEmail',
        ]);


    Route::post('/reset_password', [
        'as' => 'auth::reset.sendToEmail',
        'uses' => 'Lembarek\Auth\Controllers\PasswordController@sendToEmail',
        ]);


    Route::get('/reset_password/{token}', [
        'as' => 'auth::reset_password',
        'uses' => 'Lembarek\Auth\Controllers\PasswordController@showPasswordField',
        ]);


    Route::post('/post_reset_password', [
        'as' => 'auth::post_reset_password',
        'uses' => 'Lembarek\Auth\Controllers\PasswordController@resetPassword',
        ]);
});
