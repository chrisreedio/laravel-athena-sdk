<?php

namespace ChrisReedIO\Athena;

use ChrisReedIO\Athena\Commands\AthenaCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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
