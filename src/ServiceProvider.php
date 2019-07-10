<?php

namespace Softonic\AmqpConsumer;

use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * @var string
     */
    protected $packageName = 'amqp-consumer';

    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->publishes(
            [
                __DIR__ . '/../config/' . $this->packageName . '.php' => config_path($this->packageName . '.php'),
            ],
            'config'
        );
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/' . $this->packageName . '.php', $this->packageName);

        $this->app->bind(AmqpListener::class, function () {
            $amqpProperties  = config('amqp-consumer')['properties'];
            $messageHandlers = config('amqp-consumer')['message_handlers'];

            $routingKeys = array_unique(Arr::flatten($messageHandlers));

            $amqpProperties['routing'] = $routingKeys;

            return new AmqpListener(
                config('amqp-consumer')['queue'],
                $amqpProperties
            );
        });

        $this->app->bind(AmqpHandler::class, function () {
            return new AmqpHandler(
                config('amqp-consumer')['message_handlers']
            );
        });

        $this->commands([AmqpListener::class]);
    }
}
