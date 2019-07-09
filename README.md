Laravel Amqp Consumer
====================================

[![Latest Version](https://img.shields.io/github/release/softonic/laravel-amqp-consumer.svg?style=flat-square)](https://github.com/softonic/laravel-amqp-consumer/releases)
[![Software License](https://img.shields.io/badge/license-Apache%202.0-blue.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/softonic/laravel-amqp-consumer/master.svg?style=flat-square)](https://travis-ci.org/softonic/laravel-amqp-consumer)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/softonic/laravel-amqp-consumer.svg?style=flat-square)](https://scrutinizer-ci.com/g/softonic/laravel-amqp-consumer/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/softonic/laravel-amqp-consumer.svg?style=flat-square)](https://scrutinizer-ci.com/g/softonic/laravel-amqp-consumer)
[![Total Downloads](https://img.shields.io/packagist/dt/softonic/laravel-amqp-consumer.svg?style=flat-square)](https://packagist.org/packages/softonic/laravel-amqp-consumer)

Laravel package to handle the consumption of SOA ecosystem events.

Installation
-------

Via composer:
```
composer require softonic/laravel-amqp-consumer
```

Documentation
-------

It is possible to configure the basic AMQP information, you can check it in `vendor/softonic/laravel-amqp-consumer/config/amqp-consumer.php`

Testing
-------

`softonic/laravel-amqp-consumer` has a [PHPUnit](https://phpunit.de) test suite and a coding style compliance test suite using [PHP CS Fixer](http://cs.sensiolabs.org/).

To run the tests, run the following command from the project folder.

``` bash
$ docker-compose run tests
```

To run interactively using [PsySH](http://psysh.org/):
``` bash
$ docker-compose run psysh
```

License
-------

The Apache 2.0 license. Please see [LICENSE](LICENSE) for more information.

[PSR-2]: http://www.php-fig.org/psr/psr-2/
[PSR-4]: http://www.php-fig.org/psr/psr-4/
