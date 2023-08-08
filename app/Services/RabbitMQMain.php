<?php

namespace App\Services;

use App\Contract\IRabbitMQ;

class RabbitMQMain
{
    /**
     * @param $message
     * @param IRabbitMQ|null $IRabbitMQ
     * @return void
     */
    public function publish( $message,IRabbitMQ $IRabbitMQ = null): void
    {
        $IRabbitMQ ?: (new RabbitMQService())->publish($message);
         //$IRabbitMQ->publish($message);
    }


    /**
     * @throws \ErrorException
     */
    public function consume(IRabbitMQ $IRabbitMQ): void
    {
        $IRabbitMQ ?: (new RabbitMQService())->consume();;
         //$IRabbitMQ->consume();
    }
}
