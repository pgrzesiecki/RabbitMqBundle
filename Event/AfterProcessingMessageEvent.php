<?php

namespace OldSound\RabbitMqBundle\Event;

use OldSound\RabbitMqBundle\RabbitMq\Consumer;
use PhpAmqpLib\Message\AMQPMessage;

/**
 * Class AfterProcessingMessageEvent
 *
 * @package OldSound\RabbitMqBundle\Event
 */
class AfterProcessingMessageEvent extends AMQPEvent
{
    const NAME = AMQPEvent::AFTER_PROCESSING_MESSAGE;

    /**
     * @var Consumer
     */
    private $consumer;

    /**
     * @var AMQPMessage
     */
    private $AMQPMessage;

    /**
     * @var int|null
     */
    private $processFlag;

    /**
     * AfterProcessingMessageEvent constructor.
     *
     * @param Consumer $consumer
     * @param AMQPMessage $AMQPMessage
     * @param int|null $processFlag
     */
    public function __construct(Consumer $consumer, AMQPMessage $AMQPMessage, ?int $processFlag = null)
    {
        $this->consumer = $consumer;
        $this->AMQPMessage = $AMQPMessage;
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
     * @return int|null
     */
    public function getProcessFlag(): ?int
    {
        return $this->processFlag;
    }

    /**
     * @param int|null $processFlag
     * @return $this
     */
    public function setProcessFlag(?int $processFlag): AfterProcessingMessageEvent
    {
        $this->processFlag = $processFlag;

        return $this;
    }
}
