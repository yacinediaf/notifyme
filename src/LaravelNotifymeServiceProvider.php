<?php

namespace YacineDiaf\LaravelNotifyme;

use Illuminate\Support\ServiceProvider;

class LaravelNotifymeServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');
        $this->publishesMigrations([
            __DIR__ . '/../database/migrations' => database_path('migrations'),
        ], 'migrations');
    }
}
