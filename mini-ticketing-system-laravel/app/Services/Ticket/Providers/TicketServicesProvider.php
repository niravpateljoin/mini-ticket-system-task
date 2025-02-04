<?php

namespace App\Services\Ticket\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Ticket\TicketServices;
use App\Repositories\Ticket\TicketInterface;
use Illuminate\Contracts\Support\DeferrableProvider;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class TicketServicesProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerService();
    }

    protected function registerService()
    {

        $this->app->bind(TicketServices::class, function ($app) {
            return new TicketServices($app[TicketInterface::class]);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [TicketServices::class];
    }
}
