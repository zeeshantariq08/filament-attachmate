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
            ->hasMigrations([
                '2024_02_24_192352_create_attachments_table'
            ])
            ->runsMigrations();
    }
}
