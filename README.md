# contentful-management.php

[![Packagist](https://img.shields.io/packagist/v/contentful/contentful-management.svg?style=for-the-badge)](https://packagist.org/packages/contentful/contentful-management)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/contentful/contentful-management.svg?style=for-the-badge)](https://packagist.org/packages/contentful/contentful-management)
[![Travis](https://img.shields.io/travis/contentful/contentful-management.php.svg?style=for-the-badge)](https://travis-ci.org/contentful/contentful-management.php)
[![Packagist](https://img.shields.io/github/license/contentful/contentful-management.php.svg?style=for-the-badge)](https://packagist.org/packages/contentful/contentful-management.php)
[![Codecov](https://img.shields.io/codecov/c/github/contentful/contentful-management.php.svg?style=for-the-badge)](https://codecov.io/gh/contentful/contentful-management.php)

PHP SDK for [Contentful's](https://www.contentful.com) Content Management API.

[Contentful](https://www.contentful.com) is a content management platform for web applications, mobile apps and connected devices. It allows you to create, edit & manage content in the cloud and publish it anywhere via powerful API. Contentful offers tools for managing editorial teams and enabling cooperation between organizations.

The SDK requires at least PHP 7.0.

The SDK is currently in an alpha state. The API might change at any time. It should not be used in production.

## Setup

To add this package to your `composer.json` and install it execute the following command:

``` bash
composer require contentful/contentful-management:@dev
```

Then, if not already done, include the Composer autoloader:

``` php
require_once 'vendor/autoload.php';
```

## Usage

The first thing that needs to be done is initiating an instance of `Contentful\Management\Client` by giving it an access token. All actions performed using this instance of the `Client` will be performed with the privileges of the user this token belongs to.

``` php
$client = new \Contentful\Management\Client('access-token');
```

The client itself allows creating, updating and deleting spaces. For any operation that happens within a space, a `SpaceManager` needs to be retrieved for that one space.

## License

Copyright (c) 2015-2017 Contentful GmbH. Code released under the MIT license. See [LICENSE](LICENSE) for further details.
