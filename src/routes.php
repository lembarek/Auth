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





});
