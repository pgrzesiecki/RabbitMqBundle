<?php

namespace OldSound\RabbitMqBundle\Event;

use OldSound\RabbitMqBundle\RabbitMq\Consumer;

/**
 * Class OnIdleEvent
 *
 * @package OldSound\RabbitMqBundle\Command
 */
class OnIdleEvent extends AMQPEvent
{
    const NAME = AMQPEvent::ON_IDLE;

    /**
     * @var Consumer
     */
    private $consumer;

    /**
     * @var bool
     */
    private $forceStop;

    /**
     * OnConsumeEvent constructor.
     *
     * @param Consumer $consumer
     */
    public function __construct(Consumer $consumer)
    {
        $this->consumer = $consumer;
        $this->forceStop = true;
    }

    /**
     * @return Consumer
     */
    public function getConsumer(): Consumer
    {
        return $this->consumer;
    }

    /**
     * @return boolean
     */
    public function isForceStop()
    {
        return $this->forceStop;
    }

    /**
     * @param boolean $forceStop
     */
    public function setForceStop($forceStop)
    {
        $this->forceStop = $forceStop;
    }
}
