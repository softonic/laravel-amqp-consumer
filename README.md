Laravel Amqp Consumer
====================================

[![Latest Version](https://img.shields.io/github/release/softonic/laravel-amqp-consumer.svg?style=flat-square)](https://github.com/softonic/laravel-amqp-consumer/releases)
[![Software License](https://img.shields.io/badge/license-Apache%202.0-blue.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/softonic/laravel-amqp-consumer/master.svg?style=flat-square)](https://travis-ci.org/softonic/laravel-amqp-consumer)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/softonic/laravel-amqp-consumer.svg?style=flat-square)](https://scrutinizer-ci.com/g/softonic/laravel-amqp-consumer/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/softonic/laravel-amqp-consumer.svg?style=flat-square)](https://scrutinizer-ci.com/g/softonic/laravel-amqp-consumer)
[![Total Downloads](https://img.shields.io/packagist/dt/softonic/laravel-amqp-consumer.svg?style=flat-square)](https://packagist.org/packages/softonic/laravel-amqp-consumer)
[![Average time to resolve an issue](http://isitmaintained.com/badge/resolution/softonic/laravel-amqp-consumer.svg?style=flat-square)](http://isitmaintained.com/project/softonic/laravel-amqp-consumer "Average time to resolve an issue")
[![Percentage of issues still open](http://isitmaintained.com/badge/open/softonic/laravel-amqp-consumer.svg?style=flat-square)](http://isitmaintained.com/project/softonic/laravel-amqp-consumer "Percentage of issues still open")

Laravel package to handle the consumption of AMQP messages.

Installation
-------

Via composer:
```
composer require softonic/laravel-amqp-consumer
```

**IMPORTANT**
Until [queue multibinding PR](https://github.com/bschmitt/laravel-amqp/pull/70) will be included in the official repository,
you will need to add this fragment to your composer.json

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/softonic/laravel-amqp.git"
    }
  ],
  "require": {
      "bschmitt/laravel-amqp": "2.0.7.1"
  }
}
```

Documentation
-------

It is possible to configure the basic AMQP information, you can check it in `vendor/softonic/laravel-amqp-consumer/config/amqp-consumer.php`.

Testing
-------

`softonic/laravel-amqp-consumer` has a [PHPUnit](https://phpunit.de) test suite and a coding style compliance test suite using [PHP CS Fixer](http://cs.sensiolabs.org/).

To run the tests, run the following command from the project folder.

``` bash
$ docker-compose run test
```

License
-------

The Apache 2.0 license. Please see [LICENSE](LICENSE) for more information.

[PSR-2]: http://www.php-fig.org/psr/psr-2/
[PSR-4]: http://www.php-fig.org/psr/psr-4/
