<?php

namespace App\Providers;

use App\Contract\IRabbitMQ;
use App\Repositories\User\AuthRepository;
use App\Services\RabbitMQService;
use Ice\SharePackage\App\Contract\Repositories\IAuthRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IRabbitMQ::class, RabbitMQService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
