<?php

namespace App\Services;

use App\Contract\IRabbitMQ;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
use PhpAmqpLib\Wire\IO\SocketIO;

class RabbitMQService implements IRabbitMQ
{
    public AMQPStreamConnection $AMQPStreamConnection;

    /**
     * @throws \Exception
     */
    public function __construct()
    {
        $this->AMQPStreamConnection = new AMQPStreamConnection(env('MQ_HOST'), env('MQ_PORT'), env('MQ_USER'), env('MQ_PASS'),env('MQ_VHOST'));
    }
    /**
     * @param  $message
     * @return void
     */
    public function publish( $message): void
    {
        define('SOCKET_EAGAIN', 11);
        $connection = $this->AMQPStreamConnection;
        $channel = $connection->channel();
        $channel->exchange_declare('test_exchange', 'direct', false, false, false);
        $channel->queue_declare('test_queue', false, false, false, false);
        $channel->queue_bind('test_queue', 'test_exchange', 'test_key');
        $msg = new AMQPMessage($message);
        $channel->basic_publish($msg, 'test_exchange', 'test_key');
        //echo " [x] Sent $message to test_exchange / test_queue.\n";
        $channel->close();
        $connection->close();
    }

    /**
     * @return void
     * @throws \ErrorException
     */
    public function consume(): void
    {
        $connection = $this->AMQPStreamConnection;
        $channel = $connection->channel();
        $callback = function ($msg) {
            echo ' [x] Received ', $msg->body, "\n";
        };
        $channel->queue_declare('test_queue', false, false, false, false);
        $channel->basic_consume('test_queue', '', false, true, false, false, $callback);
        echo 'Waiting for new message on test_queue', " \n";
        while ($channel) {
            $channel->wait();
        }
        $channel->close();
        $connection->close();
    }
}
