<?php

Route::group(['as' => 'auth::', 'middleware' => ['web']], function () {

    Route::get('/register', [
    'as' => 'register',
    'uses' => 'Lembarek\Auth\Controllers\AuthController@register',
    ]);

    Route::post('/register', [
    'as' => 'register',
    'uses' => 'Lembarek\Auth\Controllers\AuthController@postRegister',
    ]);

    Route::get('/login', [
    'as' => 'login',
    'uses' => 'Lembarek\Auth\Controllers\AuthController@login',
    ]);

    Route::post('/login', [
    'as' => 'login',
    'uses' => 'Lembarek\Auth\Controllers\AuthController@postLogin',
    ]);


    Route::get('/logout', [
        'as' => 'logout',
        'uses' => 'Lembarek\Auth\Controllers\AuthController@logout',
        ]);


    Route::get('/reset_password', [
        'as' => 'reset.showEmail',
        'uses' => 'Lembarek\Auth\Controllers\PasswordController@showEmail',
        ]);


    Route::post('/reset_password', [
        'as' => 'reset.sendToEmail',
        'uses' => 'Lembarek\Auth\Controllers\PasswordController@sendToEmail',
        ]);


    Route::get('/reset_password/{token}', [
        'as' => 'reset_password',
        'uses' => 'Lembarek\Auth\Controllers\PasswordController@showPasswordField',
        ]);


    Route::post('/post_reset_password', [
        'as' => 'post_reset_password',
        'uses' => 'Lembarek\Auth\Controllers\PasswordController@resetPassword',
        ]);
});
