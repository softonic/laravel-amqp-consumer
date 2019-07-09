<?php

return [
    /*
     |--------------------------------------------------------------------------
     | AMQP properties separated by key
     |--------------------------------------------------------------------------
     */
    'properties'    => [
        'host'                => env('AMQP_HOST', 'localhost'),
        'port'                => env('AMQP_PORT', 5672),
        'username'            => env('AMQP_USER', 'guest'),
        'password'            => env('AMQP_PASSWORD', 'guest'),
        'vhost'               => env('AMQP_VHOST', '/'),
        'exchange'            => env('AMQP_EXCHANGE', 'exchange'),
        'exchange_type'       => 'topic',
        'exchange_durable'    => true,
        'consumer_tag'        => 'consumer',
        'ssl_options'         => [], // See https://secure.php.net/manual/en/context.ssl.php
        'connect_options'     => [], // See https://github.com/php-amqplib/php-amqplib/blob/master/PhpAmqpLib/Connection/AMQPSSLConnection.php
        'queue_properties'    => ['x-ha-policy' => ['S', 'all']],
        'exchange_properties' => [],
        'timeout'             => 0,
    ],

    /*
    |--------------------------------------------------------------------------
    | Queue where the messages will be received
    |--------------------------------------------------------------------------
    */
    'queue'         => env('AMQP_QUEUE', 'queue'),

    /*
    |--------------------------------------------------------------------------
    | Message handlers by routing key
    |--------------------------------------------------------------------------
    |
    | Example:
    |   'message_handlers' => [
    |       \App\Jobs\Example::class => [
    |           'example_api.#.example',
    |           'other_api.create.other',
    |       ],
    |   ],
    */
    'message_handlers' => [],
];
