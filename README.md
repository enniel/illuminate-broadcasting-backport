# Laravel Broadcasting for Laravel 5.1 / 5.2

This package acts as a backport for the Laravel 5.3 broadcasting system, to allow its usage with Laravel 5.1 and Laravel 5.2. 

## Installation

You can install the package via composer:

```bash
composer require enniel/illuminate-broadcasting-backport
```

Next, you must load the service provider:

```php
// config/app.php
'providers' => [
    // ...
    Illuminate\Broadcasting\BroadcastServiceProvider::class,
],
```

## Usage

Please refer to the [official Laravel Broadcasting documentation](https://laravel.com/docs/5.3/broadcasting).

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
