<?php

namespace OldSound\RabbitMqBundle\Event;

use Error;
use Exception;
use OldSound\RabbitMqBundle\RabbitMq\Consumer;
use PhpAmqpLib\Message\AMQPMessage;

/**
 * Class OnStopConsumerEvent
 *
 * @package OldSound\RabbitMqBundle\Event
 */
class OnStopConsumerEvent extends AMQPEvent
{
    const NAME = AMQPEvent::ON_STOP_CONSUMING;

    /**
     * @var Consumer
     */
    protected $consumer;

    /**
     * @var AMQPMessage
     */
    protected $AMQPMessage;

    /**
     * @var Exception|Error
     */
    protected $error;

    /**
     * OnErrorEvent constructor.
     *
     * @param Consumer $consumer
     * @param AMQPMessage $AMQPMessage
     * @param Exception|Error $error
     */
    public function __construct(Consumer $consumer, AMQPMessage $AMQPMessage, $error)
    {
        $this->consumer = $consumer;
        $this->AMQPMessage = $AMQPMessage;
        $this->error = $error;
    }

    /**
     * @return Consumer
     */
    public function getConsumer(): Consumer
    {
        return $this->consumer;
    }

    /**
     * @return AMQPMessage
     */
    public function getAMQPMessage(): AMQPMessage
    {
        return $this->AMQPMessage;
    }

    /**
     * @return Error|Exception
     */
    public function getError()
    {
        return $this->error;
    }
}
