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

The last configuration needed, is to add `HandleAttachmets` trait to the `EditRecord` and `CreateRecord` components of your model

**CreateRecord component**
```php
// ...
use ZeeshanTariq\FilamentAttachmate\Core\HandleAttachments;

class CreateMyModel extends CreateRecord
{
    use HandleAttachments;

    // ...
}
...

**EditRecord component**
```php
// ...
use ZeeshanTariq\FilamentAttachmate\Core\HandleAttachments;

class EditMyModel extends EditRecord
{
    use HandleAttachments;

    // ...
}
...


