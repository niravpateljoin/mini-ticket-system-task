<?php

namespace App\Repositories;

use App\Models\Ticket;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Ticket\TicketInterface;
use App\Repositories\Ticket\TicketRepository;
use Illuminate\Contracts\Support\DeferrableProvider;


class RepositoryServiceProvider extends ServiceProvider implements DeferrableProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerTicketRepository();
    }

    protected function registerTicketRepository()
    {
        $this->app->bind(TicketInterface::class, function () {
            return new TicketRepository(new Ticket());
        });
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [
            TicketInterface::class,
        ];
    }
}
