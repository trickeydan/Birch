<?php

namespace Trickeydan\Birchcms;

use Trickeydan\Birchcms\Commands\PermissionSeed;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Trickeydan\Birchcms\Commands\SetupCommand;

class BirchServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                SetupCommand::class,
                PermissionSeed::class,
            ]);
        }

        $router->middleware('perm','Trickeydan\Birchcms\Http\Middleware\CheckPermission');
        $this->loadMigrationsFrom(__DIR__.'/migrations');

        $this->mergeConfigFrom(
            __DIR__.'/config/birch_general.php', 'birch'
        );
        $this->mergeConfigFrom(
            __DIR__.'/config/birch_pages.php', 'pages'
        );

        $this->publishes([
            __DIR__.'/assets/compiled' => public_path(),
        ], 'public');

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
