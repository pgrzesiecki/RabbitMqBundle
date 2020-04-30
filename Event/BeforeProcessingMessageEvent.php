<?php

namespace OldSound\RabbitMqBundle\Event;

use OldSound\RabbitMqBundle\RabbitMq\Consumer;
use PhpAmqpLib\Message\AMQPMessage;

/**
 * Class BeforeProcessingMessageEvent
 *
 * @package OldSound\RabbitMqBundle\Event
 */
class BeforeProcessingMessageEvent extends AMQPEvent
{
    const NAME = AMQPEvent::BEFORE_PROCESSING_MESSAGE;

    /**
     * @var Consumer
     */
    private $consumer;

    /**
     * @var AMQPMessage
     */
    private $AMQPMessage;

    /**
     * BeforeProcessingMessageEvent constructor.
     *
     * @param Consumer $consumer
     * @param AMQPMessage $AMQPMessage
     */
    public function __construct(Consumer $consumer, AMQPMessage $AMQPMessage)
    {
        $this->consumer = $consumer;
        $this->AMQPMessage = $AMQPMessage;
    }

    /**
     * @return Consumer
     */
    public function getConsumer()
    {
        return $this->consumer;
    }

    /**
     * @return AMQPMessage
     */
    public function getAMQPMessage()
    {
        return $this->AMQPMessage;
    }
}
