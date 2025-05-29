<?php

namespace YacineDiaf\LaravelNotifyme;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use YacineDiaf\LaravelNotifyme\Commands\LaravelNotifymeCommand;

class LaravelNotifymeServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-notifyme')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel_notifyme_table')
            ->hasCommand(LaravelNotifymeCommand::class);
    }
}
