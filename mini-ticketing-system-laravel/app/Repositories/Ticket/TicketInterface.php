<?php

namespace App\Repositories\Ticket;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

interface TicketInterface
{

    /**
     * Retrieve all tickets.
     *
     * @return mixed Collection of tickets.
     */
    public function getAllTickets($request);

    /**
     * Store a new ticket in the repository.
     *
     * @param array $data The ticket data to be stored.
     * @return mixed The newly created ticket.
     */
    public function storeTicket($data);

    /**
     * Retrieve a specific ticket by its unique identifier.
     *
     * @param int|string $id The unique identifier of the ticket.
     * @return mixed The ticket details.
     */
    public function getTicketById($id);

    /**
     * Update an existing ticket in the repository.
     *
     * @param array $data The updated ticket data.
     * @param int|string $id The unique identifier of the ticket to be updated.
     * @return mixed The updated ticket.
     */
    public function updateTicket($data,$id);

    /**
     * Delete a ticket by its ID.
     *
     * @param int|string $id The unique identifier of the ticket to be deleted.
     * @return bool Whether the deletion was successful.
     */
    public function deleteTicket($id);
    
}
