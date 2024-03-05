# Filament Attachmate

This package provides attachment management using a polymorphic morphMany relationship within Filament. The system allows for the seamless association of attachments with various models, enabling flexible and efficient handling of file attachments across your application.

![Filament Attachmate](https://github.com/zeeshantariq08/filament-attachmate/blob/main/filament-attachmate-banner.png)


## Installation

You can install the package via composer:

```bash
composer require zeeshantariq/filament-attachmate
```

The package comes with publishable assets:

**Migrations**
```bash
php artisan vendor:publish --tag="filament-attachmate-migrations"
```
## Installation

1. Create a Laravel project and configure Filament on this project

```bash
laravel new demoProject
```
Refer to Filament documentation: https://filamentphp.com/docs/3.x/panels/installation

2. Install the package
```bash
composer require zeeshantariq/filament-attachmate
```

3. Add migrations`
```bash
php artisan vendor:publish --tag="filament-attachmate-migrations"
```
4. Run migrations
```bash
php artisan migrate
```

5. Create a new Filament user (refer to the Filament documentation)
[https://filamentphp.com/docs/3.x/panels/installation]

6. Serve your project
```bash
php artisan serve
```

## Configuration

1. Create your model
```bash
php artisan make:model MyModel
```

2. Configure your model to handle morphMany attachments
```php
use ZeeshanTariq\FilamentAttachmate\Core\InteractsWithAttachments;
// ...

class MyModel extends Model
{
    use InteractsWithAttachments;
    
    // ...
}
```
4. Add a Filament resource to manage your model
Refer to the Filament documentation: [https://filamentphp.com/docs/3.x/panels/resources/getting-started]

5. Configure the Filament resource
- In your `form` Filament resource declaration you need to add `AttachmentFileUpload::make()` so your users can upload the attachments.

```php
use ZeeshanTariq\FilamentAttachmate\Forms\Components\AttachmentFileUpload;

public static function form(Form $form): Form
{
    return $form
        ->schema([
            // ...

            AttachmentFileUpload::make(),
        ]);
}
```
6. Configure the Filament resource
The last configuration needed, is to add HandleAttachmets trait to the  CreateRecord components of your model

**CreateRecord component**
```php
use ZeeshanTariq\FilamentAttachmate\Core\HandleAttachments;

class CreateMyModel extends CreateRecord
{
    use HandleAttachments;

    // ...
}
```
7. Configure the Filament resource
The last configuration needed, is to add HandleAttachmets trait to the EditRecord  components of your model

**EditRecord component**
```php
use ZeeshanTariq\FilamentAttachmate\Core\HandleAttachments;

class EditMyModel extends EditRecord
{
    use HandleAttachments;

    // ...
}
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](zeeshantariq08/filament-attachmate/security/policy) on how to report security vulnerabilities.

## Credits

- [zeeshan](https://github.com/zeeshantariq08)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
