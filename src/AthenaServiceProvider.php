<?php

namespace ChrisReedIO\AthenaSDK;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use ChrisReedIO\AthenaSDK\Commands\AthenaCommand;

class AthenaServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-athena-sdk')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-athena-sdk_table')
            ->hasCommand(AthenaCommand::class);
    }
}
