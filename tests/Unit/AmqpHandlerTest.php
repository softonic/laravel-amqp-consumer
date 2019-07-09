<?php

namespace Softonic\AmqpConsumer;

use Orchestra\Testbench\TestCase;
use PhpAmqpLib\Message\AMQPMessage;

class AmqpHandlerTest extends TestCase
{
    /**
     * @var AmqpHandler
     */
    private $amqpHandler;

    protected function setUp(): void
    {
        parent::setUp();

        $this->amqpHandler = new AmqpHandler(
            [
                FakeJob1::class => [
                    'example_api.#.example',
                    'other_api.create.other',
                ],
                FakeJob2::class => [
                    'example_api.#.example',
                ],
            ]
        );
    }

    /**
     * @test
     */
    public function whenRoutingKeyDoesNotMatchAnyJobItShouldDoNothing()
    {
        $messageBody            = [
            'service' => 'other_api',
            'payload' => [
                'id_other' => 'd8585972-4ff7-4a86-b2d1-52bdeec51c7a',
                'name'     => 'test',
            ],
        ];
        $message                = new AMQPMessage(json_encode($messageBody));
        $message->delivery_info = [
            'routing_key' => 'other_api.delete.other',
        ];

        $this->doesntExpectJobs(FakeJob1::class);
        $this->doesntExpectJobs(FakeJob2::class);

        $this->amqpHandler->handle($message);
    }

    /**
     * @test
     */
    public function whenRoutingKeyMatchesOneJobItShouldBeDispatched()
    {
        $messageBody            = [
            'service' => 'other_api',
            'payload' => [
                'id_other' => 'd8585972-4ff7-4a86-b2d1-52bdeec51c7a',
                'name'     => 'test',
            ],
        ];
        $message                = new AMQPMessage(json_encode($messageBody));
        $message->delivery_info = [
            'routing_key' => 'other_api.create.other',
        ];

        $this->expectsJobs(FakeJob1::class);
        $this->doesntExpectJobs(FakeJob2::class);

        $this->amqpHandler->handle($message);
    }

    /**
     * @test
     */
    public function whenRoutingKeyMatchesTwoJobsTheyShouldBeDispatched()
    {
        $messageBody            = [
            'service' => 'example_api',
            'payload' => [
                'id_example' => 'd8585972-4ff7-4a86-b2d1-52bdeec51c7a',
                'name'       => 'test',
            ],
        ];
        $message                = new AMQPMessage(json_encode($messageBody));
        $message->delivery_info = [
            'routing_key' => 'example_api.create.example',
        ];

        $this->expectsJobs(FakeJob1::class);
        $this->expectsJobs(FakeJob2::class);

        $this->amqpHandler->handle($message);
    }
}
