<?php

namespace Softonic\AmqpConsumer;

use PhpAmqpLib\Message\AMQPMessage;

class AmqpHandler
{
    /**
     * @var array
     */
    protected $messageHandlers;

    public function __construct(array $messageHandlers)
    {
        $this->messageHandlers = $messageHandlers;
    }

    public function handle(AMQPMessage $message)
    {
        $messageHandlers = $this->getMessageHandlers($message->get('routing_key'));

        foreach ($messageHandlers as $messageHandler) {
            $messageHandler::dispatch($message);
        }
    }

    private function getMessageHandlers(string $routingKey): array
    {
        $messageHandlers = [];
        foreach ($this->messageHandlers as $job => $messageHandlerRoutingKeys) {
            $messageHandlerRoutingKeysRegex = $this->getRoutingKeysRegex($messageHandlerRoutingKeys);

            if (preg_match($messageHandlerRoutingKeysRegex, $routingKey)) {
                $messageHandlers[] = $job;
            }
        }

        return $messageHandlers;
    }

    private function getRoutingKeysRegex(array $messageHandlerRoutingKeys): string
    {
        $messageHandlerRoutingKeysFlattened = implode('|', $messageHandlerRoutingKeys);
        $messageHandlerRoutingKeysRegex     = preg_replace(
            ['/\./', '/#/'],
            ['\\.', '.*'],
            $messageHandlerRoutingKeysFlattened
        );

        return '/' . $messageHandlerRoutingKeysRegex . '/';
    }
}
