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

    Route::get('/','DashboardController@index')->middleware('perm:admin.dashboard')->name('admin.dashboard');

    Route::group(['prefix' => 'settings'],function(){
        Route::get('/','SettingsController@index')->middleware('perm:admin.settings.index')->name('admin.settings.index');

        Route::get('changepassword','SettingsController@passwordChange')->middleware('perm:admin.settings.changepassword')->name('admin.settings.changepassword');
        Route::post('changepassword','SettingsController@passwordChangePost')->middleware('perm:admin.settings.changepassword')->name('admin.settings.changepassword.post');

        Route::get('update','SettingsController@updateUser')->middleware('perm:admin.settings.update')->name('admin.settings.update');
        Route::put('update','SettingsController@updateUserPost')->middleware('perm:admin.settings.update')->name('admin.settings.update');

    });

    Route::group(['prefix' => 'users'],function(){
        Route::get('/','UserController@index')->middleware('perm:admin.users.index')->name('admin.users.index');

        Route::get('create','UserController@create')->middleware('perm:admin.users.create')->name('admin.users.create');
        Route::post('create','UserController@createPost')->middleware('perm:admin.users.create')->name('admin.users.create');

        Route::get('{user}','UserController@view')->middleware('perm:admin.users.view')->name('admin.users.view');

        Route::get('{user}/update','UserController@update')->middleware('perm:admin.users.update')->name('admin.users.update');
        Route::put('{user}/update','UserController@updatePost')->middleware('perm:admin.users.update')->name('admin.users.update');

        Route::get('{user}/resetlink','UserController@sendResetLink')->middleware('perm:admin.users.sendresetlink')->name('admin.users.sendresetlink');
    });

    Route::group(['prefix' => 'groups'],function(){
       Route::get('/','GroupController@index')->middleware('perm:admin.groups.index')->name('admin.groups.index');
       Route::get('create','GroupController@create')->middleware('perm:admin.groups.create')->name('admin.groups.create');
       Route::post('create','GroupController@createPost')->middleware('perm:admin.groups.create')->name('admin.groups.create');
    });
});


