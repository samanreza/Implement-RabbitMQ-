<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use VladimirYuldashev\LaravelQueueRabbitMQ\Queue\Jobs\RabbitMQJob as BaseJob;


class User implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private array $data;
    /**
     * Create a new job instance.
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        dd($this->data);
        $data = $this->data;
         $create_user = new \App\Models\User();
         $create_user->setName($data['name']);
         $create_user->setLastName($data['last_name']);
         $create_user->setNationalCard($data['nationalcard']);
         $create_user->setDateBirth($data['date_birth']);
         $create_user->setPassword($data['password']);
         $create_user->save();
    }
}
