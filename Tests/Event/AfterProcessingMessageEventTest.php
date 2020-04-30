<?php

namespace OldSound\RabbitMqBundle\Tests\Event;

use OldSound\RabbitMqBundle\Event\AfterProcessingMessageEvent;
use OldSound\RabbitMqBundle\RabbitMq\Consumer;
use OldSound\RabbitMqBundle\RabbitMq\ConsumerInterface;
use PhpAmqpLib\Message\AMQPMessage;
use PHPUnit\Framework\TestCase;

/**
 * Class AfterProcessingMessageEventTest
 *
 * @package OldSound\RabbitMqBundle\Tests\Event
 */
class AfterProcessingMessageEventTest extends TestCase
{
    /**
     * @return Consumer
     */
    protected function getConsumer()
    {
        return new Consumer(
            $this->getMockBuilder('\PhpAmqpLib\Connection\AMQPConnection')
                ->disableOriginalConstructor()
                ->getMock(),
            $this->getMockBuilder('\PhpAmqpLib\Channel\AMQPChannel')
                ->disableOriginalConstructor()
                ->getMock()
        );
    }

    public function testEvent()
    {
        $AMQPMessage = new AMQPMessage('body');
        $consumer = $this->getConsumer();
        $event = new AfterProcessingMessageEvent($consumer, $AMQPMessage, ConsumerInterface::MSG_ACK);
        $this->assertSame($AMQPMessage, $event->getAMQPMessage());
        $this->assertSame($consumer, $event->getConsumer());
        $this->assertSame(ConsumerInterface::MSG_ACK, $event->getProcessFlag());
    }
}
