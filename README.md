# Filament Attachmate

This package provides attachment management using a polymorphic morphMany relationship within Filament. The system allows for the seamless association of attachments with various models, enabling flexible and efficient handling of file attachments across your application.

![Filament Attachmate](https://raw.githubusercontent.com/zeeshantariq08/filament-attachmate/main/filament-attachmate-banner.png)


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
3. Configure the Filament resource
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
4. Configure the Filament resource
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
5. Configure the Filament resource
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

Please see [CHANGELOG](https://github.com/zeeshantariq08/filament-attachmate/blob/main/CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/zeeshantariq08/filament-attachmate/blob/main/CONTRIBUTING.md) for details.

## Credits

- [zeeshan](https://github.com/zeeshantariq08)

## License

The MIT License (MIT). Please see [License File](https://github.com/zeeshantariq08/filament-attachmate/blob/main/LICENSE.md) for more information.
