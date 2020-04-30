<?php

namespace OldSound\RabbitMqBundle\Event;

use Error;
use Exception;
use OldSound\RabbitMqBundle\RabbitMq\Consumer;
use PhpAmqpLib\Message\AMQPMessage;

/**
 * Class OnErrorEvent
 *
 * @package OldSound\RabbitMqBundle\Event
 */
class OnErrorEvent extends AMQPEvent
{
    const NAME = AMQPEvent::ON_ERROR;

    /**
     * @var Consumer
     */
    private $consumer;

    /**
     * @var AMQPMessage
     */
    private $AMQPMessage;

    /**
     * @var Exception|Error
     */
    private $error;

    /**
     * @var int|null
     */
    private $processFlag;

    /**
     * OnErrorEvent constructor.
     *
     * @param Consumer $consumer
     * @param AMQPMessage $AMQPMessage
     * @param Exception|Error $error
     * @param int $processFlag
     */
    public function __construct(Consumer $consumer, AMQPMessage $AMQPMessage, $error, ?int $processFlag)
    {
        $this->consumer = $consumer;
        $this->AMQPMessage = $AMQPMessage;
        $this->error = $error;
        $this->processFlag = $processFlag;
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

    /**
     * @return int|null
     */
    public function getProcessFlag(): int
    {
        return $this->processFlag;
    }

    /**
     * @param int|null $processFlag
     */
    public function setProcessFlag(?int $processFlag): void
    {
        $this->processFlag = $processFlag;
    }
}
