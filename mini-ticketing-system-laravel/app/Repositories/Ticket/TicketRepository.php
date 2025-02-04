<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories\Ticket;

use App\Models\Ticket;
use App\Repositories\Ticket\TicketInterface;

class TicketRepository implements TicketInterface
{

    /**
     * @var \App\Models\Ticket
     */
    private $ticket;

    /**
     * TicketRepository constructor.
     *
     * @param \App\Models\Ticket $ticket
     */
    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * Retrieve all tickets.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[] The collection of all tickets.
     */
    public function getAllTickets($request){
        $query = $this->ticket->query();
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }
        if ($request->has('title')) {
            $query->where('title', 'like','%'.$request->status.'%');
        }
        return $query->get();
    }

    /**
     * Store a new ticket in the database.
     *
     * @param array $data The ticket data to be stored.
     * @return \App\Models\Ticket The created ticket instance.
     */
    public function storeTicket($data){
        return $this->ticket::create($data);
    }

    /**
     * Retrieve a specific ticket by its unique identifier.
     *
     * @param int|string $id The unique identifier of the ticket.
     * @return \App\Models\Ticket|null The ticket, or null if not found.
     */
    public function getTicketById($id){
        return $this->ticket::where('_id',$id)->first();
    }

    /**
     * Update an existing ticket in the database.
     *
     * @param array $data The data to be updated.
     * @param int|string $id The unique identifier of the ticket to be updated.
     * @return int The number of rows affected.
     */
    public function updateTicket($data,$id){
        return $this->ticket::where('_id',$id)->update($data);
    }

    /**
     * Delete a ticket by its unique identifier.
     *
     * @param int|string $id The unique identifier of the ticket to be deleted.
     * @return bool Whether the deletion was successful.
     */
    public function deleteTicket($id){
        return $this->ticket::where('_id',$id)->delete();
    }
    
}
