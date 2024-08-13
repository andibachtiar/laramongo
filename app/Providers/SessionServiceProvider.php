<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use App\Extensions\MongoSessionHandler;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Foundation\Application;

class SessionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Session::extend('mongodb', function (Application $app) {
            $connection = DB::connection('mongodb');
            $table = env('SESSION_COLLECTION', '');
            $minutes = env('SESSION_LIFETIME', '');
            return new MongoSessionHandler($connection, $table, $minutes, $app);
        });

    }
}
