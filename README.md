# Laravel-notifyme

[![Latest Version on Packagist](https://img.shields.io/packagist/v/yacinediaf/laravel-notifyme.svg?style=flat-square)](https://packagist.org/packages/yacinediaf/laravel-notifyme)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/yacinediaf/laravel-notifyme/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/yacinediaf/laravel-notifyme/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/yacinediaf/laravel-notifyme/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/yacinediaf/laravel-notifyme/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/yacinediaf/laravel-notifyme.svg?style=flat-square)](https://packagist.org/packages/yacinediaf/laravel-notifyme)

This package allows you to notify your users through the firebase cloud messaging technique in order to notify them using there device notification on both IOS or ANDROID with ease.

## Requirements

You need to have laravel sanctum installed.
if you don't installed it yet do it using the following command

```bash
composer require laravel/sanctum
```

## Installation

You can install the package via composer:

```bash
composer require yacinediaf/laravel-notifyme
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="laravel-notifyme-migrations"
php artisan migrate
```

> Don't forget to add the **hasDevice** trait to your User model

## Usage

1. Make sure the current user is authenticated.
2. Generate the FCM token on the client side from your mobile client (IOS, ADNROID) by installing firebase package compatible with the language you're using for example **Flutter**.
3. Save the generated FCM token for the current user with the current device by **Posting** to this endpoint **/api/save_device_token**
4. You need to include in the body parameter of the requestthe following data:

```php
    [
            'user_id' => ['required', 'exists:users,id'],
            'device_token' => ['required', 'string'],
            'device_info' => ['required', 'string'], //Iphone 15 pro max
    ];
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

-   [Yacine Diaf](https://github.com/yacinediaf)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
