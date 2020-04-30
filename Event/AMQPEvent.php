<?php

namespace OldSound\RabbitMqBundle\Event;

use OldSound\RabbitMqBundle\RabbitMq\Consumer;
use PhpAmqpLib\Message\AMQPMessage;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class AMQPEvent
 *
 * @package OldSound\RabbitMqBundle\Event
 * @codeCoverageIgnore
 */
class AMQPEvent extends AbstractAMQPEvent
{
    const ON_CONSUME                = 'on_consume';
    const ON_IDLE                   = 'on_idle';
    const ON_ERROR                  = 'on_error';
    const ON_STOP_CONSUMING         = 'on_stop_consuming';
    const BEFORE_PROCESSING_MESSAGE = 'before_processing';
    const AFTER_PROCESSING_MESSAGE  = 'after_processing';
}
