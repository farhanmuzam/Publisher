<?php

namespace App;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Connection\AMQPSSLConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMQService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function buyPublish($message)
    {
        $connection = new AMQPStreamConnection(env('MQ_HOST'), env('MQ_PORT'), env('MQ_USER'), env('MQ_PASS'), env('MQ_VHOST'));
        $channel = $connection->channel();
        $channel->exchange_declare('buy_exchange', 'direct', false, false, false);
        $channel->queue_declare('buy_queue', false, false, false, false);
        $channel->queue_bind('buy_queue', 'buy_exchange', 'buy_exchange');
        $msg = new AMQPMessage($message);
        $channel->basic_publish($msg, 'buy_exchange', 'buy_exchange');
        echo " [x] Sent $message to buy_exchange / buy_queue.\n";
        $channel->close();
        $connection->close();
    }

    public function orderPublish($message)
    {
        $connection = new AMQPStreamConnection(env('MQ_HOST'), env('MQ_PORT'), env('MQ_USER'), env('MQ_PASS'), env('MQ_VHOST'));
        $channel = $connection->channel();
        $channel->exchange_declare('order_exchange', 'direct', false, false, false);
        $channel->queue_declare('order_queue', false, false, false, false);
        $channel->queue_bind('order_queue', 'order_exchange', 'order_exchange');
        $msg = new AMQPMessage($message);
        $channel->basic_publish($msg, 'order_exchange', 'order_exchange');
        echo " [x] Sent $message to order_exchange / order_queue.\n";
        $channel->close();
        $connection->close();
    }
}
