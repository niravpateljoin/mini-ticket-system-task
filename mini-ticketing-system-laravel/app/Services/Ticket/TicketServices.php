<?php

namespace App\Services\Ticket;


use App\Repositories\Ticket\TicketInterface;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class TicketServices
{
    /**
     * The repository instance that provides data access for tickets.
     * 
     * @var \App\Services\Ticket\ticketRepo
     */
    private $ticketRepo;

    /**
     * Initialize the service with a repository dependency.
     *
     * @param \App\Repositories\Ticket\TicketInterface $ticketRepo
     */
    public function __construct(TicketInterface $ticketRepo)
    {
        $this->ticketRepo = $ticketRepo;
    }

    /**
     * Retrieve a list of all tickets.
     *
     * @return mixed Collection of tickets.
     */
    public function getAllTickets($request){
        return $this->ticketRepo->getAllTickets($request);
    }

    /**
     * Store a new ticket in the database.
     *
     * @param array $data The ticket data to be stored.
     * @return mixed The newly created ticket.
     */
    public function storeTicket($data){
        return $this->ticketRepo->storeTicket($data);
    }

    /**
     * Retrieve a ticket by its unique ID.
     *
     * @param int|string $id The unique identifier of the ticket.
     * @return mixed The ticket details.
     */
    public function getTicketById($id){
        return $this->ticketRepo->getTicketById($id);
    }

    /**
     * Update an existing ticket with new data.
     *
     * @param array $data The updated ticket data.
     * @param int|string $id The unique identifier of the ticket to be updated.
     * @return mixed The updated ticket.
     */
    public function updateTicket($data,$id){
        return $this->ticketRepo->updateTicket($data,$id);
    }

    /**
     * Delete a ticket by its ID.
     *
     * @param int|string $id The unique identifier of the ticket to be deleted.
     * @return bool Whether the deletion was successful.
     */
    public function deleteTicket($id){
        return $this->ticketRepo->deleteTicket($id);
    }
    
}
