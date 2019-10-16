# Laravel Athena
Laravel athena database driver

## Compatibility
Laravel 5.7+

## Installation Steps
1. `composer require bilaliqbalr/laravel-athena`
2. `php artisan vendor:publish` to publish config file.
3. Open `config/database.php` and add new connection as specified below.
```php
'connections' => [
    ...
    'athena' => [
        'driver' => 'athena',
    ]
]
```
