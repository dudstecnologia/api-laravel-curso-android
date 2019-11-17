<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/status', function () {
    return ['status'=>'ok'];
});

Route::namespace('Api')->group( function() {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');

    Route::middleware('auth:api')->group( function () {
        Route::get('logout', 'AuthController@logout');
        Route::resource('contatos', 'ContatoController');
    });
});
