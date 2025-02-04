<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketRequest;
use App\Http\Resources\BaseResource;
use App\Services\Ticket\TicketServices;
use Illuminate\Http\Request;

class TicketController extends BaseResource
{
    /**
     * The service layer that manages ticket-related business logic.
     * 
     * @var \App\Services\Ticket\TicketServices
     */
    private $ticketService;

    /**
     * Initialize the repository with the required service dependency.
     *
     * @param \App\Services\Ticket\TicketServices $ticketService
     */
    public function __construct(TicketServices $ticketService)
    {
        $this->ticketService = $ticketService;
    }

    /**
     * Retrieve and return a list of all tickets.
     * 
     * @return \Illuminate\Http\JsonResponse JSON response containing the list of tickets.
     */
    public function index(Request $request)
    {
        try {
            $tickets = $this->ticketService->getAllTickets($request);
            return $this->success($tickets);
        } catch (\Throwable $e) {
            return $this->error($e->getMessage());
        }
    }

    /**
     * Store a newly created ticket in the database.
     * 
     * @param TicketRequest $request The validated request data for creating a new ticket.
     * @return \Illuminate\Http\JsonResponse JSON response containing the created ticket
     */
    public function store(TicketRequest $request)
    {
        try {
            $ticket = $this->ticketService->storeTicket($request->all());
            return $this->success($ticket,201);
        } catch (\Throwable $e) {
            return $this->error($e->getMessage());
        }
        
    }

    /**
     * Retrieve and return a specific ticket by its ID.
     *
     * @param int|string $id The unique identifier of the ticket.
     * @return \Illuminate\Http\JsonResponse JSON response containing the ticket details.
     */
    public function show($id)
    {
        try {
            $ticket = $this->ticketService->getTicketById($id);
            return $this->success($ticket);
        } catch (\Throwable $e) {
            return $this->error($e->getMessage());
        }
    }

    /**
     * Update the specified ticket using the provided request data.
     *
     * @param TicketRequest $request The validated request data for updating the ticket.
     * @param int|string $id The unique identifier of the ticket to be updated.
     * @return \Illuminate\Http\JsonResponse JSON response containing the updated ticket.
     */
    public function update(TicketRequest $request, $id)
    {
        try {
            $this->ticketService->updateTicket($request->except('_token'),$id);
            $ticket = $this->ticketService->getTicketById($id);
            return $this->success($ticket);
        } catch (\Throwable $e) {
            return $this->error($e->getMessage());
        }
    }

    /**
     * Delete the specified ticket from the database.
     *
     * @param int|string $id The unique identifier of the ticket to be deleted.
     * @return \Illuminate\Http\JsonResponse JSON response confirming the ticket deletion.
     */
    public function destroy($id)
    {
        try {
            $this->ticketService->deleteTicket($id);
            $ticket = $this->ticketService->getTicketById($id);
            return $this->success($ticket);
        } catch (\Throwable $e) {
            return $this->error($e->getMessage());
        }
    }
}
