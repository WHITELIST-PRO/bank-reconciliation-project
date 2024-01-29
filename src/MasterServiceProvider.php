<?php

namespace WhitelistPRO\BankReconciliation;

use Illuminate\Support\ServiceProvider;

class MasterServiceProvider extends ServiceProvider
{
     /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /**
         * load route form bank package's web.php inside of routes folder
         */
        $this->loadRoutesFrom(__DIR__ ."/routes/web.php");

        /**
         * load view from bank package's view folder inside of resources
         */
        $this->loadViewsFrom(__DIR__ ."/resources/view/","WhitelistPRO\BankReconciliation");

        /**
         * publish view file's on project's resources folder
         */
        // $this->publishes([__DIR__.'/resources/view/' => resource_path('views/vendor/')]);

        /**
         * publish custom css file from bank package in to laravel project vendor folder
         */
        $this->publishes([__DIR__.'/resources/assets/css/' => public_path('vendor/bankreconciliation/css')], 'public');

        /**
         * publish custom javascript file from bank package in to laravel project vendor folder
         */
        $this->publishes([__DIR__.'/resources/assets/js/' => public_path('vendor/bankreconciliation/js')], 'public');

        /**
         * publish config file on laravel config folder
         */
        $this->publishes([__DIR__.'/../config/bank-config.php' => config_path('bank-config.php')]);

        /**
         * load migration form bank package
         * publish migration of laravel project
         */
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->publishes([__DIR__.'/../database/migrations/' => database_path('migrations/')], 'migrations');

        /**
         * include bank package model
         */
        include __DIR__.'/Models/Transaction.php';
        include __DIR__.'/Models/BankData.php';

    }
}
