<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function (){
    Route::post('/signin', 'SignInController');
    Route::post('/signout', 'SignOutController');
    Route::get('/self', 'SelfController');
});

Route::group(['prefix' => 'settings', 'namespace' => 'Settings'], function(){
    Route::group(['prefix' => 'profile', 'namespace' => 'Profile'], function(){
        Route::post('/updateprofile', 'UpdateProfileController');
    });
});
