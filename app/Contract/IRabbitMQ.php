<?php

namespace App\Contract;
use ErrorException;
interface IRabbitMQ
{
    /**
     * @param string $message
     * @return void
     */
    public function publish(string $message): void;

    /**
     * @return void
     * @throws ErrorException
     */
    public function consume(): void;
}
