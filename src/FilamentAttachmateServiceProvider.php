<?php

namespace ZeeshanTariq\FilamentAttachmate;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentAttachmateServiceProvider extends PackageServiceProvider
{

    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-attachmate')
            ->hasMigration('create_attachments_table')
            ->runsMigrations();
    }
}
