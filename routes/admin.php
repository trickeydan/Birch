<?php

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


Route::group(['prefix' => config('site.admin_url'),'middleware' => 'auth'],function(){

    Route::get('/','DashboardController@index')->name('admin.dashboard');

    Route::group(['prefix' => 'settings'],function(){
        Route::get('/','SettingsController@index')->name('admin.settings');

        Route::get('changepassword','SettingsController@passwordChange')->name('settings.changepassword');
        Route::post('changepassword','SettingsController@passwordChangePost')->name('settings.changepassword.post');
    });
});


