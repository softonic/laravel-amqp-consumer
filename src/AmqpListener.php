<?php

namespace Softonic\AmqpConsumer;

use Bschmitt\Amqp\Amqp;
use Illuminate\Console\Command;

class AmqpListener extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'amqp:listen';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Listen AMQP messages';

    /**
     * @var string
     */
    protected $queue;

    /**
     * @var array
     */
    protected $amqpProperties;

    public function __construct(string $queue, array $amqpProperties)
    {
        parent::__construct();

        $this->queue          = $queue;
        $this->amqpProperties = $amqpProperties;
    }

    public function handle(Amqp $amqp, AmqpHandler $amqpHandler)
    {
        $amqp->consume(
            $this->queue,
            function ($message, $resolver) use ($amqpHandler) {
                $amqpHandler->handle($message);

                $resolver->acknowledge($message);
            },
            $this->amqpProperties
        );
    }
}
