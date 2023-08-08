<?php

namespace App\SmsGateWay;

use App\Notifications\SendSmsClass;
use SoapClient;

class KavehNegar
{

    protected mixed $lines = [];
    protected string $from;
    protected string $to;

    public function __construct($lines = [])
    {
        $this->lines = $lines;

        return $this;
    }

    public function from(string $from): static
    {
        $this->from = $from;

        return $this;
    }
    public function to(string $to): static
    {
        $this->to = $to;

        return $this;
    }

    public function line($line = ''): static
    {
        $this->lines[] = $line;

        return $this;
    }
    public function send()
    {
        return "Hi";
    }
}
