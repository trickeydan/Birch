<?php

namespace Trickeydan\Birchcms;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class BirchServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        $router->middleware('perm','Trickeydan\Birchcms\Http\Middleware\CheckPermission');
        $this->loadMigrationsFrom(__DIR__.'/migrations');

        $this->mergeConfigFrom(
            __DIR__.'/config/birch.php', 'birch'
        );
        $this->mergeConfigFrom(
            __DIR__.'/config/pages.php', 'pages'
        );

        /*$this->publishes([
            __DIR__.'/config/birch.php' => config_path('birch.php'),
        ]);*/

        $this->loadViewsFrom(__DIR__.'/views', 'birch');

        view()->composer('*', function ($view) {
            if(Auth::check()){
                $view->with('user',Auth::User());
            }
        });

        Validator::extend('pwdcorrect', function($attribute, $value, $parameters, $validator) {
            return Auth::validate(['username' => Auth::User()->username,'password' => $value]);
        });

        //view()->composer(config('birch.admin_url') . '/*', function ($view) {
        view()->composer('*', function ($view) {

            $view->with('menu',config('pages.menu'));
            $view->with('pages',config('pages.pages'));
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        Route::group([
            'middleware' => 'web',
            'namespace' => 'Trickeydan\Birchcms\Http\Controllers',
        ], function ($router) {
            include __DIR__ . '/routes.php';
        });

        $this->app->make('Trickeydan\Birchcms\Http\Controllers\DashboardController');
        $this->app->make('Trickeydan\Birchcms\Http\Controllers\GroupController');
        $this->app->make('Trickeydan\Birchcms\Http\Controllers\UserController');
        $this->app->make('Trickeydan\Birchcms\Http\Controllers\SettingsController');
    }
}
