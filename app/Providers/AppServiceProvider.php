<?php

namespace Birch\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            if(Auth::check()){
                $view->with('user',Auth::User());
            }
        });

        Validator::extend('pwdcorrect', function($attribute, $value, $parameters, $validator) {
            return Auth::validate(['username' => Auth::User()->username,'password' => $value]);
        });

        view()->composer(config('site.admin_url') . '/*', function ($view) {
            $view->with('menu',config('admin.menu'));
            $view->with('pages',config('admin.pages'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
