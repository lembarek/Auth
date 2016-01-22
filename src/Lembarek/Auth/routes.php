<?php

Route::group(['middleware' => ['web']], function(){

Route::get('/register', [
    'as' => 'user:register',
    'uses' => 'Lembarek\Auth\Controllers\AuthController@register',
    ]);

});
