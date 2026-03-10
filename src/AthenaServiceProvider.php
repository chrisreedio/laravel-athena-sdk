<?php

namespace ChrisReedIO\AthenaSDK;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class AthenaServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-athena-sdk')
            ->hasConfigFile();
    }
}
